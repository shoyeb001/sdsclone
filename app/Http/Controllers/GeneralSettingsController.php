<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use Session;


class GeneralSettingsController extends Controller
{
    public function index(){
        $GeneralSetting = GeneralSetting::first();
        return view('Backend.Settings.GeneralSetting.All',['ID'=>$GeneralSetting->id,'data'=>$GeneralSetting]);
    }
    // C:\xampp\htdocs\JN_Network\sds_clone\sds_clone\resources\views\Backend\Settings\Company\All.blade.php
    public function saveGeneralSetting(Request $request, $id){

        $GeneralSetting= GeneralSetting::findOrFail($id);
        if ($request->hasFile('company_logo')) {
            $file            = $request->file('company_logo');
            $destinationPath = '/uploads/generalSetting/';
            $filename        = 'logo.' . $file->getClientOriginalExtension();
            $request->file('company_logo')->move(public_path().$destinationPath, $filename);
            $GeneralSetting->company_logo=$filename;
        }
        $GeneralSetting->save();

        Session::flash('success', "General setting has been updated");
        return redirect()->back();
    }

}
