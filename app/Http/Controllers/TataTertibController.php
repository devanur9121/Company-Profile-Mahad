<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\TataTertib;

class TataTertibController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $peraturan = TataTertib::all();
        return view('Dashboard.data-peraturan', compact('peraturan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.data-peraturan', [
            'user' => auth()->user(),
            'peraturan' => TataTertib::all(),
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
            'peraturan' => 'required',
        ]);

        $data = new TataTertib();
        $data->peraturan = $request->peraturan;

        $data->save();

        if ($data) {
            return redirect('/Kelola/data-peraturan')->with('success', 'DATA TATA TERTIB BERHASIL DISIMPAN');
        } else {
            return redirect('/Kelola/data-peraturan')->with('error', 'DATA TATA TERTIB GAGAL DISIMPAN');
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
        $peraturan = TataTertib::find($id);
        return view('Dashboard.data-peraturan', [
            'user' => auth()->user(),
            'peraturan' => $peraturan,
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
            'peraturan' => 'required',
        ]);

        $peraturan = TataTertib::find($id); // Mengambil data Galeri Kegiatan berdasarkan ID

        $peraturan->peraturan = $request->peraturan;
        $peraturan->updated_at = Carbon::now();

        $peraturan->save(); // Menyimpan perubahan ke dalam database

        if ($peraturan) {
            return redirect('/Kelola/data-peraturan')->with('success', 'DATA TATA TERTIB BERHASIL DIUPDATE');
        } else {
            return redirect('/Kelola/data-peraturan')->with('error', 'DATA TATA TERTIB GAGAL DIUPDATE');
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
        TataTertib::destroy($id);
        if ($id) {
            return redirect('/Kelola/data-peraturan')->with('success', 'DATA TATA TERTIB BERHASIL DIHAPUS');
        } else {
            return redirect('/Kelola/data-peraturan')->with('error', 'DATA TATA TERTIB GAGAL DIHAPUS');
        }
    }
}
