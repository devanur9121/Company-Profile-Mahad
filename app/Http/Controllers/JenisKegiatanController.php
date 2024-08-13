<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Kegiatan;

class JenisKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return view('Dashboard.data-jenis-kegiatan', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.data-jenis-kegiatan', [
            'user' => auth()->user(),
            'kegiatan' => Kegiatan::all(),
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
            'jenis_kegiatan' => 'required',
        ]);

        $data = new Kegiatan();
        $data->jenis_kegiatan = $request->jenis_kegiatan;

        $data->save();

        if ($data) {
            return redirect('/Kelola/data-jenis-kegiatan')->with('success', 'DATA JENIS KEGIATAN BERHASIL DISIMPAN');
        } else {
            return redirect('/Kelola/data-jenis-kegiatan')->with('error', 'DATA JENIS KEGIATAN GAGAL DISIMPAN');
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
        $kegiatan = Kegiatan::find($id);
        return view('Dashboard.data-jenis-kegiatan', [
            'user' => auth()->user(),
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
            'jenis_kegiatan' => 'required',
        ]);

        $kegiatan = Kegiatan::find($id); // Mengambil data Galeri Kegiatan berdasarkan ID

        $kegiatan->jenis_kegiatan = $request->jenis_kegiatan;
        $kegiatan->updated_at = Carbon::now();

        $kegiatan->save(); // Menyimpan perubahan ke dalam database

        if ($kegiatan) {
            return redirect('/Kelola/data-jenis-kegiatan')->with('success', 'DATA JENIS KEGIATAN BERHASIL DIUPDATE');
        } else {
            return redirect('/Kelola/data-jenis-kegiatan')->with('error', 'DATA JENIS KEGIATAN GAGAL DIUPDATE');
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
        Kegiatan::destroy($id);
        if ($id) {
            return redirect('/Kelola/data-jenis-kegiatan')->with('success', 'DATA JENIS KEGIATAN BERHASIL DIHAPUS');
        } else {
            return redirect('/Kelola/data-jenis-kegiatan')->with('error', 'DATA JENIS KEGIATAN GAGAL DIHAPUS');
        }
    }
}
