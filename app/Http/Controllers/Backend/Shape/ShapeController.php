<?php

namespace App\Http\Controllers\Backend\Shape;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Str;
use App\Models\Shape;

use DataTables;
use SebastianBergmann\Environment\Console;

class ShapeController extends Controller
{
    function ShapeAdd(){
        return view("Backend.Shape.add");
    }

    function ShapeView(){
        $shapes = Shape::get();
        return view("Backend.Shape.list",compact("shapes"));

    }

    function ShapeStore(Request $request){
        $request->validate([
            "name"=>"required"
        ]);

        $name = $request->input("name");

        $shape = new Shape;

        $shape->name = $name;

        $shape->save();

        return redirect()->route("shape.view");
    }

    function ShapeEdit($id){
        $shape = Shape::where("id",$id)->get();

        return view("Backend.Shape.edit",compact("shape"));
    }

    function ShapeUpdate(Request $request, $id){
        $request->validate([
            "name"=>"required"
        ]);

        $name = $request->input("name");

        $data = array(
            "name"=>$name
        );

        Shape::where("id",$id)->update($data);

        return redirect()->route("shape.view");

    }

    function ShapeDelete($id){
        Shape::where("id",$id)->delete();
        return redirect()->route("shape.view");

    }
}
