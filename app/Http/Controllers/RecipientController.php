<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipients;

class RecipientController extends Controller
{
    public function index()
    {
       
        $recipients = Recipients::all();
        return view('recipient', compact('recipients'));
          
    }

   
}
