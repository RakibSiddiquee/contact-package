<?php

namespace Axilweb\Contact\Http\Controllers;


use App\Http\Controllers\Controller;
use Axilweb\Contact\Mail\ContactMail;
use Axilweb\Contact\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return 'Home';
    }

    public function contact()
    {
        return view('contact::contact');
    }

    public function send()
    {
        Mail::to(config('contact.send_mail_to'))->send(new ContactMail(request()->email, request()->message, request()->name));
        Contact::create(request()->all());
        return redirect('contact');
    }
}
