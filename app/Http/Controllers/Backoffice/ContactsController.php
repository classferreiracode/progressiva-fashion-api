<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Contato;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contato::latest()->paginate(20);

        return view('backoffice.contacts.index', compact('contacts'));
    }
}
