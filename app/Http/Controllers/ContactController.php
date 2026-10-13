<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request)
    {
      //  dd($request->all());
        Contact::create($request->validated());

        return redirect()->back()->with(
            'success',
            'Your message has been sent successfully!'
        );
    }
}
