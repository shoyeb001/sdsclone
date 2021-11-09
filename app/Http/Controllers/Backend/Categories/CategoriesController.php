<?php

namespace App\Http\Controllers\Backend\Categories;

use App\Http\Controllers\Controller;
use App\Models\Categories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Str;

use DataTables;
use SebastianBergmann\Environment\Console;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('Backend.Category.All');
    }

    public function datatable()
    {
        $query = Categories::select('*');
        return DataTables::eloquent($query)
            ->addColumn('id', function ($data) {
                return $data->id;
            })
            ->addColumn('name', function ($data) {
                return $data->name;
            })
            ->addColumn('status', function ($data) {

                $edit = '<span id="status">';

                $edit .= '<span id="status' . $data->id . '">';

                if ($data->status == 'Active') {
                    $edit .= '<a href="javascript:active_inactive_category(' . $data->id . ',' . $data->status . ');" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-ok-circle"></span> </a>&emsp;';
                } else {
                    $edit .= '<a href="javascript:active_inactive_category(' . $data->id . ',' . $data->status . ');" class="btn btn-sm btn-warning" ><span class="glyphicon glyphicon-ban-circle"></span> </a>&emsp;';
                }
                $edit .= '</span>';

                return $edit;
            })
            ->addColumn('action', function ($data) {
                $url_update = route('editCategory', ['id' => $data->id]);
                $url_delete = route('deleteCategory', ['id' => $data->id]);
                $edit = '<a class="label label-primary" data-title="Edit Category" data-act="ajax-modal" data-append-id="AjaxModelContent" data-action-url="' . $url_update . '" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </a>';

                $edit .= '&nbsp<a href="' . $url_delete . '" class="label label-danger" data-confirm="Are you sure to delete Category: <span class=&#034;label label-primary&#034;>' . $data->name . '</span>"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete </a>';

                return $edit;
            })
            ->rawColumns(['name', 'status', 'action'])
            ->toJson();
    }

    public function add()
    {

        return view('Backend.Category.Add');
    }

    public function save(Request $request)
    {
        $msg = [
            'name.required' => 'Enter Category Name',
        ];

        $this->validate($request, [
            'name' => 'required',

        ], $msg);

        $data = $request->all();
        $categoryData = new Categories();
        $categoryData->name = $data['name'];
        $categoryData->save();

        Session::flash('success', "Category has been created");
        return redirect()->back();
    }

    public function edit($id)
    {
        $details = Categories::find($id);
        return view('Backend.Category.Edit', compact('id', 'details'));
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
        $data = $request->all();
        $categoryData =  Categories::find($id);
        $categoryData->name = $data['name'];
        $categoryData->save();

        Session::flash('success', "Category has been Update");
        return redirect()->back();
    }

    public function active_inactive_category(Request $request)
    {
        $id = $request->get('id');
        $status = $request->get('status');
        if ($status == 'Active') {
            Categories::where('id', $id)->update([
                'status' => 'Inactive',
            ]);
            $st = 'Inactive';
            $html = '<a href="javascript:void(0);" class="btn btn-sm btn btn-warning" onclick="active_inactive_category(' . $id . ',' . $st . ')"><span class="glyphicon glyphicon-ban-circle"></span></a>&emsp;';
            return json_encode(array('id' => $id, 'html' => $html));
        } else {
            Categories::where('id', $id)->update([
                'status' => 'Active',
            ]);
            $st = 'Active';
            $html = '<a href="javascript:void(0);" class="btn btn-sm btn btn-success" onclick="active_inactive_category(' . $id . ',' . $st . ')"><span class="glyphicon glyphicon-ok-circle"></span></a>&emsp;';
            return json_encode(array('id' => $id, 'html' => $html));
        }
    }

    public function delete($id)
    {
        $category = Categories::find($id);
        $category->delete();
        Session::flash('success', "Category has been Deleted");
        return redirect()->back();
    }
}
