<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//For Query builder
use Illuminate\Support\Carbon;
use App\Models\About;

class AboutController extends Controller
{
    public function aboutPage()
    {
        $abouts = About::latest()->get();
        return view('layouts.body.about_page', compact('abouts'));
    }

    public function homeAbout()
    {
        $abouts = About::latest()->get();
        return view('admin.about.about', compact('abouts'));
    }

    public function addAbout()
    {
        return view('admin.about.form');
    }

    public function storeAbout(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:abouts|min:4',
            'short_description' => 'required|min:4',
            'description' => 'required|unique:abouts|min:4',
        ]);

        DB::table('abouts')->insert([
            'title'             => ucfirst($request->title),
            'short_description' => $request->short_description,
            'description'       => $request->description,
            'created_at'        => Carbon::now(),

        ]);
        return redirect()->route('home.about')->with('success','About section Inserted.');
    }

    public function editPage($id)
    {
        $editPage = About::find($id);
        return view('admin.about.edit', compact('editPage'));
    }

    public function updateAbout(Request $request, $id)
    {
        About::find($id)->where('id',$id)->update([
            'title'             => ucfirst($request->title),
            'short_description' => $request->short_description,
            'description'       => $request->description,
            'updated_at'       => Carbon::now(),
        ]);
        return redirect()->route('home.about')->with('success','About section Updated.');
    }

    public function deleteAbout($id)
    {
        About::find($id)->forceDelete();
        return redirect()->back()->with('delete','About section Deleted.');
    }


}
