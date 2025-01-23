<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function showDashboardPage ()
    {
        return view('admin.dashboard');
    }
    public function showProdukPage ()
    {
        return view('admin.produk');
    }
    public function showListUser(){
        $users = User::all();
        return view("admin.list-user",compact("users"));
    }
    
    public function products(Request $request)
    {
        $query = $request->input('search');
        
        // Query untuk pencarian
        $products = Product::when($query, function ($q) use ($query) {
            $q->where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%");
        })->paginate(5);
        
        return view('admin.produk', compact('products'));
    }

    public function index(){
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalUsers = User::count();
        return view("admin.dashboard",compact(["totalProducts",'totalCategories','totalUsers']));
    }

    public function formProduk(){
        $categories = Category::all();
        return view("admin.add-produk",compact("categories"));
    }

    public function addProduk(Request $request)
{
    $request->validate([
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'images_background' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'title' => 'required|string|max:255',
        'description' => 'required',
        'harga' => 'required|integer',
        'category_id' => 'required|integer',
    ]);

    $product = new Product();
    $product->title = $request->title;
    $product->description = $request->description;
    $product->harga = $request->harga;
    $product->category_id = $request->category_id;

    // Handle image upload to 'public/images/products'
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images/products'), $imageName);
        $product->image = 'images/products/' . $imageName;
    }

    $product->save();

    return redirect()->back()->with('success', 'Product added successfully!');
}


    public function destroy($id){
        $product = Product::find($id);
        try {
            $product->delete();
            return redirect()->back()->with('success','Product deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
            
        }
        }
        public function show($id)
    {   
        $product = Product::with('category')->findOrFail($id);
        return view('admin.view-Produk', compact('product'));
    }
    public function editProduk($id){
        $product = Product::with('category')->find($id);
    
        $categories = Category::all();
        return view('admin.edit-produk', compact(['product','categories']));
    
    }

    public function updateProduk(Request $request, $id)
{
    // Validasi input dari form
    $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'harga' => 'required|integer',
        'category_id' => 'required|exists:categories,id',
    ]);
    $product = Product::findOrFail($id);

    // Update data Produk
    $product->category_id = $request->category_id;
    $product->title = $request->title;
    $product->image = $request->image;
    $product->harga = $request->harga;
    $product->description = $request->description;

    // Cek jika ada gambar yang diupload
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($product->image) {
            Storage::delete('public/img/products/' . $product->image); // Sesuaikan path gambar
        }
        // Simpan gambar baru dan ambil path-nya
        $product->image = $request->file('image')->store('img/products', 'public');
    }

    // Cek jika ada background image yang diupload
    if ($request->hasFile('image_background')) {
        // Hapus background image lama jika ada
        if ($product->image_background) {
            Storage::delete('public/images/backgrounds/' . $product->image_background); // Sesuaikan path gambar background
        }
        // Simpan background image baru dan ambil path-nya
        $product->image_background = $request->file('image_background')->store('images/backgrounds', 'public');
    }

    $product->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('produk.editProduk', $product->id)->with('success', 'Produk updated successfully.');
    }
}
