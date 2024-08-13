<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Galerikegiatan;
use App\Models\News;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\download;
use App\Models\Kategori;
use App\Models\Fasilitas;
use App\Models\strukturorganisasi;
use App\Models\TataTertib;
use Illuminate\Support\Str;


class FrontController extends Controller
{
    public function index(Request $request)
    {
        $news = News::orderBy('tanggal', 'desc')->take(6)->get();

        foreach ($news as $item) {
            $item->commentCount = Comment::where('news_id', $item->id)->count();
        }

        $jenis_kegiatan = $request->input('kegiatan_id', 'all');

        if ($jenis_kegiatan === 'all') {
            $galeri = Galerikegiatan::paginate(6);
        } else {
            $galeri = Galerikegiatan::where('kegiatan_id', $jenis_kegiatan)->get();
        }

        return view('Front.home', compact('news', 'galeri'));
    }

    public function about()
    {
        return view('Front.about');
    }

    public function program()
    {
        return view('Front.program');
    }

    public function allprogram()
    {
        return view('Front.all-programs');
    }

    public function contact()
    {
        return view('Front.contact');
    }

    public function staff(Request $request)
    {
        $jenis_mahad = $request->input('jenis_mahad', 'all');

        $data = Staff::first();

        if ($jenis_mahad === 'all') {
            $staff = Staff::all();
        } else {
            $staff = Staff::where('jenis_mahad', $jenis_mahad)->get();
        }
        return view('Front.staff', compact('data', 'staff',));
    }

    public function galeri(Request $request)
    {
        $jenis_kegiatan = $request->input('kegiatan_id', 'all');

        if ($jenis_kegiatan === 'all') {
            $galeri = Galerikegiatan::paginate(12);
        } else {
            $galeri = Galerikegiatan::where('kegiatan_id', $jenis_kegiatan)->get();
        }
        return view('Front.galeri', compact('galeri',));
    }

    public function blog()
    {
        $news = News::orderBy('tanggal', 'desc')->paginate(3);
        foreach ($news as $item) {
            $item->commentCount = Comment::where('news_id', $item->id)->count();
        }
        // $tags = Tag::all();
        $recentPosts = News::orderBy('tanggal', 'desc')->take(3)->get();

        $popularTags = Tag::withCount('news')->orderBy('news_count', 'desc')->take(5)->get();

        // Ambil data foto galeri (ganti ini dengan cara sesuai untuk mengambil data galeri)
        $galleryPhotos = Galerikegiatan::latest()->take(9)->get();

        // Hitung berapa kali setiap kategori digunakan dalam berita
        $popularCategories = Kategori::withCount('news')->orderBy('news_count', 'desc')->take(5)->get();

        return view('Front.berita', compact('news', 'popularTags', 'recentPosts', 'galleryPhotos', 'popularCategories'));
    }

    public function blog_show($id)
    {
        $news_show = News::find($id);

        // Check if the news exists
        if (!$news_show) {
            abort(404); // Or handle the case when news doesn't exist
        }

        // Retrieve tags for the news
        $tags = $news_show->tags;

        // Retrieve comments related to the specific news by news_id
        $comments = Comment::where('news_id', $id)->paginate(5);

        $commentCount = Comment::where('news_id', $id)->count(); // Hitung jumlah komentar

        $recentPosts = News::orderBy('tanggal', 'desc')->take(3)->get();

        $popularTags = Tag::withCount('news')->orderBy('news_count', 'desc')->take(5)->get();

        // Ambil data foto galeri (ganti ini dengan cara sesuai untuk mengambil data galeri)
        $galleryPhotos = Galerikegiatan::latest()->take(9)->get();

        // Hitung berapa kali setiap kategori digunakan dalam berita
        $popularCategories = Kategori::withCount('news')->orderBy('news_count', 'desc')->take(5)->get();

        $previousPost = News::where('id', '<', $id)->orderBy('id', 'desc')->first();
        $nextPost = News::where('id', '>', $id)->orderBy('id', 'asc')->first();

        return view('Front.show-berita', compact(
            'news_show',
            'tags',
            'comments',
            'commentCount',
            'recentPosts',
            'popularTags',
            'galleryPhotos',
            'popularCategories',
            'previousPost',
            'nextPost'
        ));
    }

