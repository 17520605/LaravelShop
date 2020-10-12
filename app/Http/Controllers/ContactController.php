<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ContactController extends FrontendController
{
    //
    public function __construct()
    {
        parent::__construct();
    }
    public function getContact()
    {
        return view('contact.index');
    }

    public function saveContact(Request $request)
    {
       $data =$request->except('_token');
       $data['created_at'] =$data['updated_at']=Carbon::now();
       Contact::insert($data);
       return redirect()->back();
    }
}
