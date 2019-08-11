<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    public function store(Request $request)
    {
        $feedback = new Feedback();

        $feedback->name = $request->name;
        $feedback->like = $request->like;
        $feedback->message = $request->message;
        $feedback->save();

        return back();
    }
}
