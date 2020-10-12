<?php

namespace Modules\Admin\Http\Controllers;
use App\Models\Contact;
use App\Models\Transaction;
use App\Models\Rating;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $ratings = Rating::with('user:id,name','product:id,pro_name')->limit(10)->get();
        $contacts = Contact::limit(10)->get();
        //Doanh thu theo ngày
        $moneyDay = Transaction::whereDay('updated_at',date('d'))->where('tr_status',Transaction::STATUS_DONE)->sum('tr_total');
        //Doanh thu theo tháng
        $moneyMonth = Transaction::whereMonth('updated_at',date('m'))->where('tr_status',Transaction::STATUS_DONE)->sum('tr_total');
        //Doanh thu theo Năm
        $moneyYear = Transaction::whereYear('updated_at',date('Y'))->where('tr_status',Transaction::STATUS_DONE)->sum('tr_total');

        $dataMoney = [
            [
                "name"  => "Doanh thu ngày",
                "y"     => (int)$moneyDay
            ],
            [
                "name"  => "Doanh thu tuần",
                "y"     => (int)$moneyDay
            ],
            [
                "name"  => "Doanh thu tháng",
                "y"     => (int)$moneyMonth
            ],
            [
                "name"  => "Doanh thu năm",
                "y"     => (int)$moneyYear
            ]
            
        ];

        // Danh sách đơn hàng mới
        $transactionsNews =Transaction::with('user:id,name')->limit(8)->orderByDesc('id')->get();

        $viewData= [
            'ratings'       => $ratings,
            'contacts'      => $contacts,
            'moneyDate'     =>$moneyDay,
            'moneyMonth'    =>$moneyMonth,
            'moneyMonth'    =>$moneyYear,
            'dataMoney'     =>json_encode($dataMoney),
            'transactionsNews'  =>$transactionsNews
        ];
        return view('admin::index',$viewData);
    }
}
