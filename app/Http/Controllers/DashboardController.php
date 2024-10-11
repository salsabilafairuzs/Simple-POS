<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $data['countproduk'] = Produk::count();
        $data['countkategori'] = Kategori::count();
        return view('dashboard', $data);
    }
}
