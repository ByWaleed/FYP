<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Room;
use App\Customer;
use App\Reservation;
use Auth;
class RoomController extends Controller
 {
//   SELECT * FROM `rooms`
// WHERE roomStatus LIKE '%avil%' AND roomType = 'single';


// SELECT *
// FROM reservations
// INNER JOIN rooms ON reservations.room_id= rooms.id
// where checkout = "single"
// and rooms.roomStatus = "avil"
// and rooms.roomType="single";

// SELECT *
// FROM reservations
// INNER JOIN rooms ON reservations.room_id= rooms.id
// where checkout = "single"
// and rooms.roomStatus = "avil"
// and rooms.roomType="single";

public function index(){
              // $Room = Room::all();
              // dd($Room);
              // SELECT roomtype  FROM `rooms` WHERE roomtype = "single"
              // $Room = DB::table('rooms')
              // ->select('rooms.roomType', 'rooms.id')
              // ->get();
              // dd($Room);
              $Rooms = DB::table('rooms')
              ->select('rooms.roomType')
              ->distinct()
              ->get();


               // dd($Rooms);
              return view('reservation/searchRoomF',['Rooms' => $Rooms]);
}
public function searchRoomResults(Request $request){
// dd($request);


  $Rooms = $request->input('Rooms');
  // dd($Rooms);
  $checkInDate = $request->checkInDate;
  // dd($checkInDate);
  $checkOutDate = $request->checkOutDate;
  $numNights = $request->numNights;
  $avil = 'avil';
  // $getDates = DB::table('reservations')
  //             ->leftJoin('rooms', 'reservations.room_id', '=', 'rooms.id')
  //             ->select('reservations.*')
  //             ->Where('checkout', '!=', $checkInDate)
  //             ->get();
  // SELECT *
  // FROM reservations
  // INNER JOIN rooms ON reservations.room_id= rooms.id
  // where checkin < "2019/05/15"
  // and checkout >= "2019/05/15"
  // and rooms.roomType="single";


  // $getDates = DB::table('reservations')
  //             ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
  //             ->select('reservations.*','rooms.*')
  //             ->Where('checkin', '<', '2019/05/15')
  //             ->where('checkout', '>=', '2019/05/16')
  //             ->Where('rooms.roomType', '=', 'single')
  //             ->get();
  //              // dd($getDates);

  //
  // select * from rooms
  // where id not in(select room_id from reservations where checkin >= '2019/05/17' and checkout <= '2019/05/19')


  $getDates = DB::select( "
  select * from rooms
where id not in(select room_id from reservations where checkin >= '$checkInDate' and checkout <= '$checkOutDate') and roomType = '$Rooms'");

  // dd($getDates);


  // $getDates = DB::table('rooms')
  //             ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
  //             ->select('reservations.*','rooms.*')
  //             ->Where('checkin', '<', $checkInDate)
  //             ->where('checkout', '>=', $checkOutDate)
  //             ->Where('rooms.roomType', '=', 'single')
  //             ->get();
               // dd($getDates);






              //
              // $getDates = DB::table('reservations')
              //             ->leftJoin('rooms', 'reservations.room_id', '=', 'rooms.id')
              //             ->select('reservations.*','rooms.*')
              //             // ->Where('checkin', '>=', $checkInDate)
              //             ->whereNotBetween('checkout',[$checkInDate,$checkOutDate])
              //             ->Where('rooms.roomType', '=', $Rooms)
              //             ->get();




  // $getRooms = DB::table('rooms')
  // ->select('rooms.*')
  // ->Where('rooms.roomType', '=', $Rooms)
  // ->Where('rooms.roomStatus', '=', $avil)
  // ->get();
  // dd($getRooms);
  //
  // $users = DB::table('reservations')
  //             ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
  //             ->select('reservations.*', 'rooms.*')
  //             ->Where('checkout', '!=', $checkInDate )
  //             ->Where('rooms.roomStatus', '=', 'avil' )
  //             ->Where('rooms.roomType', '=', 'single' )
  //             ->get();
  //              dd($users);

  $arrayData =  array("checkInDate" => $checkInDate, "checkOutDate"=>$checkOutDate, "numNights"=>$numNights);
  // dd($arrayData);
  // return view('reservation/searchRoomResults',['getRooms' => $getRooms, 'getDates' => $getDates, 'arrayData'=>$arrayData]);
  return view('reservation/searchRoomResults',['getDates' => $getDates, 'arrayData'=>$arrayData]);
}

public function createReservation(Request $request){
  $userId = Auth::id();
// dd($userId);
// $c = $request->inputCountry;
// dd($c);
// $t = $request->inputStreet;
// dd($t);


  $customer = new Customer();
  $customer->title = $request->title;
  $customer->firstname = $request->firstName;
  $customer->lastname = $request->lastName;
  $customer->doorNum = $request->inputDoorNum;
  $customer->streetName = $request->inputStreet;
  $customer->city = $request->inputCity;
  $customer->postcode = $request->inputZip;
  $customer->country = $request->inputCountry;
  $customer->phone  = $request->phoneNumber;
  $customer->email = $request->email;
  $customer->save();

  $customerId = DB::getPdo()->lastInsertId();

  $roomNum =  $request->input('roomNum');
  // dd($roomNum);
   $findRoomId = DB::table('Rooms')->where('roomNum', $roomNum )->first();
  // dd($getRoomIds);
  $roomId = $findRoomId->id;
  $getRoom = $request->getRooms;
  // dd($getRoom);

  $cardType = $request->input('inputCardType');
  // dd($cardType);

  $reservation = new Reservation();
  $reservation->checkin = $request->checkInDate;
  $reservation->checkout = $request->checkOutDate;
  $reservation->numNights = $request->numNights;
  $reservation->adult = $request->adults;
  $reservation->child = $request->child;
  $reservation->numRooms = $request->roomNum;
  $reservation->roomType = $getRoom;
  $reservation->amount = $request->amounts;
  $reservation->reservationStatus = "0";
  $reservation->paymentStatus = "unpaid";
  $reservation->cardType =$cardType;
  $reservation->CCNum = $request->cardNumber;
  $reservation->expDate = $request->expiryDate;
  $reservation->cvc = $request->CVCNum;
  $reservation->notes = $request->notes;
  $reservation->reference = $request->reference;
  $reservation->customer_id = $customerId;
  $reservation->user_id = $userId;
  $reservation->room_id = $roomId;
  $reservation->save();


  // $reservations = DB::table('reservations')
  //             ->join('customers', 'reservations.customer_id', '=', 'customers.id')
  //             ->select('reservations.*', 'customers.*')
  //             ->get();
  return view('home');

}

//             $users = DB::table('users')
//             ->join('contacts', 'users.id', '=', 'contacts.user_id')
//             ->join('orders', 'users.id', '=', 'orders.user_id')
//             ->select('users.*', 'contacts.phone', 'orders.price')
//             ->get();

	// $Room = Room::get();

  public function getRoomForm(){
    $Rooms = Room::orderBy('roomType', 'DESC')->get();

    return view('rooms.getRoomForm',['Rooms'=>$Rooms]);
  }
  public function storeRoom(Request $request){
    // dd('test');
    $room = new Room();
    $room->roomType = $request->roomType;
    $room->numOfBed = $request->numOfBed;
    $room->roomStatus = $request->roomStatus;
    $room->roomNum = $request->roomNum;
    $room->price = $request->price;
    $room->numGuest = $request->numGuest;
    $room->save();
    return redirect()->back()->with('updatedDatabase', 'New Room '. $request->roomNum .' Added ');
    // return view('rooms.getRoomForm');
  }

  public function removeRoom($id){
    // dd($id);
    $room = Room::find($id);
    $roomNum = $room->roomNum;
    // dd($roomNum);
      Room::destroy($id);
      return redirect()->back()->with('updatedDatabase', 'Room '. $roomNum .' deleted ');
  }

  public function editRoomForm($id){
    $Room = Room::find($id);
    // dd($room);
    return view('rooms.editRoomForm',['Room'=>$Room]);
  }

  public function editRoom(Request $request, $id){
    // dd('test');
    // dd($id);
    // $Room = Room::find($id);

    $roomType = $request->roomType;
    $numOfBed = $request->numOfBed;
    $roomStatus = $request->roomStatus;
    $roomNum = $request->roomNum;
    $price = $request->price;
    $numGuest = $request->numGuest;

    $editRoomArray = array('roomType'=>$roomType, 'numOfBed'=>$numOfBed,'roomStatus'=>$roomStatus,'roomNum'=>$roomNum,'price'=>$price,'numGuest'=>$numGuest);
    // dd($editRoomArray);
    DB::table('rooms')->where('id',$id)->update($editRoomArray);

    $Rooms = Room::orderBy('roomType', 'DESC')->get();
    return redirect()->route('getRoomForm');
    // return view('rooms.getRoomForm',['Rooms'=>$Rooms]);
    // dd($room);
    // return view('rooms.editRoomForm',['Room'=>$Room]);
  }

  public function houseKeeping(){
    // dd('test');
    $findRooms = Room::all();
    // dd($findRooms);
    return view('rooms.houseKeeping', ['findRooms' => $findRooms]);
  }

  public function editHouseKeeping($id){
    $findRoom = Room::find($id);
    // dd($findRoom);
    return view('rooms.editHouseKeepingForm', ['findRoom' => $findRoom]);

  }

  public function saveHouseKeeping(Request $request, $id){

    $roomType = $request->roomType;
    $roomStatus = $request->roomStatus;
    $roomNum = $request->roomNum;
    $comments = $request->comments;
    $editRoomArray = array('roomType'=>$roomType, 'roomStatus'=>$roomStatus,'comments'=>$comments);
    // dd($editRoomArray);
    DB::table('rooms')->where('id',$id)->update($editRoomArray);
    return $this->houseKeeping();

  }


}
