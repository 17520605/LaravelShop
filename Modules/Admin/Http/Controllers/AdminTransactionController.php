<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Routing\Controller;

class AdminTransactionController extends Controller
{
    public function index()
    {
        $transactions =Transaction::with('user:id,name')->paginate(10);
        $viewData = [
            'transactions'  => $transactions
        ];
        return view('admin::transaction.index',$viewData);
    }
    
    public function viewOrder(Request $request,$id)
    {
        if($request->ajax())
        {
            $orders = Order::with('product')->where('or_transaction_id',$id)->get();

            $html =view('admin::components.order',compact('orders'))->render();
            return \response()->json($html);
        }
    }

    public function action($action,$id)
    {
        $messages='';
        if($action)
        {
            $transaction = Transaction::find($id);
            switch($action)
            {
                case 'delete':
                    $transaction->delete();
                    $messages = ' Xóa dữ liệu thành công !';
                break;
            }
        }
        return redirect()->back()->with('success',$messages);
    }

    //xữ lý trạng thái đơn hàng
    public function activeTransaction($id)
    {
        $transaction = Transaction::find($id);

        $orders = Order::where('or_transaction_id',$id)->get();

        if($orders)
        {
            foreach ($orders as $order)
            {
                //Trừ đi số lượng sản phẩm trong kho 
                //Cập nhật lại tổng số tiền của sản phẩm
                $product = Product::find($order->or_product_id);
                $product    ->  pro_number = $product->pro_number - $product->or_qty;
                $product    ->  pro_pay ++ ;
                $product    ->  save();
            }
        }
        //Update số lần User mua hàng
        \DB::table('users')->where('id',$transaction->tr_user_id) -> increment('total_pay');
        //Cập nhật lại trạng thái của đơn hàng
        $transaction->tr_status=Transaction::STATUS_DONE;
        $transaction->save();
        return redirect()->back()->with('success','Xữ lý đơn hàng thành công !');
    }
}
