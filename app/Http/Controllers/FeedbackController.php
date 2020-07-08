<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;
use Auth;

class FeedbackController extends Controller
{

    public function store(Request $request)
    {
        $feedback = new Feedback();

        $feedback->name = Auth::user()->name;
        if($request->like == 'on')
        {
            $feedback->like = true;
        }
        else
        {
            $feedback->like = false;
        }
        $feedback->comment = $request->comment;
        $feedback->book_id = $request->book_id;
        $feedback->save();

        return back();
    }
}
