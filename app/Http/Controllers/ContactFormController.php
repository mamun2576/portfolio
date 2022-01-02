<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactFormController extends Controller
{
    public function store()
    {
        $contact_form_data= request()->all();
        Mail::to('mamun191152576@gmail.com')->send(new ContactFormMail($contact_form_data));

        return redirect()->route('home','/#contact')->with('Success','Your Message has been Submitted Successfully');
    }
}
