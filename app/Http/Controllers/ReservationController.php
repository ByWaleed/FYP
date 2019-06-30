<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use DateTime;
use App\Reservation;
use App\payment;
use App\paymentType;
class ReservationController extends Controller
{
    public function index(){
       // $reservations = DB::table('reservations')->get();
  // dd($reservations);
  $dt = new DateTime();
  $dateOnly = $dt->format('Y-m-d');
  // dd($dateOnly);

       $getInHouse = DB::table('reservations')
                   ->join('customers', 'reservations.customer_id', '=', 'customers.id')
                   ->select('reservations.*', 'customers.*', 'reservations.id as resId')
                   ->where('reservations.reservationStatus', '=', "inhouse")
                   ->get();
      // dd($reservations);
//get in house
      $getArrival = DB::table('reservations')
                  ->join('customers', 'reservations.customer_id', '=', 'customers.id')
                  ->select('reservations.*', 'customers.*')
                  ->where('reservations.reservationStatus', '=', "0")
                  // ->where('reservations.checkin', '=', '2019-05-14')
                  ->where('reservations.checkin', '=', $dateOnly)
                  ->get();
     // dd($getArrival);

     $checkoutRes = DB::table('reservations')
                 ->join('customers', 'reservations.customer_id', '=', 'customers.id')
                 ->select('reservations.*', 'customers.*', 'reservations.id as resId')
                 ->where('reservations.reservationStatus', '=', "inhouse")
                 ->where('reservations.checkout', '=', $dateOnly)
                 ->get();
    // dd($checkoutRes);
       return view('reservation/list',['getInHouse' => $getInHouse, 'getArrival' => $getArrival,'checkoutRes' => $checkoutRes]);
    }

    public function getCheckinForm(Request $request, $id ){
// dd($id);
      $reservations = DB::table('reservations')
                  ->join('customers', 'reservations.customer_id', '=', 'customers.id')
                  ->select('reservations.*', 'customers.*')
                  ->where('customers.id', $id)
                  ->first();
                  // dd($reservations);
        $paymentTypes = paymentType::all();
      return view('reservation/checkInForm',['reservations' => $reservations, 'paymentTypes' => $paymentTypes]);
      // $userId = Auth::id();
    }

    public function updateReservation(Request $request, $customer_id){
      // dd($customer_id);
      $title = $request->title;
      $firstname = $request->firstName;
      $lastname = $request->lastName;
      $doorNum = $request->inputDoorNum;
      $streetName = $request->inputStreet;
      $city = $request->inputCity;
      $postcode = $request->inputZip;
      $country = $request->inputCountry;
      $phone = $request->phoneNumber;
      $email = $request->email;

      $updateCustomersArray = array('title'=>$title,'firstname'=>$firstname, 'lastname'=> $lastname, 'doorNum'=> $doorNum,
      'streetName'=>$streetName, 'city'=>$city, 'postcode'=>$postcode, 'country'=>$country, 'phone'=>$phone, 'email'=>$email);
      // dd($updateCustomersArray);
      DB::table('customers')->where('id',$customer_id)->update($updateCustomersArray);

      $checkin = $request->checkInDate;
      $checkout = $request->checkOutDate;
      $numNights = $request->numNights;
      $adult = $request->adults;
      $child = $request->child;
      $roomType = $request->checkInDate;
      $amount = $request->amounts;
      $paymentStatus = "unpaid";
      $cardType = $request->amounts;
      $CCNum = $request->cardNumber;
      $expDate = $request->expiryDate;
      $cvc = $request->CVCNum;
      $notes = $request->notes;

      $updateReservationsArray = array('checkin'=>$checkin,'checkout'=>$checkout,'numNights'=>$numNights,'adult'=>$adult,'child'=>$child,
      'roomType'=>$roomType,'amount'=>$amount,'paymentStatus'=>$paymentStatus,'cardType'=>$cardType,'CCNum'=>$CCNum,'expDate'=>$expDate,'cvc'=>$cvc,
    'notes'=>$notes,'notes'=>$notes);
    // dd($updateReservationsArray);
    DB::table('reservations')->where('customer_id',$customer_id)->update($updateReservationsArray);

return $this->index();
    }


public function checkInNow(Request $request, $customer_id){
      // dd($customer_id);
    // $paymentStatus = "unpaid";

    $getTypes = paymentType::all();
    $getTypesDes = "Accommodation";
    $getType =  DB::table('payment_types')->where('description',$getTypesDes)->first();
    // dd($getType);
    $paymentCode = $getType->paymentCode;
    $paymentCodeId = $getType->id;
    // dd($paymentCodeId);
    $getcustomerResID = DB::table('reservations')->where('customer_id',$customer_id)->first();
    // dd($getcustomerResID);
    $resId = $getcustomerResID->id;
    $amount =  $getcustomerResID->amount;
    // dd($amount);

    $payment = new payment();
    $payment->type = $paymentCode;
    $payment->amount = $amount;
    $payment->Credit  = $amount;
    $payment->reservation_id = $resId;
    $payment->payment_types_id = $paymentCodeId;
    $payment->save();

    // $addResIdToPayment = array('reservation_id'=>$resId, 'Accommodation'=>$Accommodation);
    // DB::table('payments')->where('reservation_id',$resId)->update($addResIdToPayment);

    $reservationStatus = "inhouse";
    // dd($reservationStatus);
    $checkInArray = array('reservationStatus'=>$reservationStatus);
    // dd($checkInArray);
    DB::table('reservations')->where('customer_id',$customer_id)->update($checkInArray);

    return $this->index()->with('updatedDatabase', 'updated');

}

