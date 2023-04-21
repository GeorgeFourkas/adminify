<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        Subscriber::create($request->only('email'));
        return redirect()->back()->with('success', 'Thank you for subscribing to our newsletter');
    }
}
