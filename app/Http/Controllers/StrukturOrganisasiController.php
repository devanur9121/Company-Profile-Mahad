<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\strukturorganisasi;

class StrukturOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $struktur = strukturorganisasi::all();
        return view('Dashboard.struktur', compact('struktur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.struktur', [
            'user' => auth()->user(),
            'struktrur' => strukturorganisasi::all(),
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
            'jabatan' => 'required',
            'koordinator' => 'required',
            'anggota1' => 'nullable',
            'anggota2' => 'nullable',
        ]);

        $data = new strukturorganisasi();
        $data->jabatan = $request->jabatan;
        $data->koordinator = $request->koordinator;
        $data->anggota1 = $request->anggota1;
        $data->anggota2 = $request->anggota2;
        $data->save();

        if ($data) {
            return redirect('/Kelola/data-struktur')->with('success', 'DATA STAFF PENGURUS BERHASIL DISIMPAN');
        } else {
            return redirect('/Kelola/data-struktur')->with('error', 'DATA STAFF PENGURUS GAGAL DISIMPAN');
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
        $struktur = strukturorganisasi::find($id);
        return view('Dashboard.struktur', [
            'user' => auth()->user(),
            'struktur' => $struktur,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jabatan' => 'required',
            'koordinator' => 'required',
            'anggota1' => 'nullable',
            'anggota2' => 'nullable',
        ]);

        $struktur = strukturorganisasi::find($id);

        $struktur->jabatan = $request->jabatan;
        $struktur->koordinator = $request->koordinator;
        $struktur->anggota1 = $request->anggota1;
        $struktur->anggota2 = $request->anggota2;
        $struktur->updated_at = Carbon::now();

        $struktur->save();

        if ($struktur) {
            return redirect('/Kelola/data-struktur')->with('success', 'DATA STAFF PENGURUS BERHASIL DIUPDATE');
        } else {
            return redirect('/Kelola/data-struktur')->with('error', 'DATA STAFF PENGURUS GAGAL DIUPDATE');
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
        strukturorganisasi::destroy($id);
        if ($id) {
            return redirect('/Kelola/data-struktur')->with('success', 'DATA STAFF PENGURUS BERHASIL DIHAPUS');
        } else {
            return redirect('/Kelola/data-struktur')->with('error', 'DATA STAFF PENGURUS GAGAL DIHAPUS');
        }
    }
}
