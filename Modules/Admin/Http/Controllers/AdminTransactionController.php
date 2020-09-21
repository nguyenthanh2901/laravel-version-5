<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestTransaction;
use Illuminate\Support\Facades\DB;

class AdminTransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::with('user:id,name');
        $countTransaction = Transaction::count();
        $transactionsTotal = Transaction::whereRaw(1);
        $sum = Transaction::sum('tr_total');
        if ($request->dates)
        {
            $date = $this->getStartEndTime($request->dates);
            $transactionsTotal->whereBetween(DB::raw('DATE(created_at)'),array($date['start'],$date['end']));
            $transactions->whereBetween(DB::raw('DATE(created_at)'),array($date['start'],$date['end']));
        }
        
        if ($request->status)
        {
            $status = $request->status == 2 ? 0 : 1;
            $transactionsTotal->where('tr_status',$status);
            $transactions->where('tr_status',$status);
        }
        
        $transactionsTotal = $transactionsTotal->sum('tr_total');
        $transactions = $transactions->orderByDesc('id')->paginate(10);
        
        $viewData = [
            'sum' =>$sum,
            'countTransaction' =>$countTransaction,
            'transactions' => $transactions,
            'transactionsTotal' => $transactionsTotal,
            'query' => $request->query()
        ];
        
        return view('admin::transaction.index',$viewData);
    }
    public function viewOrder(Request $request,$id)
    {
        if ($request->ajax())
        {
            $orders = Order::with('product')
                ->where('or_transaction_id',$id)->get();

            $html = view('admin::components.order',compact('orders'))->render();
            return \response()->json($html);
        }
    }
    public function delete($id)
    {
        \DB::table('transactions')->where('id',$id)->delete();
        return redirect()->back();
    }
    public function actionTransaction($id)
    {
        $transaction = Transaction::find($id);
        $orders = Order::where('or_transaction_id',$id)->get();

        if ($orders)
        {
            foreach ($orders as $order)
            {
                $product = Product::find($order->or_product_id);
                $product->pro_number = $product->pro_number - $order->or_qty;
                $product->pro_pay =$product->pro_pay + $order->or_qty;
                $product->save();
            }
        }

        \DB::table('users')->where('id',$transaction->tr_user_id)
            ->increment('total_pay');

        $transaction->tr_status = Transaction::STATUS_DONE;
        $transaction->save();

        return redirect()->back()->with('success','Xử lý đơn hàng thành công');
    }

    public function updateTransaction($id)
    {
        $transaction = Transaction::find($id);
        return view('admin::transaction.update',compact('transaction'));
    }

    public function saveTransaction(RequestTransaction $request, $id)
    {

        $transaction = Transaction::find($id);
        $transaction->tr_sta = $request->tr_sta;
        $transaction->tr_shipper = $request->tr_shipper;
        $transaction->tr_codeship = $request->tr_codeship;
        $transaction->save();
        return redirect()->route('admin.get.list.transaction')->with('success','Cập nhật thành công');
    }

    public function getStartEndTime($date_range, $config=[])
    {
        $dates = explode(' - ', $date_range);
        
        if (array_get($config, 'his'))
        {
            $start_date = date('Y-m-d H:i:s', strtotime($dates[0]));
            $end_date = date('Y-m-d H:i:s', strtotime($dates[0]));
        }else
        {
            $start_date = date('Y-m-d 00:00:00', strtotime($dates[0]));
            $end_date = date('Y-m-d 23:59:59', strtotime($dates[0]));
        }
        return [
            'start' => $start_date,
            'end' => $end_date
        ];
    }
}
