<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use DateTime;
use App\Reservation;
use App\payment;
use App\paymentType;
use PDF;
use APP;
class PaymentController extends Controller
{
  public function getCheckout($resId){
    // dd("test");
    // dd($resId);
    // $resId;

    // $getResIds = Reservation::find($resId);
    // dd($getResIds);

    // $getResIds = payment::find($resId);
    // dd($getResIds);
    // $findpayments = DB::table('reservations')
    //                 ->join('customers', 'reservations.customer_id', '=', 'customers.id')
    //                 ->select('reservations.*', 'customers.*', 'reservations.id as resId')
    //                 ->where('reservations.reservationStatus', '=', "inhouse")
    //                 ->where('reservations.checkout', '=', $dateOnly)
    //                 ->get();

    $resId;
    $findpayments = DB::table('reservations')
                    ->join('payments', 'reservations.id', '=', 'payments.reservation_id')
                    ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
                    ->join('payment_types', 'payments.payment_types_id', '=', 'payment_types.id')
                    ->select('reservations.*', 'payments.*' , 'payments.id as payment_id', 'payments.created_at as date', 'rooms.*' , 'rooms.id as roomId', 'payment_types.*' , 'payment_types.id as paymentTypesId')
                    ->where('reservations.reservationStatus', '=', "inhouse")
                    ->where('payments.reservation_id', '=', $resId)
                    ->get();
                    // dd($findpayments);

              // SELECT SUM(Debit), SUM(Credit)
              // FROM payments
              // where reservation_id = 9;

    // DB::table('users_stats')
    // ->where('id', '7')
    // ->sum(DB::raw('logins_sun + logins_mon'));

    $getDebitsum = DB::table('payments')->where('reservation_id', $resId)->sum(DB::raw('Debit'));
    $getCreditsum = DB::table('payments')->where('reservation_id', $resId)->sum(DB::raw('Credit'));
    $sumTotal = $getDebitsum  - $getCreditsum;
    // dd($sumTotal);
    $paymentTypes = paymentType::all();

    
    $getCuctomerDetails = DB::table('reservations')
                ->join('customers', 'reservations.customer_id', '=', 'customers.id')
                ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
                ->select('reservations.*', 'customers.*', 'reservations.id as resId', 'rooms.*', 'rooms.id as roomId')
                ->where('reservations.reservationStatus', '=', "inhouse")
                ->where('reservations.id', $resId)
                ->first();
                // ->get();
    // dd($getCuctomerDetails);

    $nights = $getCuctomerDetails->numNights;
    $amount = $getCuctomerDetails->amount;
    $totalStay = $nights * $amount;
    // dd($totalStay);
      return view('reservation/checkout', ['findpayments' => $findpayments, 'resId' => $resId, 'sumTotal' => $sumTotal, 'paymentTypes' => $paymentTypes, 'getCuctomerDetails' => $getCuctomerDetails, 'totalStay'=>$totalStay]);
  }

  public function makePayment(Request $request, $resId){
        // dd($resId);
    $getType = $request->type;
    // dd($getType);
    $getAmount = $request->amount;
    // dd($getAmount);
    $findPaymentCode = DB::table('payment_types')->where('paymentCode',$getType)->first();
    // dd($findPaymentCode);
    $paymentCode = $findPaymentCode->paymentCode;
    $paymentCodeId = $findPaymentCode->id;
    // dd($paymentCodeId);
          if($paymentCode == 205){
              // dd('working');
              // Debit
              $payment = new payment();
              $payment->type = $request->type;
              $payment->amount = $request->amount;
              $payment->comment = $request->comment;
              $payment->Debit = $request->amount;
              $payment->reservation_id = $resId;
              $payment->payment_types_id = $paymentCodeId;
              $payment->save();
          }
          else {
            // dd('not working');
            // Credit
            $payment = new payment();
            $payment->type = $request->type;
            $payment->amount = $request->amount;
            $payment->comment = $request->comment;
            $payment->Credit = $request->amount;
            $payment->reservation_id = $resId;
            $payment->payment_types_id = $paymentCodeId;
            $payment->save();
          }
      return redirect()->back()->with('updatedDatabase', 'New details noted');
  }

  public function editPaymentForm($payment_id){
    // dd($payment_id);
    $getPayment = payment::find($payment_id);

    // dd($getPayment);
    return view('payments/editPaymentForm', ['getPayment' => $getPayment]);
  }

