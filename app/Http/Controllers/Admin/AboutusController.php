<?php

namespace App\Http\Controllers\Admin;

use App\Models\Abouts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AboutusController extends Controller
{
    public function index()
    {
        $aboutus = Abouts::all();
        return view('admin.aboutus')
            ->with('aboutus',$aboutus)
        ;
    }
    public function store(Request $request)
    {
        $aboutus = new Abouts;

        $aboutus->name = $request->input('name');
        $aboutus->mobile = $request->input('mobile');
        $aboutus->BloodGroup = $request->input('BloodGroup');
        $aboutus->Gender = $request->input('Gender');
        $aboutus->Experience = $request->input('Experience');
        $aboutus->Qualification = $request->input('Qualification');

        $aboutus->save();
        
        return redirect('/abouts')->with('status','Data Added for User Information');
    }
    public function edit($id)
    {
        $aboutus = Abouts::findOrFail($id);
        return view('admin.abouts.edit')
            ->with('aboutus',$aboutus)
        ;
    }
    public function update(Request $request, $id)
    {
        $aboutus = Abouts::findOrFail($id);
        $aboutus->name = $request->input('name');
        $aboutus->mobile = $request->input('mobile');
        $aboutus->BloodGroup = $request->input('BloodGroup');
        $aboutus->Gender = $request->input('Gender');
        $aboutus->Experience = $request->input('Experience');
        $aboutus->Qualification = $request->input('Qualification');


        $aboutus->update();

        return redirect('/abouts')->with('status','Data Updated for User Information');
    }
    public function delete($id)
    {
        $aboutus = Abouts::findOrFail($id);
        $aboutus->delete();

        return redirect('/abouts')->with('status','Data Deleted for User Information');
    }

}
