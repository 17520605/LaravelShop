<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests\RequestPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Hiển thị tổng quan trang user
    public function index()
    {
        // $Transaction=Transaction::where('tr_user_id',get_data_user('web'))->paginate(10);
        // $totalTransaction =Transaction::where('tr_user_id',get_data_user('web'))->select('id')->count();
        // $totalTransactionDone =Transaction::where('tr_user_id',get_data_user('web'))->where('tr_status',Transaction::STATUS_DONE)->select('id')->count();
        
        $transaction            = Transaction::where('tr_user_id',get_data_user('web'));
        $listTransactions       = $transaction;
        $transactions           = $transaction->addSelect('id','tr_total','tr_address','tr_phone','created_at','tr_status')->paginate(10);
        $totalTransaction       = $listTransactions->select('id')->count();
        $totalTransactionDone   = $listTransactions->where('tr_status',Transaction::STATUS_DONE)->select('id')->count();

        
        $viewData = [
            'totalTransaction'          =>  $totalTransaction,
            'totalTransactionDone'      =>  $totalTransactionDone,
            'transactions'              =>  $transactions
        ];
        return view('user.index',$viewData);
    }


    public function updateInfo()
    {
        $user = User::find(get_data_user('web'));

        return view('user.info',compact('user'));
    }


    public function saveUpdateInfo(Request $request)
    {

        $user = User::where('id',get_data_user('web'))->update($request->except('_token'));

        return redirect()->back()->with('success','Cập nhật thông tin thành công !');
    }


    public function updatePassword()
    {
        return view('user.password');
    }


    public function saveUpdatePassword(RequestPassword $requestPassword)
    {

        if(Hash::check($requestPassword->password_old,get_data_user('web','password')))
        {
            $user = User::find(get_data_user('web'));
            $user->password = bcrypt($requestPassword->password);
            return redirect()->back()->with('success','Cập nhật thông tin thành công !');
        }

        return redirect()->back()->with('danger','Mật khẩu không đúng!');
    }
    public function getProductPay()
    {

        $products=Product::orderBy('pro_pay','DESC')->limit(10)->get();
        
        return view('user.product_pay',compact('products'));
    }
    public function getProductCare()
    {

        $products=Product::orderBy('pro_pay','DESC')->limit(10)->get();
        
        return view('user.product_care');
    }
}

