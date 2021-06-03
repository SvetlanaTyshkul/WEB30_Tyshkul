<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class SimplePageController extends Controller
{
    public function about(){
        return view('about');
    }

    public function services(){
        return view('services');
    }

    public function contact()
    {

         return view('contact', ['contacts' => Contact::all()]);
    }

}
