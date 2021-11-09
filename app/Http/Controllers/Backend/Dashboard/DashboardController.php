<?php

namespace App\Http\Controllers\Backend\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Str;
use DataTables;
use SebastianBergmann\Environment\Console;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Backend.Dashboard.dashboard');
    }

    public function datatable()
    {
        $query = products::select('*');
        return DataTables::eloquent($query)
            ->addColumn('id', function ($data) {
                return $data->id;
            })
            ->addColumn('name', function ($data) {
                return $data->name;
            })
            ->rawColumns(['name',])
            ->toJson();
    }

    public function add()
    {

        return view('Backend.Dashboard.Add');
    }

    public function save(Request $request)
    {
        $msg = [
            'name.required'=>'Enter Category Name',
        ];

        $this->validate($request,[
            'name' =>'required',

        ],$msg);

        $data = $request->all();
        $categoryData = new products();
        $categoryData->name = $data['name'];
        $categoryData->save();

        Session::flash('success', "Category has been created");
        return redirect()->back();
    }

    public function edit($id)
    {
        $details = products::find($id);
        return view('Backend.Dashboard.Edit', compact( 'id','details'));

    }

    public function update(Request $request)
    {
        $msg = [
            'name.required'=>'Enter Category Name',
        ];

        $this->validate($request,[
            'name' =>'required',
        ],$msg);

        $id = $request->get('id');

        $data = $request->all();

        $categoryData =  products::find($id);

        $oldImage = $categoryData->image;

        if (!empty($request->file('image'))){

            $CatImage = explode('/',$oldImage);
            $CatImage = end($CatImage);

        $fullpath =  storage_path('app/public/products/'.$CatImage);

            if(file_exists($fullpath)){

                unlink( $fullpath);
            }

            $StoreImage = Storage::disk('local')->put('public/products',$data['image']);
            $StoreImage = url('/').Storage::url($StoreImage);

        }else{
            $StoreImage = $oldImage;
        }


        $categoryData->name = $data['name'];
        $categoryData->type = $data['type'];
        $categoryData->image = $StoreImage;
        $categoryData->save();

        Session::flash('success', "Category has been Update");
        return redirect()->back();
    }

    public function active_inactive_category(Request $request)
    {

        $id = $request->get('id');
        $status = $request->get('status');
        if($status=='Active'){
            products::where('id',$id)->update([
                'status' => 'Inactive',
            ]);
            $st='Inactive';
            $html='<a href="javascript:void(0);" class="btn btn-sm btn btn-warning" onclick="active_inactive_category('.$id.','.$st.')"><span class="glyphicon glyphicon-ban-circle"></span></a>&emsp;';
            return json_encode(array('id'=>$id,'html'=>$html));
        }
        else{
            products::where('id',$id)->update([
                'status' => 'Active',
            ]);
            $st='Active';
            $html='<a href="javascript:void(0);" class="btn btn-sm btn btn-success" onclick="active_inactive_category('.$id.','.$st.')"><span class="glyphicon glyphicon-ok-circle"></span></a>&emsp;';
            return json_encode(array('id'=>$id,'html'=>$html));
        }
    }

    public function delete($id)
    {
        $category = products::find($id);

        $path =  storage_path('app/public/products/'.$category->image);

        if (file_exists($path)){
            unlink($path);
        }
        $category->delete();
        Session::flash('success', "Category has been Deleted");
        return redirect()->back();
    }

}
