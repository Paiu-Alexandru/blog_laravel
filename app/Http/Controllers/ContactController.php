<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\ContactForm;

class ContactController extends Controller
{
    public function adminContact()
    {
        $contacts = DB::table('contacts')->get();
        return view('admin.contact.index', compact('contacts'));
    }
    public function addContact()
    {
        return view('admin.contact.create');
    }

    public function storeContac(Request $request)
    {
        $validate = $request->validate([
            'email'  => 'required',
            'adress' => 'required',
            'phone'  => 'required',
        ]);

        DB::table('contacts')->insert([
            'email'      => $request->email,
            'adress'     => $request->adress,
            'phone'      => $request->phone,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('admin.contact')->with('success', 'Inserted...');
    }
    public function editPage($id)
    {
        $editContact = DB::table('contacts')->find($id);

        return view('admin.contact.edit',compact('editContact'));
    }

    public function updateContact(Request $request, $id)
    {
        $updateContact = DB::table('contacts')->where('id',$id)->update([
            'email'      => $request->email,
            'adress'     => $request->adress,
            'phone'      => $request->phone,
        ]);

        return Redirect()->route('admin.contact')->with('success', 'Updated...');
    }

    public function deleteContact($id)
    {
        DB::table('contacts')->where('id',$id)->delete();

        return Redirect()->back()->with('delete', 'Deleted...');
    }

    public function contactPage()
    {
        $contacts = DB::table('contacts')->latest()->first();
        return view('layouts.pages.contact', compact('contacts'));
    }

    public function contactForm(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:4',
            'email' => 'required',
            'subject' => 'required|min:8',
            'message' => 'required',
        ]);

        ContactForm::insert([
            'name'      => $request->name,
            'email'      => $request->email,
            'subject'     => $request->subject,
            'message'      => $request->message,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('contact')->with('success', 'Message was sent successfully...');
    }

    public function adminMessage()
    {
        $mess = ContactForm::all();

        return view('admin.contact.message', compact('mess'));
    }

    public function deleteMessage($id)
    {
        $delete = ContactForm::find($id)->delete();

        return redirect()->route('admin.message')->with('success', 'Message was Deleted...');
    }
}
