<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use App\Models\ContactUs as ModelsContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function index()
    {
        $this->authorize('isAdmin', Auth::user());
        $messages = ModelsContactUs::latest()->paginate(10);
        $msg = " Contact Us Messages";

        return view('dashboard.contact_us.index', ['messages' => $messages, 'msg' => $msg]);
    }

    public function Store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'message' => 'required|max:500',
        ]);

        // Store User
        $contactUs = ModelsContactUs::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Send an email to the admin
        Mail::to($request->email)->send(new ContactUs($contactUs));



        return back()->with('success', 'Message Sent Successfully!');
    }
}
