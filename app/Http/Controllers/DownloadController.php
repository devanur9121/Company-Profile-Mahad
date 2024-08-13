<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\download;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $download = download::all();
        return view('Dashboard.data-download', compact('download'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.data-download', [
            'user' => auth()->user(),
            'download' => download::all(),
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
            'nama_file' => 'required',
            'file' => 'required|file|mimes:pdf',
        ]);

        $data = new download();
        $data->nama_file = $request->nama_file;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalName();
            $file->storeAs('public/dokumen', $filename); // Simpan file ke direktori yang diinginkan
            $data->file = $filename;
        }

        $data->save();

        if ($data) {
            return redirect('/Kelola/data-download')->with('success', 'DATA DOWNLOAD BERHASIL DISIMPAN');
        } else {
            return redirect('/Kelola/data-download')->with('error', 'DATA DOWNLOAD GAGAL DISIMPAN');
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
        $download = download::find($id);
        return view('Dashboard.data-download', [
            'user' => auth()->user(),
            'download' => $download,
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
            'nama_file' => 'required',
            'file' => 'file|mimes:pdf',
        ]);

        $download = download::find($id); // Mengambil data Galeri Kegiatan berdasarkan ID

        $download->nama_file = $request->nama_file;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalName();
            $file->storeAs('public/dokumen', $fileName);
            $download->file = $fileName;
        }
        $download->updated_at = Carbon::now();

        $download->save(); // Menyimpan perubahan ke dalam database

        if ($download) {
            return redirect('/Kelola/data-download')->with('success', 'DATA DOWNLOAD BERHASIL DIUPDATE');
        } else {
            return redirect('/Kelola/data-download')->with('error', 'DATA DOWNLOAD GAGAL DIUPDATE');
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
        download::destroy($id);
        if ($id) {
            return redirect('/Kelola/data-download')->with('success', 'DATA DOWNLOAD BERHASIL DIHAPUS');
        } else {
            return redirect('/Kelola/data-download')->with('error', 'DATA DOWNLOAD GAGAL DIHAPUS');
        }
    }
}
