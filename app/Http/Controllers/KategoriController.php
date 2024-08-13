<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Kategori;
use RealRashid\SweetAlert\Facades\Alert;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('Dashboard.data-kategori', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.data-kategori', [
            'user' => auth()->user(),
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
        // Validasi data yang akan disimpan
        $request->validate([
            'nama_kategori' => 'required',
        ]);
        $data = new Kategori();
        $data->nama_kategori = $request->nama_kategori;
        $data->save();
        if ($data) {
            return redirect('/Kelola/data-kategori')->with('success', 'DATA KATEGORI BERITA BERHASIL DITAMBAH');
        } else {
            return redirect('/Kelola/data-kategori')->with('error', 'DATA KATEGORI BERITA GAGAL DITAMBAH');
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
        $kategori = Kategori::find($id);
        return view('Dashboard.data-kategori', [
            'user' => auth()->user(),
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
            'nama_kategori' => 'required',
        ]);

        $kategori = Kategori::find($id); // Mengambil data Galeri Kegiatan berdasarkan ID

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->updated_at = Carbon::now();

        $kategori->save();

        if ($kategori) {
            return redirect('/Kelola/data-kategori')->with('success', 'DATA KATEGORI BERITA BERHASIL DIUPDATE');
        } else {
            return redirect('/Kelola/data-kategori')->with('error', 'DATA KATEGORI BERITA GAGAL DIUPDATE');
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
        Kategori::destroy($id);
        if ($id) {
            return redirect('/Kelola/data-kategori')->with('success', 'DATA KATEGORI BERITA BERHASIL DIHAPUS');
        } else {
            return redirect('/Kelola/data-kategori')->with('error', 'DATA KATEGORI BERITA GAGAL DIHAPUS');
        }
    }
}
