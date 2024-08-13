<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\News;
use App\Models\Tag;
use App\Models\Kategori;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        $kategori = Kategori::all();
        return view('Dashboard.data-informasi', compact('news', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.data-informasi', [
            'user' => auth()->user(),
            'news' => News::all(),
            'kategori' => Kategori::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'user_id' => 'required',
            'title' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'tags' => 'nullable|string', // Change 'array' to 'string'
            'image_urls' => 'required|array',
            'image_urls.*' => 'image',
        ]);

        $news = new News([
            'kategori_id' => $request->kategori_id,
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
        ]);

        $news->save();

        // Save Tags
        if ($request->has('tags')) {
            $tags = explode(',', $request->input('tags'));
            $news->tags = json_encode($tags);
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['nama' => $tagName]);
                $news->tags()->attach($tag->id); // Attach the tag to the news
            }
        }
        // Save Tags

        // Save Images
        $imageUrls = [];

        if ($request->hasFile('image_urls')) {
            foreach ($request->file('image_urls') as $photo) {
                $photoName = time() . '.' . $photo->getClientOriginalName();
                $photo->storeAs('public/informasi', $photoName);
                $imageUrls[] = asset('storage/informasi/' . $photoName);
            }
        }

        $news->image_urls = json_encode($imageUrls);
        $news->save();

        if ($news) {
            return redirect('/Kelola/data-informasi')->with('success', 'DATA INFORMASI BERHASIL DISIMPAN');
        } else {
            return redirect('/Kelola/data-informasi')->with('error', 'DATA INFORMASI GAGAL DISIMPAN');
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id); // Mengambil data Galerikegiatan berdasarkan ID
        $kategori = Kategori::find($id);
        return view('Dashboard.data-informasi', [
            'user' => auth()->user(),
            'news' => $news, // Mengirim data Galeri Kegiatan ke tampilan
            'kategori' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_id' => 'required',
            'title' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'tags' => 'nullable|string',
            'image_urls' => 'nullable|array',
            'image_urls.*' => 'image',
        ]);

        $news = News::find($id);

        if (!$news) {
            return redirect('/Kelola/data-informasi')->with('error', 'Berita tidak ditemukan.');
        }

        $news->kategori_id = $request->kategori_id;
        $news->title = $request->title;
        $news->deskripsi = $request->deskripsi;
        $news->tanggal = $request->tanggal;

        // Save Tags
        if ($request->has('tags')) {
            $tagNames = explode(',', $request->tags);

            $tagIds = [];

            foreach ($tagNames as $tagName) {
                $tagName = trim($tagName);

                // Cari tag berdasarkan nama
                $tag = Tag::where('nama', $tagName)->first();

                if (!$tag) {
                    // Jika tag belum ada, buat tag baru
                    $tag = Tag::create(['nama' => $tagName]);
                }

                if (!in_array($tag->id, $tagIds)) {
                    $tagIds[] = $tag->id;
                }
            }

            // Synchronize tags dengan menggunakan sync tanpa menyentuh properti 'tags' pada model News
            $news->tags()->sync($tagIds);
        }
        $news->tags = json_encode($tagNames);
        // Save Images if there are changes
        if ($request->hasFile('image_urls')) {
            $imageUrls = [];
            foreach ($request->file('image_urls') as $photo) {
                $photoName = time() . '.' . $photo->getClientOriginalName();
                $photo->storeAs('public/informasi', $photoName);
                $imageUrls[] = asset('storage/informasi/' . $photoName);
            }
            $news->image_urls = json_encode($imageUrls);
        }

        $news->updated_at = Carbon::now();
        $news->save();

        if ($news) {
            return redirect('/Kelola/data-informasi')->with('success', 'DATA INFORMASI BERHASIL DIUPDATE');
        } else {
            return redirect('/Kelola/data-informasi')->with('error', 'DATA INFORMASI GAGAL DIUPDATE');
        }
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        News::destroy($id);
        if ($id) {
            return redirect('/Kelola/data-informasi')->with('success', 'DATA INFORMASI BERHASIL DIHAPUS');
        } else {
            return redirect('/Kelola/data-informasi')->with('error', 'DATA INFORMASI GAGAL DIHAPUS');
        }
    }
}
