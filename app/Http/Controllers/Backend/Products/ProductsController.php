<?php

namespace App\Http\Controllers\Backend\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Str;
use DataTables;
use SebastianBergmann\Environment\Console;
use App\Models\Products;
use App\Models\Categories;

class ProductsController extends Controller
{
    public function index()
    {
        return view('Backend.Products.products');
    }

    public function datatable()
    {
        $query = Products::select('*');
        return DataTables::eloquent($query)
            ->addColumn('id', function ($data) {
                return $data->id;
            })
            ->addColumn('name', function ($data) {
                return $data->product_name;
            })
            ->editColumn('Image', function ($data) {
                $img = json_decode($data->gallery);
                $content = '';
                foreach ($img as $photo) {
                    $pic = asset('/uploads/' . $photo);
                    $content .= '<a class="magnific-image" href="' . $pic . '"> <img src="' . $pic . '"  width="50px" height="50px"></a><a class="magnific-image" href="' . $pic . '">';
                }
                return $content;
            })
            ->addColumn('status', function ($data) {

                $edit = '<span id="status">';

                $edit .= '<span id="status' . $data->id . '">';

                if ($data->status == 'Active') {
                    $edit .= '<a href="javascript:active_InActive_product(' . $data->id . ',' . $data->status . ');" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-ok-circle"></span> </a>&emsp;';
                } else {
                    $edit .= '<a href="javascript:active_InActive_product(' . $data->id . ',' . $data->status . ');" class="btn btn-sm btn-warning" ><span class="glyphicon glyphicon-ban-circle"></span> </a>&emsp;';
                }
                $edit .= '</span>';

                return $edit;
            })
            ->addColumn('action', function ($data) {
                $url_update = route('editProducts', ['id' => $data->id]);
                $url_delete = route('deleteProducts', ['id' => $data->id]);
                $edit = '<a class="label label-primary" data-title="Edit Products" data-act="ajax-modal" data-append-id="AjaxModelContent" data-action-url="' . $url_update . '" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </a>';

                $edit .= '&nbsp<a href="' . $url_delete . '" class="label label-danger" data-confirm="Are you sure to delete Products: <span class=&#034;label label-primary&#034;>' . $data->name . '</span>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete </a>';

                return $edit;
            })
            ->filter(function ($query) {
                if (request()->has('product_name')) {
                    $query->where('product_name', 'like', "%" . request('product_name') . "%");
                }
                if (request()->has('id')) {
                    $query->where('id', request('id'));
                }
            }, true)
            ->startsWithSearch()
            ->rawColumns(['product_name', 'Image', 'status', 'action'])
            ->toJson();
    }

    public function add()
    {
        $allCategory = Categories::get();
        return view('Backend.Products.Add',['allCategory' => $allCategory]);
    }

    public function save(Request $request)
    {
        $msg = [
            'name.required' => 'Enter Category Name',
            'product_category.required' => 'product category is required',
            'filename.required' => 'Upload image',
        ];

        $this->validate($request, [
            'name' => 'required',
            'product_category' => 'required',
            'filename' => 'required',
            'type'=>'required',
            'price'=>'required',
            'description'=>'required'
        ], $msg);
        if ($request->hasFile('filename')) {
            foreach ($request->file('filename') as $image) {
                $random = Str::random(40);
                $destinationPath = public_path('/uploads/');
                $imageURL = md5($random.time()) . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $imageURL);
                $data[] = $imageURL;
            }
        }
        // dd($data);

        $productsData = new Products();
        $productsData->gallery = json_encode($data);
        $productsData->product_name = $request->name;
        $productsData->product_category = $request->product_category;
        $productsData->type = $request->type;
        $productsData->price = $request->price;
        $productsData->description = $request->description;
        $productsData->save();
        Session::flash('success', "Products has been created");
        return redirect()->back();
    }

    public function edit($id)
    {
        $details = products::find($id);
        $allCategory = Categories::get();
        // dd($details);
        return view('Backend.Products.Edit', compact('id', 'details','allCategory'));
    }

    public function update(Request $request)
    {
        $msg = [
            'name.required' => 'Enter Category Name',
            'product_category.required' => 'product category is required',
        ];

        $this->validate($request, [
            'name' => 'required',
            'product_category' => 'required',
        ], $msg);

        $id = $request->get('id');
        $productsData =  products::find($id);
        if (!empty($request->file('filename'))) {
            $gallery = json_decode($productsData->gallery);
            foreach ($gallery as $img) {
                $image_path = public_path("/uploads/") . $img;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

        foreach ($request->file('filename') as $image) {
            $random = Str::random(40);
            $destinationPath = public_path('/uploads/');
            $imageURL = md5($random.time()) . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageURL);
            $data[] = $imageURL;
        }
        $productsData->gallery = json_encode($data);
        }

        $productsData->product_name = $request->name;
        $productsData->product_category = $request->product_category;
        $productsData->type = $request->type;
        $productsData->price = $request->price;
        $productsData->description = $request->description;
        $productsData->save();

        Session::flash('success', "Products has been Update");
        return redirect()->back();
    }

    public function active_InActive_product(Request $request)
    {

        $id = $request->get('id');
        $status = $request->get('status');
        if ($status == 'Active') {
            products::where('id', $id)->update([
                'status' => 'InActive',
            ]);
            $st = 'InActive';
            $html = '<a href="javascript:void(0);" class="btn btn-sm btn btn-warning" onclick="active_InActive_product(' . $id . ',' . $st . ')"><span class="glyphicon glyphicon-ban-circle"></span></a>&emsp;';
            return json_encode(array('id' => $id, 'html' => $html));
        } else {
            products::where('id', $id)->update([
                'status' => 'Active',
            ]);
            $st = 'Active';
            $html = '<a href="javascript:void(0);" class="btn btn-sm btn btn-success" onclick="active_InActive_product(' . $id . ',' . $st . ')"><span class="glyphicon glyphicon-ok-circle"></span></a>&emsp;';
            return json_encode(array('id' => $id, 'html' => $html));
        }
    }

    public function delete($id)
    {
        $productsData =  products::find($id);

        if (!empty($productsData->gallery)) {
            $gallery = json_decode($productsData->gallery);
            foreach ($gallery as $img) {
                $image_path = public_path("/uploads/") . $img;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        }
        $productsData->delete();
        Session::flash('success', "Products has been deleted");
        return redirect()->back();
    }

    public function SearchProduct(Request $request){
        $query = $request->input("search");
        $searchData = Products::where("product_name","like","%".$query."%")->get();
        return view("Fontend.search",compact("searchData"));
    }
}
