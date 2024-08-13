<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('Dashboard.data-admin', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.data-admin', [
            'user' => auth()->user(),
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
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);

        // Jika validasi berhasil, maka simpan data
        $data = new User();
        $data->nama_lengkap = $request->nama_lengkap;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->save();

        if ($data) {
            return redirect('/Kelola/data-admin')->with('success', 'DATA ADMIN BERHASIL DISIMPAN');
        } else {
            return redirect('/Kelola/data-admin')->with('error', 'DATA ADMIN GAGAL DISIMPAN');
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
        return view('Dashboard.data-admin', [
            'user' => auth()->user(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $id = $request['id'];
        $nama_lengkap = $request['nama_lengkap'];
        $email = $request['email'];
        $username = $request['username'];
        $new_password = $request['new_password'];
        $confirm_password = $request['confirm_password'];

        if ($username != "") {
            if ($confirm_password == "" && $new_password == "") {
                User::where('id', $id)->update([
                    'nama_lengkap' => $nama_lengkap,
                    'email' => $email,
                    'username' => $username
                ]);
                return redirect()->intended('/data-admin')->with('success', 'DATA ADMIN BERHASIL DIUPDATE');
            } else if ($confirm_password != "" && $new_password == "") {
                return back()->with('error', 'Field harus diisi!');
            } else if ($confirm_password == "" && $new_password != "") {
                return back()->with('error', 'Field harus diisi!');
            } else {
                if ($new_password == $confirm_password) {
                    $password = bcrypt($confirm_password);
                    User::where('id', $id)->update([
                        'nama_lengkap' => $nama_lengkap,
                        'email' => $email,
                        'username' => $username,
                        'password' => $password
                    ]);
                    return redirect()->intended('/Kelola/data-admin')->with('success', 'DATA USER BERHASIL DIUPDATE!');
                } else {
                    return back()->with('error', 'Password tidak sama!');
                }
            }
        } else {
            return redirect()->intended('/Kelola/data-admin')->with('error', 'Username tidak boleh kosong');
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
        User::destroy($id);
        if ($id) {
            return redirect('/Kelola/data-admin')->with('success', 'DATA ADMIN BERHASIL DIHAPUS');
        } else {
            return redirect('/Kelola/data-admin')->with('error', 'DATA ADMIN GAGAL DIHAPUS');
        }
    }
}
