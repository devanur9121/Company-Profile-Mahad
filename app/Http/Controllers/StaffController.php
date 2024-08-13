<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Staff;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();
        return view('Dashboard.data-staff', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.data-staff', [
            'user' => auth()->user(),
            'staff' => staff::all(),
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
            'nama_lengkap' => 'required',
            'jenis_mahad' => 'required',
            'bidang_kerja' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = new Staff();
        $data->nama_lengkap = $request->nama_lengkap;
        $data->jenis_mahad = $request->jenis_mahad;
        $data->bidang_kerja = $request->bidang_kerja;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalName();
            $foto->storeAs('public/staff', $fotoName); // Simpan foto ke direktori yang diinginkan
            $data->foto = $fotoName;
        }

        $data->save();

        if ($data) {
            return redirect('/Kelola/data-staff')->with('success', 'DATA STAFF BERHASIL DISIMPAN');
        } else {
            return redirect('/Kelola/data-staff')->with('error', 'DATA STAFF GAGAL DISIMPAN');
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
        $staff = Staff::find($id); // Mengambil data staf berdasarkan ID
        return view('Dashboard.data-staff', [
            'user' => auth()->user(),
            'staff' => $staff, // Mengirim data staf ke tampilan
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'jenis_mahad' => 'required',
            'bidang_kerja' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $staff = Staff::find($id); // Mengambil data staf berdasarkan ID

        $staff->nama_lengkap = $request->nama_lengkap;
        $staff->jenis_mahad = $request->jenis_mahad;
        $staff->bidang_kerja = $request->bidang_kerja;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalName();
            $foto->storeAs('public/staff', $fotoName);
            $staff->foto = $fotoName;
        }
        $staff->updated_at = Carbon::now();

        $staff->save(); // Menyimpan perubahan ke dalam database

        if ($staff) {
            return redirect('/Kelola/data-staff')->with('success', 'DATA STAFF BERHASIL DIUPDATE');
        } else {
            return redirect('/Kelola/data-staff')->with('error', 'DATA STAFF GAGAL DIUPDATE');
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
        Staff::destroy($id);
        if ($id) {
            return redirect('/Kelola/data-staff')->with('success', 'DATA STAFF BERHASIL DIHAPUS');
        } else {
            return redirect('/Kelola/data-staff')->with('error', 'DATA STAFF GAGAL DIHAPUS');
        }
    }
}
