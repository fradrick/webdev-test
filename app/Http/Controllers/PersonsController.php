<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\PersonAttribute;
use Illuminate\Http\Request;

class PersonsController extends Controller
{
    public function data(){
        return new \App\Http\Resources\PersonCollection(Person::get());
        //return Person::with('personal_attributes')->get();
    }

    public function index()
    {
        return view('persons.index');
    }


    public function create()
    {
        return view('persons.create');
    }


    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'first_name'=>'required|min:5',
            'surname'=>'required|min:3',
            'date_of_birth'=>'required|date_format:Y-m-d',
        ]);

        $person = Person::create($data);

        //Person's Attributes
        $attribute_names = $request->attribute_name;
        $attribute_values = $request->attribute_value;

        //Save Person's Attributes if available
        if (!empty($attribute_names) AND !empty($attribute_values)){
            foreach ($attribute_names as $key=>$value){
                $person->personal_attributes()->save(new PersonAttribute(['attribute_name'=>$value, 'attribute_value'=>$attribute_values[$key]]));
            }
        }

        flash("Person added successfully")->info();
        return redirect("/persons");

    }


    public function edit($id)
    {
        $person = Person::with('personal_attributes')->findOrFail($id);
        return view('persons.edit', compact('person'));
    }


    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'first_name'=>'required|min:5',
            'surname'=>'required|min:3',
            'date_of_birth'=>'required|date_format:Y-m-d',
        ]);

        $person = Person::findOrFail($id);
        $person->update($data);

        //Update Old Attributes
        $old_atrribute_names = $request->saved_attribute_name;
        $old_attribute_values = $request->saved_attribute_value;
        foreach ($old_atrribute_names as $key=>$value){
            $attribute = PersonAttribute::findOrFail($key);
            $attribute->attribute_name = $value;
            $attribute->attribute_value = $old_attribute_values[$key];
            $attribute->save();
        }

        //Save New Attributes
        $attribute_names = $request->attribute_name;
        $attribute_values = $request->attribute_value;
        if (!empty($attribute_names) AND !empty($attribute_values)){
            foreach ($attribute_names as $key=>$value){
                $person->personal_attributes()->save(new PersonAttribute(['attribute_name'=>$value, 'attribute_value'=>$attribute_values[$key]]));
            }
        }

        flash("Person updated successfully")->info();
        return redirect("/persons");
    }


    public function destroy($id)
    {
        $person = Person::findOrFail($id);
        foreach ($person->personal_attributes as $attribute)
            $attribute->delete();
        $person->delete();

        return response()->json(['success'], 201);
    }

    public function destroy_attribute($id){
        $attribute = PersonAttribute::findOrFail($id);
        $attribute->delete();
        return response()->json(['success'], 201);
    }
}