  public  function cancelRes(Request $request, $customer_id){
    //add user id  who has romoved the reservation
    //make room avli
    // dd('test');
    // dd($customer_id);
    $userId = Auth::id();
    $customers = DB::table('reservations')
                ->join('customers', 'reservations.customer_id', '=', 'customers.id')
                ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
                ->select('reservations.*', 'customers.*', 'rooms.*')
                ->where('customers.id', $customer_id)
                ->first();
                // dd($customers);
                $roomId = $customers->room_id;
                $roomStatus = $customers->roomStatus;
                $reservationStatus = "cancelled";
                // dd($reservationStatus);
                $updateRoomArray = array('roomStatus' =>$roomStatus);
                // dd($updateRoomArray);
                DB::table('rooms')->where('id',$roomId)->update($updateRoomArray);
                $updateReservationsArray = array('user_id'=> $userId, 'reservationStatus'=>$reservationStatus);
                // dd($updateReservationsArray);
                DB::table('reservations')->where('customer_id',$customer_id)->update($updateReservationsArray);
                return $this->index()->with('updatedDatabase', 'Removed noted');
  }

  public function checkoutReservation($resId){
    // dd($resId);

    $getCustomerDetails = DB::table('reservations')
                  ->join('customers', 'reservations.customer_id', '=', 'customers.id')
                  ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
                  ->select('reservations.*', 'customers.*', 'reservations.id as resId', 'rooms.*', 'rooms.id as roomId')
                  ->where('reservations.reservationStatus', '=', "inhouse")
                  ->where('reservations.id', $resId)
                  ->first();
                    // dd($getCustomerDetails);
                  $roomId = $getCustomerDetails->room_id;
                  $roomStatus = "Dirty";
                  // dd($reservationStatus);
                  $updateRoomArray = array('roomStatus' =>$roomStatus);
                  // dd($updateRoomArray);
                  DB::table('rooms')->where('id',$roomId)->update($updateRoomArray);

                  $userId = Auth::id();
                  $reservationStatus = "0";
                  $updateReservationsArray = array('user_id'=> $userId, 'reservationStatus'=>$reservationStatus);
                  // dd($updateReservationsArray);
                  DB::table('reservations')->where('id',$resId)->update($updateReservationsArray);
                  // return redirect()->back()->with('updatedDatabase', 'Reservation deleted ');
                  // return back();
                  // index($getInHouse, $getArrival, $checkoutRes);
                  // $this->sendRequest($uri)
                  return $this->index();


  }


  public function updateResForm(Request $request, $customer_id){
// dd($customer_id);

$reservations = DB::table('reservations')
            ->join('customers', 'reservations.customer_id', '=', 'customers.id')
            ->select('reservations.*', 'customers.*')
            ->where('customers.id', $customer_id)
            ->first();
            // dd($reservations);
return view('reservation/updateResForm',['reservations' => $reservations]);
// return $this->getCheckinForm();
  }

  public function search(Request $request){

    // $search = $request->get('search');  
    // $reservations = DB::table('reservations')->where('checkin',"Like","%".$search."%")->paginate(20);
    // return view("results1", compact("reservations"));


    $search = $request->get('search');  
    $reservations = DB::table('reservations')
                    ->join('customers', 'reservations.customer_id', '=', 'customers.id')
                    ->select('reservations.*', 'customers.*', 'reservations.id as resId' , 'customers.id as cId')
                    ->where('checkin',"Like","%".$search."%")
                    ->orWhere('customers.firstname','LIKE','%'.$search.'%')
                    ->orWhere('customers.lastname','LIKE','%'.$search.'%')
                    ->orWhere('reservations.reference','LIKE','%'.$search.'%')
                    ->paginate(20);
                    // dd($reservations);
    return view("results1", compact("reservations"));

    

  }


  // public function getCheckout(){
   //  $reservations = DB::table('reservations')
   //              ->join('customers', 'reservations.customer_id', '=', 'customers.id')
   //              ->select('reservations.*', 'customers.*')
   //              ->where('reservations.reservationStatus', '=', "inhouse")
   //              ->get();
   // // dd($reservations);
   // $dt = new DateTime();
   // $dateOnly = $dt->format('Y-m-d');
   // // dd($dateOnly);
   // //get in house
   //       $reservations1 = DB::table('reservations')
   //                   ->join('customers', 'reservations.customer_id', '=', 'customers.id')
   //                   ->select('reservations.*', 'customers.*')
   //                   ->where('reservations.reservationStatus', '=', "0")
   //                   ->where('reservations.checkin', '=', $dateOnly)
   //                   ->get();
   //      // dd($reservations1);
   //
   //      $checkoutRes = DB::table('reservations')
   //                  ->join('customers', 'reservations.customer_id', '=', 'customers.id')
   //                  ->select('reservations.*', 'customers.*')
   //                  ->where('reservations.reservationStatus', '=', "inhouse")
   //                  ->where('reservations.checkout', '=', $dateOnly)
   //                  ->get();
   //     // dd($checkoutRes);


  // }

}
