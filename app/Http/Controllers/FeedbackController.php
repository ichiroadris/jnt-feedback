<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class FeedbackController extends Controller
{
    public function create(Request $req)
    {
        Feedback::create([
            'star' => $req->input('star'),
            'comment' => $req->input('comment')
        ]);

        return redirect()->back()->with('message', 'Post Created Successfully.');
    }
}
