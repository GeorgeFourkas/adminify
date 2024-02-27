<?php

namespace App\Http\Controllers\Admin\Adminify;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Adminify\ContactFormSubmissionRequest;
use App\Mail\ContactMail;
use App\Mail\Models\ContactMailModel;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function send(ContactFormSubmissionRequest $request)
    {
        $mailModel = new ContactMailModel($request->all());

        Mail::to('georgefou-98@hotmail.com')->send(new ContactMail($mailModel));

        return redirect()->back()->with('success', 'success');
    }
}
