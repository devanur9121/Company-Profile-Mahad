<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas = Fasilitas::all();
        return view('Dashboard.data-fasilitas', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.data-fasilitas', [
            'user' => auth()->user(),
            'fasilitas' => Fasilitas::all(),
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
            'nama_fasilitas' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = new Fasilitas();
        $data->nama_fasilitas = $request->nama_fasilitas;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/fasilitas', $fotoName); // Simpan foto ke direktori yang diinginkan
            $data->foto = $fotoName;
        }

        $data->save();
        if ($data) {
            return redirect('/Kelola/data-fasilitas')->with('success', 'DATA FASILITAS BERHASIL DISIMPAN');
        } else {
            return redirect('/Kelola/data-fasilitas')->with('error', 'DATA FASILITAS GAGAL DISIMPAN');
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fasilitas = Fasilitas::find($id); // Mengambil data Galerikegiatan berdasarkan ID
        return view('Dashboard.data-fasilitas', [
            'user' => auth()->user(),
            'fasilitas' => $fasilitas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_fasilitas' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $fasilitas = Fasilitas::find($id); // Mengambil data Galeri Kegiatan berdasarkan ID

        $fasilitas->nama_fasilitas = $request->nama_fasilitas;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/fasilitas', $fotoName);
            $fasilitas->foto = $fotoName;
        }
        $fasilitas->updated_at = Carbon::now();

        $fasilitas->save(); // Menyimpan perubahan ke dalam database

        if ($fasilitas) {
            return redirect('/Kelola/data-fasilitas')->with('success', 'DATA FASILITAS BERHASIL DIUPDATE');
        } else {
            return redirect('/Kelola/data-fasilitas')->with('error', 'DATA FASILITAS GAGAL DIUPDATE');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Fasilitas::destroy($id);
        if ($id) {
            return redirect('/Kelola/data-fasilitas')->with('success', 'DATA FASILITAS BERHASIL DIHAPUS');
        } else {
            return redirect('/Kelola/data-fasilitas')->with('error', 'DATA FASILITAS GAGAL DIHAPUS');
        }
    }
}
