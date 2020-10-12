<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageStatic;
class PageStaticController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function aboutUs()
    {
        $page = PageStatic::where('ps_type',PageStatic::TYPE_ABOUT)->first();
        return view('page_static.about',compact('page'));
    }
    public function delivery()
    {
        $page = PageStatic::where('ps_type',PageStatic::TYPE_INFO_SHOPPING)->first();
        return view('page_static.about',compact('page'));
    }
    public function security()
    {
        $page = PageStatic::where('ps_type',PageStatic::TYPE_SECURITY)->first();
        return view('page_static.about',compact('page'));
    }
    public function policy()
    {
        $page = PageStatic::where('ps_type',PageStatic::TYPE_POLICY)->first();
        return view('page_static.about',compact('page'));
    }
}
