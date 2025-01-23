<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHomePage()
    {
        return view('homes.home');
    }

    public function showProdukPage()
    {
        // Ambil semua produk yang ada di database
        $products = Product::with('category')->get();  // Pastikan untuk memuat relasi kategori

        // Kirim data produk ke view
        return view('homes.produk', compact('products'));
    }
}
