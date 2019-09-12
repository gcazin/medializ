<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Post;
use App\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $posts = Post::where('subcategory_id', $request->subcategory_id)->get();
        return view('subcategory.index', compact('posts'));
    }

    public function create()
    {
        return view('subcategory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:500'
        ]);
        Subcategory::create($request->all());
        return redirect(route('post.index'));
    }

    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        return view('subcategory.edit', compact('subcategory'));
    }

    public function update(int $id, Request $request)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->update($request->all());

        return redirect()->route('admin.index')
            ->with('success','Product updated successfully');
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
    }

}
