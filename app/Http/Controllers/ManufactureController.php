<?php

namespace App\Http\Controllers;

use App\Models\Manufacture;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ManufactureController extends Controller
{

    public function index()
    {
        $manufactures = Manufacture::all();
        return view('manufacture.index',compact('manufactures'));
    }

    public function create()
    {
        return view('manufacture.create');
    }

    public function store(Request $request)
    {
      $validated = $request->validate([
        'name' => 'required|unique:manufactures,name'
      ]);
      $manufacture = Manufacture::create($request->all());
      return redirect()->route('manufactures.show',compact('manufacture'));
    }

    public function show(Manufacture $manufacture)
    {
        return view('manufacture.show',compact('manufacture'));
    }

    public function edit(Manufacture $manufacture)
    {
        return view('manufacture.edit',compact('manufacture'));
    }

    public function update(Request $request, Manufacture $manufacture)
    {
        $validated = $request->validate([
           'name' => ['required',Rule::unique('manufactures','name')->ignore($manufacture->id)]
        ]);
        $manufacture->fill($request->all())->save();
        return $this->show($manufacture);
    }

    public function destroy(Manufacture $manufacture)
    {
        //
    }
}
