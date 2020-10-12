<?php

namespace Modules\Admin\Http\Controllers;
use App\Models\PageStatic;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminPageStaticController extends Controller
{
    public function index(Request $request)
    {   
        $pages = PageStatic::all();
        return view('admin::page_static.index',compact('pages'));
    }
    public function create()
    {
        return view('admin::page_static.create');
    }
    public function store(Request $request)
    {
        $this->insertOrUpdate($request);
        return redirect()->back()->with('success','Thêm mới thành công !');
    }
    public function edit($id)
    {
        $page = PageStatic::find($id);
        return view('admin::page_static.update',compact('page'));
    }
    public function update(Request $request,$id)
    {
        $this->insertOrUpdate($request,$id);
        return redirect()->back()->with('success','Cập nhật thành công !');
    }
    public function insertOrUpdate($request , $id='')
    {
        $page = new PageStatic();
        if($id)
        {
            $page = PageStatic::find($id);
        }
        $page->ps_name               = $request->ps_name;
        $page->ps_type               = $request->ps_type;
        $page->ps_content            = $request->ps_content;
        $page->save();
    }
    public function action($action,$id)
    {
        if($action)
        { 
            $page = PageStatic::find($id);
            switch($action)
            {
                case 'delete':
                    $page->delete();
                    $messages = ' Xóa dữ liệu thành công !';
                break;
            }
        }
        return redirect()->back()->with('success',$messages);
    }
}
