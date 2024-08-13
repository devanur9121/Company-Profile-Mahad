<?php

namespace App\Http\Controllers;

use App\Models\Galerikegiatan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $galeri = Galerikegiatan::all();
        $kegiatan = Kegiatan::all();
        return view('Dashboard.data-galeri-kegiatan', compact('galeri', 'kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('Dashboard.data-galeri-kegiatan', [
            'user' => auth()->user(),
            'galeri' => Galerikegiatan::all(),
            'kegiatan' => Kegiatan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi data yang akan disimpan
        $request->validate([
            'nama_kegiatan' => 'required',
            'kegiatan_id' => 'required',
            'tanggal_kegiatan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = new Galerikegiatan();
        $data->nama_kegiatan = $request->nama_kegiatan;
        $data->kegiatan_id = $request->kegiatan_id;
        $data->tanggal_kegiatan = $request->tanggal_kegiatan;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalName();
            $foto->storeAs('public/galeri', $fotoName); // Simpan foto ke direktori yang diinginkan
            $data->foto = $fotoName;
        }

        $data->save();

        if ($data) {
            return redirect('/Kelola/data-galeri-kegiatan')->with('success', 'DATA GALERI KEGIATAN BERHASIL DISIMPAN');
        } else {
            return redirect('/Kelola/data-galeri-kegiatan')->with('error', 'DATA GALERI KEGIATAN GAGAL DISIMPAN');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit($id)
    {
        $galeri = Galerikegiatan::find($id); // Mengambil data Galerikegiatan berdasarkan ID
        $kegiatan = Kegiatan::find($id);
        return view('Dashboard.data-galeri-kegiatan', [
            'user' => auth()->user(),
            'galeri' => $galeri, // Mengirim data Galeri Kegiatan ke tampilan
            'kegiatan' => $kegiatan,
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
            'nama_kegiatan' => 'required',
            'kegiatan_id' => 'required',
            'tanggal_kegiatan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $galeri = Galerikegiatan::find($id); // Mengambil data Galeri Kegiatan berdasarkan ID

        $galeri->nama_kegiatan = $request->nama_kegiatan;
        $galeri->kegiatan_id = $request->kegiatan_id;
        $galeri->tanggal_kegiatan = $request->tanggal_kegiatan;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalName();
            $foto->storeAs('public/galeri', $fotoName);
            $galeri->foto = $fotoName;
        }
        $galeri->updated_at = Carbon::now();

        $galeri->save(); // Menyimpan perubahan ke dalam database

        if ($galeri) {
            return redirect('/Kelola/data-galeri-kegiatan')->with('success', 'DATA GALERI KEGIATAN BERHASIL DIUPDATE');
        } else {
            return redirect('/Kelola/data-galeri-kegiatan')->with('error', 'DATA GALERI KEGIATAN GAGAL DIUPDATE');
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
        Galerikegiatan::destroy($id);
        if ($id) {
            return redirect('/Kelola/data-galeri-kegiatan')->with('success', 'DATA GALERI KEGIATAN BERHASIL DIHAPUS');
        } else {
            return redirect('/Kelola/data-galeri-kegiatan')->with('error', 'DATA GALERI KEGIATAN GAGAL DIHAPUS');
        }
    }
}
