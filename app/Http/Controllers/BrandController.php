<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;//for the second method Eloquent ORM we need to add the carbon path, otherwise created_at table will be empty

use App\Http\Controllers\BrandController; //must be added for the first and second insert method (recommended method)
use App\Models\Brand; //must be added for the first insert method (recommended method)
use App\Models\NewInBrand;
use Auth; //must be added for the first  and second insert method (recommended method)
use Illuminate\Support\Facades\DB;//Query builder
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Image;

class BrandController extends Controller
{
    public function allBrand()
    {
        /*Query Builder
        $brands = DB::table('brands')->latest()->paginate(5); */
        $brands = Brand::latest()->paginate(5);
        $brandTrash = Brand::onlyTrashed()->latest()->paginate(5);
        return view('admin.brand.index', compact('brands', 'brandTrash'));
    }

    public function storeBrand(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|unique:brands|min:2',
            'brand_img' =>'required|mimes:jpg,png,jpeg'
        ],[
            'brand_img.required' => 'Image required',
            'brand_img.mimes' => 'Only .jpg .png .jpeg extension accepted'
        ]);

        $brand_image = $request->file('brand_img');
/*
        $generate_name = $brand_image->hashName();// Generate a unique, random name...
        $client_extension = $brand_image->getClientOriginalExtension();
        $lowerCase_extention = strtolower($client_extension);
        $image_name = $generate_name.'.'.$lowerCase_extention;
        $path = 'images/Brand/';
        $db_image_name = $path.$image_name;
        $brand_image->move($path, $image_name);
*/
        $lowerCase_extention = strtolower($brand_image->getClientOriginalExtension());
        $generate_name = $brand_image->hashName().'.'.$lowerCase_extention;
        Image::make($brand_image)->resize(300,null)->save('images/Brand/'.$generate_name);

        $db_image_name = 'images/Brand/'.$generate_name;
        Brand::insert([
            'brand_name' => Str::ucfirst($request->brand_name),
            'brand_image'  => $db_image_name,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success','Great job!');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);

        return view('admin.Brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
       $validate = $request->validate([
           'brand_name' =>'required|min:2',
       ],
       [
           'brand_name.required' => "Required field!",
       ]);

            //$old_img = $request->old_img;
           $brand_image = $request->file('brand_img');


            if($brand_image == true ){

                $lowerCase_extention = strtolower($brand_image->getClientOriginalExtension());
                $generate_name = $brand_image->hashName().'.'.$lowerCase_extention;
                Image::make($brand_image)->resize(300,300)->save('images/Brand/'.$generate_name);

                $db_image_name = 'images/Brand/'.$generate_name;
                $unlink = unlink($request->old_img);

                DB::table('brands')->where('id',$id)->update([
                    'brand_name' =>Str::ucfirst( $request->brand_name),
                    'brand_image' => $db_image_name,
                    'created_at' => Carbon::now(),
                ]);



                return Redirect()->back()->with('success','Image Updated.');

            }else{
                Brand::find($id)->update([
                    'brand_name' =>Str::ucfirst( $request->brand_name),
                    'created_at' => Carbon::now(),
                ]);

                return Redirect()->back()->with('success','Brand Name Updated.');

            }



    }
    public function softdelete($id){
        $softdelete = Brand::find($id)->delete();

        return Redirect()->back()->with('success', 'Thrown in the trash');
    }
    public function restore($id){
        $restore = Brand::withTrashed()->find($id)->restore();

        return Redirect()->back()->with('success', 'You have restored Brand');
    }


    public function delete($id){


        $delete =  Brand::onlyTrashed()->find($id);
        unlink( $delete->brand_image);
        $delete->forceDelete();


        return Redirect()->back()->with('success','Brand Name Deleted!');
    }

    public function portfolioPage()
    {
        $portfolio = NewInBrand::get();
        $allBrand = DB::table('brands')->orderBy('brand_name')->get();

        return view('layouts.pages.portfolio', compact('portfolio', 'allBrand'));
    }
    public function newInBrand()
    {
        $newInBrand = NewInBrand::get();
/*
        $displayBrands = DB::table('brands')
                        ->join('new_in_brands', 'brands.id', '=', 'new_in_brands.brand_id')
                        ->select('brands.brand_name','brands.id', 'new_in_brands.image', 'new_in_brands.brand_id')
                        ->where('brands.id','=', 'new_in_brands.brand_id')
                        ->get();
*/
        $allBrand = DB::table('brands')->orderBy('brand_name')->get();
        return view('admin.NewInBrand.index',compact('allBrand','newInBrand'));
    }

    public function storeNewInBrand(Request $request)
    {
        $validate = $request->validate([
            'brand_id' =>'required|not_in:0',
            'brand_img' =>'required'
        ],[
            'brand_id.not_in' => 'You have not chosen any brand.',
            'brand_img.required' =>'Images are required',
        ]);

        $image = $request->file('brand_img');


        foreach ($image as $multiple_img) {

                $lowerCase_extention = strtolower($multiple_img->getClientOriginalExtension());
                $generate_name = hexdec(uniqid()).'.'.$lowerCase_extention;
                $img = Image::make($multiple_img)->resize(null, 600, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save('images/NewInBrand/'.$generate_name);
                $db_image_name = 'images/NewInBrand/'.$generate_name;


                NewInBrand::insert([
                    'brand_id' => $request->brand_id,
                    'image'    => $db_image_name,
                    'created_at' => Carbon::now(),
                ]);
            }//end foreach
            return Redirect()->back()->with('success','Added succesfuly!');
    }

    public function deletenewInBrand($id)
    {
        $delete =  NewInBrand::find($id);
        unlink( $delete->image);
        $delete->forceDelete();


        return Redirect()->back();
    }


}
