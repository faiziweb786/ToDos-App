<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contactUs() {
        $contacts = Contact::all();
        return view('user.contact-us' , compact('contacts'));
    }
    
    public function viewContact() {
        $contacts = Contact::all();
        return view('admin.pages.contact-us.contact-us' , compact('contacts'));
    }
    public function storeContact(Request $req) {
        $contact = $req->validate([
            'address' => 'required',
            'pnumber' => 'required|regex:/^\+\d{2}-\d{3}-\d{7}$/',
            'opt_number' => 'nullable|numeric',
            'email' => 'required|email',
            'opt_email' => 'nullable|email',
            'comp_email' => 'required|email',
            'start_day' => 'required',
            'end_day' => 'required',
            'off_day' => 'required',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:time_start',
        ]);

        $existingcontact = Contact::first();
        if ($existingcontact) {
            $existingcontact->delete();
        }

        $contact = New Contact;
        $contact->address = $req['address'];
        $contact->pnumber = $req['pnumber'];
        $contact->opt_number = $req['opt_number'];
        $contact->email = $req['email'];
        $contact->opt_email = $req['opt_email'];
        $contact->comp_email = $req['comp_email'];
        $contact->start_day = $req['start_day'];
        $contact->end_day = $req['end_day'];
        $contact->off_day = $req['off_day'];
        $contact->start_time = $req['start_time'];
        $contact->end_time = $req['end_time'];
        $contact->save();
        return redirect()->route('view-contact')->with('success' , 'Your Contact successfully save!');
    } 

    public function editContact(Request $req, $contact_id) {
        $contact = Contact::findorFail($contact_id);
        return view('admin.pages.contact-us.edit-contact' , compact('contact'));
    }

    public function updateContact(Request $req, $contact_id) {
        $req->validate([
            'address' => 'required',
            'pnumber' => 'required|regex:/^\+\d{2}-\d{3}-\d{7}$/',
            'opt_number' => 'nullable|numeric',
            'email' => 'required|email',
            'opt_email' => 'nullable|email',
            'comp_email' => 'required|email',
            'start_day' => 'required',
            'end_day' => 'required',
            'off_day' => 'required',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:time_start',
        ]);
        $contact = Contact::findorFail($contact_id);
        $contact->address = $req['address'];
        $contact->pnumber = $req['pnumber'];
        $contact->opt_number = $req['opt_number'];
        $contact->email = $req['email'];
        $contact->opt_email = $req['opt_email'];
        $contact->comp_email = $req['comp_email'];
        $contact->start_day = $req['start_day'];
        $contact->end_day = $req['end_day'];
        $contact->off_day = $req['off_day'];
        $contact->start_time = $req['start_time'];
        $contact->end_time = $req['end_time'];
        $contact->save();
        return redirect()->route('view-contact')->with('success' , 'Your Contact successfully save!');
    }
}