    public function storeComment(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
            'news_id' => 'required|exists:news,id',
        ]);

        Comment::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'comment' => $request->comment,
            'news_id' => $request->news_id,
        ]);

        return redirect()->back()->with('success', 'Komentar Anda berhasil disimpan.');
    }

    public function storeReply(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
            'news_id' => 'required|exists:news,id',
            'parent_comment_id' => 'required|exists:comments,id',
        ]);

        $newComment = new Comment([
            'nama' => $request->nama,
            'email' => $request->email,
            'comment' => $request->comment,
            'news_id' => $request->news_id,
            'parent_comment_id' => $request->parent_comment_id,
        ]);

        $newComment->parent_comment_id = $request->parent_comment_id;
        $newComment->save();

        return redirect()->back()->with('success', 'Balasan komentar Anda berhasil disimpan.');
    }

    public function showByCategory($id)
    {
        $category = Kategori::find($id);
        if (!$category) {
            abort(404);
        }

        $news_category = News::where('kategori_id', $id)->orderBy('tanggal', 'desc')->paginate(3);
        $popularCategories = Kategori::withCount('news')->orderBy('news_count', 'desc')->take(5)->get();

        $tags = Tag::all();
        $recentPosts = News::orderBy('tanggal', 'desc')->take(3)->get();

        // Hitung berapa kali setiap tag digunakan
        $popularTags = $tags->map(function ($tag) use ($news_category) {
            $tag->count = $news_category->filter(function ($item) use ($tag) {
                return in_array($tag->nama, json_decode($item->tags));
            })->count();
            return $tag;
        });

        // Urutkan tag berdasarkan jumlah penggunaan
        $popularTags = $popularTags->sortByDesc('count')->take(5);

        // Ambil data foto galeri (ganti ini dengan cara sesuai untuk mengambil data galeri)
        $galleryPhotos = Galerikegiatan::latest()->take(9)->get();

        $commentCount = Comment::where('news_id', $id)->count();

        return view('Front.berita-by-category', compact('news_category', 'category', 'popularCategories', 'popularTags', 'recentPosts', 'galleryPhotos', 'commentCount'));
    }

    public function showTags($id)
    {
        // Cari tag berdasarkan ID
        $tag = Tag::find($id);

        if (!$tag) {
            abort(404);
        }

        // Ambil berita yang memiliki tag ini
        $news_tags = News::whereHas('tags', function ($query) use ($tag) {
            $query->where('nama', $tag->nama);
        })->orderBy('tanggal', 'desc')->paginate(3);

        $popularCategories = Kategori::withCount('news')->orderBy('news_count', 'desc')->take(5)->get();
        $tags = Tag::all();
        $recentPosts = News::orderBy('tanggal', 'desc')->take(3)->get();

        // Hitung berapa kali setiap tag digunakan
        $popularTags = $tags->map(function ($tag) use ($news_tags) {
            $tag->count = $news_tags->filter(function ($item) use ($tag) {
                return in_array($tag->nama, json_decode($item->tags));
            })->count();
            return $tag;
        });

        // Urutkan tag berdasarkan jumlah penggunaan
        $popularTags = $popularTags->sortByDesc('count')->take(5);

        // Ambil data foto galeri (ganti ini dengan cara sesuai untuk mengambil data galeri)
        $galleryPhotos = Galerikegiatan::latest()->take(9)->get();

        $commentCount = Comment::where('news_id', $id)->count();

        return view('Front.berita-by-tags', compact('news_tags', 'tag', 'popularCategories', 'popularTags', 'recentPosts', 'galleryPhotos', 'commentCount'));
    }

    public function fasilitas()
    {
        $fasilitas = Fasilitas::paginate(9);
        return view('Front.fasilitas', compact('fasilitas',));
    }

    public function tatatertib()
    {
        $peraturan = TataTertib::all();
        return view('Front.tata-tertib', compact('peraturan',));
    }

    public function ppdb()
    {
        return view('Front.ppdb');
    }

    public function jadwal()
    {
        return view('Front.jadwal-kegiatan');
    }

    public function dokumen()
    {
        $download = download::all();
        return view('Front.dokumen-download', compact('download'));
    }

    public function struktur()
    {
        return view('Front.struktur');
    }

    public function strukturpengurus()
    {
        $struktur = strukturorganisasi::all();
        return view('Front.struktur-pengurus', compact('struktur'));
    }

    public function faq()
    {
        return view('Front.faq');
    }
}
