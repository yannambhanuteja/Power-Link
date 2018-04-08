<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;

use Redirect;

class ContactController extends Controller
{
    public function showContact()
    {
        return view('contact');
    }
    public function submitContact(Request $request)
    {
        $this->validate($request, array(
            'message'=>'required|max:189',
            'email'=>'required',
            'name'=>'required'
        ));

        $contact = new Contact();

        $contact->message = $request->message;
        $contact->email = $request->email;
        $contact->name = $request->name;
        $contact->number = $request->number;
        $contact->save();

        return Redirect::back()->with('success', 'Your Message has Successfully Submitted to Admin');
    }
    public function allContacts()
    {
        $contacts = Contact::all();
        return view('admin.pages.contacts', compact('contacts'));
    }

    public function deleteContact($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return Redirect('/admin/contact')->with('delete', 'Message has Successfully deleted');
    }
}
