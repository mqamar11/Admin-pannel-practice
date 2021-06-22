<?php

namespace App\Http\Controllers;

use App\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index(){

        $trainings = Training::all();
        return view('admin.training.list', get_defined_vars());
    }

    public function create(){

        return view('admin.training.add');
    }

    public function store(Request $request){

        $request->validate([
			'name' => 'required',
			'language' => 'required',
			'health' => 'required',
			'publish' => 'required',
			'due' => 'required',
			'company' => 'required',
		]);

        Training::create([
			'name' => $request->name,
			'language' => $request->language,
			'health' => $request->health,
			'publish' => $request->publish,
			'due' => $request->due,
			'company' => $request->company,
		]);
		return redirect()->route('training.list')->with('success', 'Record is Created Successfully');

    }

    public function edit($id){

        $trainings = Training::find($id);
        return view('admin.training.edit', get_defined_vars());
    }

    public function update(Request $request, $id){

        $request->validate([
            'name'=>'required',
            'language'=>'required',
            'health'=>'required',
            'publish'=>'required',
            'due'=>'required',
            'company'=>'required'
        ]);

        $training = Training::find($id);
        $training->name =  $request->get('name');
        $training->language = $request->get('language');
        $training->health = $request->get('health');
        $training->publish = $request->get('publish');
        $training->due = $request->get('due');
        $training->company = $request->get('company');
        $training->update();

        return redirect('/training')->with('success', 'Record Successfully Updated!');
    }

    public function destroy($id){

        $data = Training::findorFail($id);
        $data->delete();
        return redirect()->route('training.list')->with('success', 'Record Deleted Successfully!');
    }
}
