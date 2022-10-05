<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index()
  {
      $categories = Category::all();
      return view('category.index',compact('categories'));
  }

  public function create()
  {
      return view('category.create');
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|unique:categories,name'
    ]);
    $category = Category::create($request->all());
    return redirect()->route('categories.show',compact('category'));
  }

  public function show(Category $category)
  {
      return view('category.show',compact('category'));
  }

  public function edit(Category $category)
  {
      return view('category.edit',compact('category'));
  }

  public function update(Request $request, Category $category)
  {
      $validated = $request->validate([
         'name' => ['required',Rule::unique('categories','name')->ignore($category->id)]
      ]);
      $category->fill($request->all())->save();
      return $this->show($category);
  }


    public function destroy(Category $category)
    {
        //
    }
}
