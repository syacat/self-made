<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contacts::all();
        return view('contacts.index', compact('contacts'));
    }


}
