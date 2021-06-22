<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
// use File;
use Illuminate\Support\Facades\File;
use App\Exports\CompaniesExport;
use Maatwebsite\Excel\Facades\Excel;
// use Maatwebsite\Excel\Facades\DOMPDF;
use Dompdf\Dompdf;
class CompanyController extends Controller
{
    public function index(){

        $company = Company::all();
        return view('admin.company.list', get_defined_vars());
    }
    public function create(){

        return view('admin.company.add');
    }

    public function store(Request $request){

        {
            $this->validate($request, [
                'company' => 'required',
                'link' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);


            $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $input['image']);


            $input['company'] = $request->company;
            $input['link'] = $request->link;
            Company::create($input);

            return redirect('company')->with('success','Record Added Successfully!');
        }
    }

    public function edit($id){

        $company = Company::find($id);
        return view('admin.company.edit', get_defined_vars());
    }
    public function update(Request $request, $id)
    {


        $company = Company::find($id);

        $company->company = $request->input('company');
        $company->link = $request->input('link');


         $myFile = public_path('uploads/'.$company->image);
         // dd($myFile);
         if (file_exists($myFile)) {
         unlink($myFile);
    }

        if($request->hasfile('image') ){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().  '.' .$extension;
            $file->move('uploads/',$filename);
            $company->image = $filename;

        }

        $company->save();



    //     $users = Company::find($id);
    //     $file = Input::file('image');
    //     $name = time() . '-' . $file->getClientOriginalName();
    //     $file = $file->move(('uploads/'), $name);
    //     $users->image= $name;
    //     $users->company= $nme;
    // }
    // $users->save();
    // if(Input::hasFile('image'))
    //    {
    //        $usersImage = public_path("uploads/{$users->image_file}"); // get previous image from folder
    //        if (File::exists($usersImage)) { // unlink or remove previous image from folder
    //           unlink($usersImage);
    //        }





        // $image_name = $request->hidden_image;
        // $image = $request->file('image');
        // if($image != '')  // here is the if part when you dont want to update the image required
        // {
        //     $request->validate([
        //         'company'    =>  'required',
        //         'link'     =>  'required',
        //         'image'    =>  'image|max:2048'
        //     ]);

        //     $image_name = rand() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('uploads'), $image_name);
        // }
        // else  // this is the else part when you dont want to update the image not required
        // {
        //     $request->validate([
        //         'company'    =>  'required',
        //         'link'     =>  'required',
        //     ]);
        // }
        // $input_data = array(
        //     'company'       =>   $request->company,
        //     'link'        =>   $request->link,
        //     'image'            =>   $image_name
        // );
        // Company::whereId($id)->update($input_data);

        return redirect('company')->with('success', 'Record Updated Successfully!');
    }

    public function destroy($id) //  here is the part for delete employee
    {
        $data = Company::find($id);
        $myFile = public_path('uploads/'.$data->image);
        // dd($myFile);
        if (file_exists($myFile)) {
        unlink($myFile);
   }
        $data->delete();

        return redirect()->route('company.list')->with('success', 'Record Deleted Successfully!');
    }

    public function exportxl(){

        return Excel::download(new CompaniesExport, 'company.csv', );
    }

    public function exportpdf(){

        return Excel::download(new CompaniesExport, 'company.pdf', );
    }

}
