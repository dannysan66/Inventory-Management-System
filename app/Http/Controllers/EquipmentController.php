<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Manufacture;
use App\Models\Category;
use App\Models\User;
use App\Models\Note;

use Illuminate\Http\Request;


class EquipmentController extends Controller
{

    public function index()
    {
        $equipments = Equipment::with('manufacture','users','category','notes')->get();
        $response['data'] = $equipments;
        return json_encode($response);
    }

    public function create()
    {
        $manufactures = Manufacture::all();
        $categories = Category::all();
        $users = User::all();
        return view('equipment.create',compact('manufactures','categories','users'));
    }


    public function store(Request $request)
    {
      $validated = $request->validate([
        'manufacture_id' => 'required',
        'category_id' => 'required',
        'model' => 'required',
        'invoice_number' => 'required',
        'price' => 'required',
        'purchase_date' => 'required'
      ]);

      $equipment = Equipment::create($request->all());
      if($request['user_id'] != "") {
        $equipment->users()->attach($request['user_id']);
      }

      return redirect()->route('equipment.show',compact('equipment'));
    }


    public function show(Equipment $equipment)
    {
        return view('equipment.show',compact('equipment'));
    }


    public function edit(Equipment $equipment)
    {
        $manufactures = Manufacture::all();
        $categories = Category::all();
        $users = User::all();
        return view('equipment.edit',compact('equipment','manufactures','categories','users'));
    }


    public function update(Request $request, Equipment $equipment)
    {
        $validated = $request->validate([
          'manufacture_id' => 'required',
          'category_id' => 'required',
          'model' => 'required',
          'invoice_number' => 'required',
          'price' => 'required',
          'purchase_date' => 'required'
        ]);

        $equipment->fill($request->all())->save();
        if($request['user_id'] != "" && $request['user_id'] != $equipment->users->first()->id) {
          $equipment->users()->attach($request['user_id']);
        }

        return redirect()->route('equipment.show',compact('equipment'));
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return redirect()->back();
    }
}
