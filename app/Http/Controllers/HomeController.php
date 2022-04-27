<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Models\Slider;
use Auth;
use Image;

class HomeController extends Controller
{
    public function homeSlider()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.slider', compact('sliders'));
    }
    public function addSlider()
    {
        return view('admin.slider.addslider');
    }
    public function storeSliders(Request $request)
    {
        $request->validate([
            'title' =>'required|unique:sliders|min:4',
            'description' => 'required',
            'slider_img' => 'required|mimes:jpg,jpeg,png'

        ],
        [
            'title.required' => 'Image required',
            'description.required' => 'Image required',
            'slider_img.mimes' => 'Only .jpg .png .jpeg extension accepted'
        ]);

        $store_img = $request->file('slider_img');
        $lowerCase_extention = strtolower($store_img->getClientOriginalExtension());
        $generate_name = $store_img->hashName().'.'.$lowerCase_extention;

        Image::make($store_img)->resize(1920,1088)->save('images/Sliders/'.$generate_name);
        $db_image = 'images/Sliders/'.$generate_name;

        $insert =  Slider::insert([
            'title'         => Str::ucfirst($request->title),
            'description'   => $request->description,
            'image'         => $db_image,
            'created_at'    => Carbon::now(),
        ]);

            return Redirect()->route('home.slider')->with('success', 'Added successfully.') ;
    }

    function editSlider($id)
    {
        $edit = Slider::find($id);

        return view('admin.slider.edit_slider',compact('edit'));
    }

    public function updatetSlider(Request $request, $id)
    {
        $request->validate([
            'title' =>'required|min:4',
            'description' => 'required',
            'slider_img' => 'mimes:jpg,jpeg,png'

        ],
        [
            'title.required' => 'Image required',
            'description.required' => 'Image required',
            'slider_img.mimes' => 'Only .jpg .png .jpeg extension accepted'
        ]);

        $store_img = $request->file('slider_img');
        if ($store_img == true) {

            $lowerCase_extention = strtolower($store_img->getClientOriginalExtension());
            $generate_name = $store_img->hashName().'.'.$lowerCase_extention;

            Image::make($store_img)->resize(1920,1088)->save('images/Sliders/'.$generate_name);
            $db_image = 'images/Sliders/'.$generate_name;
            $unlink = unlink($request->old_img);

            $insert =  Slider::find($id)->where('id',$id)->update([
                'title'         => Str::ucfirst($request->title),
                'description'   => $request->description,
                'image'         => $db_image,
                'created_at'    => Carbon::now(),
            ]);
            return Redirect()->route('home.slider')->with('success', 'Image has been Updated.') ;

        } else {
            $insert =  Slider::find($id)->update([
                'title'         => Str::ucfirst($request->title),
                'description'   => $request->description,
                'created_at'    => Carbon::now(),
            ]);
            return Redirect()->route('home.slider')->with('success', 'Text has been Updated.') ;
        }
    }

    public function deleteSlider($id)
    {
        $delete = Slider::find($id);
        unlink($delete->image);
        $delete->forceDelete();

        return Redirect()->back()->with('delete','Slider has been deleted.');
    }
}
