<?php

namespace App\Http\Controllers\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Str;
use DataTables;
use SebastianBergmann\Environment\Console;
use App\Models\Products;
use App\Models\Gallery;
use App\Models\Categories;
// use Input;

class FontendController extends Controller
{
    public function getHomePage()
    {
        $sliderData = Gallery::all();
        $productData = Products::latest()->take(10)->get();
        // dd( Str::length($sliderData));
        return view('Fontend.index',['sliderData' => $sliderData,'productData' => $productData]);
    }

    public function getProductPage()
    {
        $productData = Products::all();
        $allCategory = Categories::get();
        return view('Fontend.products',['productData' => $productData,'allCategory' => $allCategory]);
    }

    public function getGalleryPage()
    {
        $productData = Products::all();
        $galleryData = Gallery::all();
        return view('Fontend.gallery',['galleryData' => $galleryData,'productData' => $productData,]);
    }

    public function getContactPage()
    {
        $productData = Products::all();
        return view('Fontend.contact',['productData' => $productData,]);
    }

    public function getAboutPage()
    {
        $productData = Products::all();
        return view('Fontend.about',['productData' => $productData],);
    }

    public function getProductDetailsPage($id)
    {
        $productData = Products::all();
        $singleProductData = products::find($id);
        $relatedProduct = Products::where('product_name',$singleProductData->product_category)->get();
        return view('Fontend.product_details',['singleProductData' => $singleProductData,'relatedProduct' => $relatedProduct,'productData' => $productData,]);
    }

    public function SubCategoryView($cat,$id){
        $productData = Products::where("product_category",$cat)->where("type",$id)->get();
        $allCategory = Categories::get();
        return view('Fontend.subcategory_view',['productData' => $productData,'allCategory' => $allCategory]);

    }
}
