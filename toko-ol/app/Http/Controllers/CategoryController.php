<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('search');
    
        // Query untuk pencarian
        $categories = Category::when($query, function ($q) use ($query) {
            $q->where('name', 'like', "%{$query}%");
        })->paginate(5);
    
        return view('admin.category', compact('categories'));
    }

    public function destroy($id){
        $category = Category::find($id);
        try {
            $category->delete();
            return redirect('category')->with('success','Category deleted successfully!');
        } catch (\Exception $e) {
            return redirect('category')->with('error', $e->getMessage());
            
        }
    }

    public function detail($id){
        $category = Category::find($id);
        return view('admin.view-category',compact('category'));
    }

    public function formCategory(){
        $categories = Category::all();
        return view('admin.add-category',compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',

        ]);
        $category = Category::create($request->all());
        return redirect()->back()->with('success','Category added successfully!');


    }
}
