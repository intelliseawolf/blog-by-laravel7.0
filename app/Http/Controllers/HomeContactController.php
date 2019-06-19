<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeContactRequest;
use App\Mail\HomeContactMail;
use Illuminate\Support\Facades\Mail;

class HomeContactController extends Controller
{
    /**
     * Send Contact Email Function via Mail.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactSend(HomeContactRequest $request)
    {
        $validatedData = $request->validated();
        Mail::to(config('mail.from.address'))->send(new HomeContactMail($validatedData));

        return response()->json(null, 200);
    }
}