  public function editPayment(Request $request, $id){
    // dd($id);
    $type = $request->type;
    // dd($type);
    $Amount = $request->Amount;
    // dd($Amount);
    if($type == 205){
      // dd('working');
      // Debit
      $updatePaymentArray = array('type' => $type,'amount' => $Amount, 'Debit' => $Amount);
      // dd($updatePaymentArray);
      DB::table('payments')->where('type',$type)->update($updatePaymentArray);
    }
    else {
    // dd('not working');
    // Credit
    $updatePaymentArray = array('type' => $type,'amount' => $Amount, 'Credit' => $Amount );
    // dd($updatePaymentArray);
    DB::table('payments')->where('type',$type)->update($updatePaymentArray);
    }

    $findResId = payment::find($id);
    $resId = $findResId->reservation_id;

    $getDebitsum = DB::table('payments')->where('reservation_id', $resId)->sum(DB::raw('Debit'));
    $getCreditsum = DB::table('payments')->where('reservation_id', $resId)->sum(DB::raw('Credit'));
    $sumTotal = $getDebitsum  - $getCreditsum;
    $paymentTypes = paymentType::all();
    // dd($resId);
    $findpayments = DB::table('reservations')
                    ->join('payments', 'reservations.id', '=', 'payments.reservation_id')
                    ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
                    ->join('payment_types', 'payments.payment_types_id', '=', 'payment_types.id')
                    ->select('reservations.*', 'payments.*' , 'payments.id as payment_id', 'payments.created_at as date', 'rooms.*' , 'rooms.id as roomId', 'payment_types.*' , 'payment_types.id as paymentTypesId')
                    ->where('reservations.reservationStatus', '=', "inhouse")
                    ->where('payments.reservation_id', '=', $resId)
                    ->get();
                    // dd($findpayments);

    $getCuctomerDetails = DB::table('reservations')
                ->join('customers', 'reservations.customer_id', '=', 'customers.id')
                ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
                ->select('reservations.*', 'customers.*', 'reservations.id as resId', 'rooms.*', 'rooms.id as roomId')
                ->where('reservations.reservationStatus', '=', "inhouse")
                ->where('reservations.id', $resId)
                ->first();
    $nights = $getCuctomerDetails->numNights;
    $amount = $getCuctomerDetails->amount;
    $totalStay = $nights * $amount;
      return view('reservation/checkout', ['findpayments' => $findpayments, 'resId' => $resId, 'sumTotal' => $sumTotal, 'paymentTypes' => $paymentTypes, 'getCuctomerDetails' => $getCuctomerDetails, 'totalStay'=>$totalStay]);
    // return view('payments/editPaymentForm', ['getPayment' => $getPayment]);
  }

    public function removePayment($payment_id){
      // dd($payment_id);
      $payment = payment::find($payment_id);
      // dd($payment);
      $Debit  = $payment->Debit;
      $Credit  = $payment->Credit;
      $total = $Credit + $Debit;
      // dd($total);
      $deletedRows = payment::where('id', $payment_id)
      ->delete();
      // ->first();
      // dd($deletedRows);
        return redirect()->back()->with('updatedDatabase', 'Payment '. $total .'  deleted ');

    }


    public function generatePDF($resId){

      $resId;
      $findpayments = DB::table('reservations')
                      ->join('payments', 'reservations.id', '=', 'payments.reservation_id')
                      ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
                      ->join('payment_types', 'payments.payment_types_id', '=', 'payment_types.id')
                      ->select('reservations.*', 'payments.*' , 'payments.id as payment_id', 'payments.created_at as date', 'rooms.*' , 'rooms.id as roomId', 'payment_types.*' , 'payment_types.id as paymentTypesId')
                      ->where('reservations.reservationStatus', '=', "inhouse")
                      ->where('payments.reservation_id', '=', $resId)
                      ->get();

      $getDebitsum = DB::table('payments')->where('reservation_id', $resId)->sum(DB::raw('Debit'));
      $getCreditsum = DB::table('payments')->where('reservation_id', $resId)->sum(DB::raw('Credit'));
      $sumTotal = $getDebitsum  - $getCreditsum;
      // dd($sumTotal);
      $paymentTypes = paymentType::all();

      $getCuctomerDetails = DB::table('reservations')
                  ->join('customers', 'reservations.customer_id', '=', 'customers.id')
                  ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
                  ->select('reservations.*', 'customers.*', 'reservations.id as resId', 'rooms.*', 'rooms.id as roomId')
                  ->where('reservations.reservationStatus', '=', "inhouse")
                  ->where('reservations.id', $resId)
                  ->first();
             

      $nights = $getCuctomerDetails->numNights;
      $amount = $getCuctomerDetails->amount;
      $totalStay = $nights * $amount;

      set_time_limit(3000);
      $details = ['title' => 'test'];

      $pdf = PDF::loadView('reservation.checkoutPDF', ['getCustomerDetails' => $getCuctomerDetails,'findpayments' => $findpayments,'sumTotal' => $sumTotal,'totalStay'=>$totalStay]);
      return $pdf->download('EdgertonGuestHouseInvoice.pdf');

    }




}
