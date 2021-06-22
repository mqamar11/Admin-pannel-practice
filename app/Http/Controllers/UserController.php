<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view ('admin.users.list', get_defined_vars());

    }
    public function create(){

        $company = Company::all();
        return view('admin.users.add', get_defined_vars());
    }

    public function store(Request $request){

        $request->validate([
            'company_id' => 'required',
            'role'=> 'required',
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required'
        ]);


        User::create([
			'company_id' => $request->company_id,
			'role' => $request->role,
			'name' => $request->name,
			'email' => $request->email,
			'password' => $request->password,
		]);
		return redirect()->route('user.list')->with('success', 'Record is Created Successfully!');

    }

    public function edit($id){
        $company = Company::find($id);
        $users = User::find($id);
        return view('admin.users.edit', get_defined_vars());
    }

    public function update(Request $request, $id){

        $request->validate([
            'company_id' => 'required',
            'role'=> 'required',
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required'
            ]);

            $users = User::find($id);
            $users->company_id =  $request->get('company_id');
            $users->role = $request->get('role');
            $users->name = $request->get('name');
            $users->email = $request->get('email');
            $users->password = $request->get('password');
            $users->update();

            return redirect()->route('user.list')->with('success', 'Record Successfully Updated!');
    }

    public function destroy($id){

        $users = User::find($id);
        $users->delete();
        return redirect()->route('user.list')->with('success', 'Record Deleted Successfully!');
    }

}
