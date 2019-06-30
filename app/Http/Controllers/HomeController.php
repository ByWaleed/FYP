<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use DateTime;
use App\Reservation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('home');
        // return redirect()->route('reservation/list');

      //   $dt = new DateTime();
      //   $dateOnly = $dt->format('Y-m-d');
      //   // dd($dateOnly);

      //        $getInHouse = DB::table('reservations')
      //                    ->join('customers', 'reservations.customer_id', '=', 'customers.id')
      //                    ->select('reservations.*', 'customers.*', 'reservations.id as resId')
      //                    ->where('reservations.reservationStatus', '=', "inhouse")
      //                    ->get();
      //       // dd($reservations);
      // //get in house
      //       $getArrival = DB::table('reservations')
      //                   ->join('customers', 'reservations.customer_id', '=', 'customers.id')
      //                   ->select('reservations.*', 'customers.*')
      //                   ->where('reservations.reservationStatus', '=', "0")
      //                   // ->where('reservations.checkin', '=', '2019-05-14')
      //                   ->where('reservations.checkin', '=', $dateOnly)
      //                   ->get();
      //      // dd($reservations1);

      //      $checkoutRes = DB::table('reservations')
      //                  ->join('customers', 'reservations.customer_id', '=', 'customers.id')
      //                  ->select('reservations.*', 'customers.*', 'reservations.id as resId')
      //                  ->where('reservations.reservationStatus', '=', "inhouse")
      //                  ->where('reservations.checkout', '=', $dateOnly)
      //                  ->get();
      //     // dd($checkoutRes);
      //        return view('reservation/list',['getInHouse' => $getInHouse, 'getArrival' => $getArrival,'checkoutRes' => $checkoutRes]);

        return view('home');

    }

    public function admin(){
        return view('admin');
    }
}
