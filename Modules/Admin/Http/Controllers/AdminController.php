<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Contact;
use App\Models\Rating;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $ratings = Rating::with('user:id,name', 'product:id,pro_name')
            ->limit(10)->get();

        $contacts = Contact::limit(10)->get();
        $transactions = Transaction::where('tr_status','0')->count();
        $Contact = Contact::where('c_status','0')->count();
        $Rating = Rating::count();
        $User = User::count();
       

        $moneyDay = Transaction::whereDay('created_at', '=', date('d'))
            ->where('tr_status',Transaction::STATUS_DONE)->where('tr_sta','Giao hàng thành công')
            ->sum('tr_total');


        
        $moneyMonth = Transaction::whereMonth('created_at', '=', date('m'))
            ->where('tr_status',Transaction::STATUS_DONE)->where('tr_sta','Giao hàng thành công')
            ->sum('tr_total');

         $moneyYear = Transaction::whereYear('created_at', '=', date('Y'))
            ->where('tr_status',Transaction::STATUS_DONE)->where('tr_sta','Giao hàng thành công')
            ->sum('tr_total');

        $dataMoney = [
            [
                "name" => "Doanh thu ngày",
                "y"    => (int)$moneyDay
            ],
            
            [
                "name" => "Doanh thu tháng",
                "y"    => (int)$moneyMonth
            ],
            [
                "name" => "Doanh thu năm",
                "y"    => (int)$moneyYear
            ]
        ];

        // danh sach don hang moi

        $transactionNews = Transaction::with('user:id,name')
            ->limit(5)
            ->orderByDesc('id')
            ->get();


        $viewData = [
            'ratings'  => $ratings,
            'contacts' => $contacts,
            'moneyDay' => $moneyDay,
            'moneyMonth' => $moneyMonth,
            'transactions' =>$transactions,
            'dataMoney' => json_encode($dataMoney),
            'transactionNews' => $transactionNews,
            'Contact'=> $Contact,
            'Rating' => $Rating,
            'User'=> $User,
        ];

        return view('admin::index', $viewData);
    }
}
