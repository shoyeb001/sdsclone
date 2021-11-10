<?php

namespace App\Http\Controllers\Backend\Gallery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Str;
use DataTables;
use SebastianBergmann\Environment\Console;
use App\Models\Gallery;
// use Input;

class GalleryController extends Controller
{
    public function index()
    {
        return view('Backend.Gallery.gallery');
    }

    public function datatable()
    {
        $query = Gallery::select('*');
        return DataTables::eloquent($query)
            ->addColumn('id', function ($data) {
                return $data->id;
            })
            ->addColumn('name', function ($data) {
                return $data->name;
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
                    $edit .= '<a href="javascript:active_InActive_Gallery(' . $data->id . ',' . $data->status . ');" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-ok-circle"></span> </a>&emsp;';
                } else {
                    $edit .= '<a href="javascript:active_InActive_Gallery(' . $data->id . ',' . $data->status . ');" class="btn btn-sm btn-warning" ><span class="glyphicon glyphicon-ban-circle"></span> </a>&emsp;';
                }
                $edit .= '</span>';

                return $edit;
            })
            ->addColumn('is_slider', function ($data) {

                $edit = '<span id="is_slider">';

                $edit .= '<span id="is_slider' . $data->id . '">';

                if ($data->is_slider == 'Active') {
                    $edit .= '<a href="javascript:active_InActive_isSlider(' . $data->id . ',' . $data->is_slider . ');" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-ok-circle"></span> </a>&emsp;';
                } else {
                    $edit .= '<a href="javascript:active_InActive_isSlider(' . $data->id . ',' . $data->is_slider . ');" class="btn btn-sm btn-warning" ><span class="glyphicon glyphicon-ban-circle"></span> </a>&emsp;';
                }
                $edit .= '</span>';

                return $edit;
            })
            ->addColumn('action', function ($data) {
                $url_update = route('editGallery', ['id' => $data->id]);
                $url_delete = route('deleteGallery', ['id' => $data->id]);
                $edit = '<a class="label label-primary" data-title="Edit Products" data-act="ajax-modal" data-append-id="AjaxModelContent" data-action-url="' . $url_update . '" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </a>';

                $edit .= '&nbsp<a href="' . $url_delete . '" class="label label-danger" data-confirm="Are you sure to delete Products: <span class=&#034;label label-primary&#034;>' . $data->name . '</span>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete </a>';

                return $edit;
            })
            ->filter(function ($query) {

            }, true)
            ->startsWithSearch()
            ->rawColumns(['product_name', 'Image', 'status','is_slider', 'action'])
            ->toJson();
    }

    public function add()
    {
        return view('Backend.Gallery.Add');
    }

    public function save(Request $request)
    {
        $msg = [
            'name.required' => 'Enter Gallery Name',
            'filename.required' => 'Upload image',
        ];

        $this->validate($request, [
            'name' => 'required',
            'filename' => 'required',
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

        $productsData = new Gallery();
        $productsData->gallery = json_encode($data);
        $productsData->name = $request->name;
        $productsData->save();
        Session::flash('success', "Products has been created");
        return redirect()->back();
    }

    public function edit($id)
    {
        $details = Gallery::find($id);
        // dd($details);
        return view('Backend.Gallery.Edit', compact('id', 'details'));
    }

    public function update(Request $request)
    {
        $msg = [
            'name.required' => 'Enter Category Name',
        ];

        $this->validate($request, [
            'name' => 'required',
        ], $msg);

        $id = $request->get('id');
        $productsData =  Gallery::find($id);

        if (!empty($request->file('filename'))) {
            $gallery = json_decode($productsData->gallery);
            foreach ($gallery as $img) {
                // $oldImage = $productsData->gallery;
                $image_path = public_path("/uploads/") . $img;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
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
        $productsData->name = $request->name;
        $productsData->save();

        Session::flash('success', "Products has been Update");
        return redirect()->back();
    }

    public function active_InActive_Gallery(Request $request)
    {
        $id = $request->get('id');
        $status = $request->get('status');
        if ($status == 'Active') {
            Gallery::where('id', $id)->update([
                'status' => 'InActive',
            ]);
            $st = 'InActive';
            $html = '<a href="javascript:void(0);" class="btn btn-sm btn btn-warning" onclick="active_InActive_Gallery(' . $id . ',' . $st . ')"><span class="glyphicon glyphicon-ban-circle"></span></a>&emsp;';
            return json_encode(array('id' => $id, 'html' => $html));
        } else {
            Gallery::where('id', $id)->update([
                'status' => 'Active',
            ]);
            $st = 'Active';
            $html = '<a href="javascript:void(0);" class="btn btn-sm btn btn-success" onclick="active_InActive_Gallery(' . $id . ',' . $st . ')"><span class="glyphicon glyphicon-ok-circle"></span></a>&emsp;';
            return json_encode(array('id' => $id, 'html' => $html));
        }
    }

    public function active_InActive_isSlider(Request $request)
    {
        $id = $request->get('id');
        $is_slider = $request->get('is_slider');
        if ($is_slider == 'Active') {
            Gallery::where('id', $id)->update([
                'is_slider' => 'InActive',
            ]);
            $st = 'InActive';
            $html = '<a href="javascript:void(0);" class="btn btn-sm btn btn-warning" onclick="active_InActive_isSlider(' . $id . ',' . $st . ')"><span class="glyphicon glyphicon-ban-circle"></span></a>&emsp;';
            return json_encode(array('id' => $id, 'html' => $html));
        } else {
            Gallery::where('id', $id)->update([
                'is_slider' => 'Active',
            ]);
            $st = 'Active';
            $html = '<a href="javascript:void(0);" class="btn btn-sm btn btn-success" onclick="active_InActive_isSlider(' . $id . ',' . $st . ')"><span class="glyphicon glyphicon-ok-circle"></span></a>&emsp;';
            return json_encode(array('id' => $id, 'html' => $html));
        }
    }

    public function delete($id)
    {
        $productsData =  Gallery::find($id);
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
}
