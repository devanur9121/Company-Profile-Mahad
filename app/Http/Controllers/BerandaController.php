<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Staff;
use App\Models\Galerikegiatan;
use App\Models\News;


class BerandaController extends Controller
{
    public function index()
    {
        $staff  = Staff::all();
        $staff_count = Staff::count();
        $galeri = Galerikegiatan::count();
        $news   = News::count();
        return view('Dashboard.home', compact('staff', 'staff_count', 'galeri', 'news'));
    }
}
