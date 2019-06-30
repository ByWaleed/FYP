<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use DateTime;
use App\Reservation;
use App\payment;
use App\paymentType;
class ReportController extends Controller
{
	public function getReport(){
		
    	// dd($countTotalRooms);
		// $countTotalCheckin = DB::table('Reservation')->count();
		// $countTotalCheckin = DB::table('reservations')
		// 					->select(array(DB::raw('count(checkin)')))
		// 					->count();
		// // dd($countTotalCheckin);

		// $countTotalCheckout = DB::table('reservations')
		// 					->select(array(DB::raw('count(checkout)')))
		// 					->count();
		// // dd($countTotalCheckout);


		$countGetCurdateCheckin = DB::table('reservations')
							->select(array(DB::raw('count(checkin)')))
							->whereRaw('checkin = CURDATE()')
							->count();
							// dd($countGetCurdateCheckin);

		$countGetCurdateCheckout = DB::table('reservations')
							->select(array(DB::raw('count(checkout)')))
							->whereRaw('checkout = CURDATE()')
							->count();
							// dd($countGetCurdateCheckout);

//SELECT count(roomStatus) FROM `reservations` inner join rooms on rooms.id = reservations.room_id WHERE checkin != curdate() and checkout != CURdate();

	$countGetAvilRooms = DB::table('rooms')
							->select(array(DB::raw('count(roomStatus)')))
							->whereRaw('checkout != CURDATE() AND checkin != CURDATE() ')
							->join('reservations', 'reservations.room_id', '=', 'rooms.id')
							->count();
							// dd($countGetAvilRooms);

//SELECT count(roomStatus) FROM `rooms` WHERE roomStatus = 'unavailable'

		$countGetUnAvilRooms = DB::table('rooms')
							->select(array(DB::raw('count(roomStatus)')))
							->whereRaw('roomStatus = "unavailable"')
							->count();
							// dd($countGetUnAvilRooms);


//SELECT count(roomStatus) FROM `rooms` WHERE roomStatus = 'Dirty' AND checkout = CURDATE() 
		// $countGetDirtyRooms = DB::table('rooms')
		// 						->select(array(DB::raw('count(roomStatus)')))
		// 						->whereRaw('roomStatus = "Dirty"')
		// 						->count();
								// dd($countGetDirtyRooms);
			$getCurdateDirtyRooms = DB::table('rooms') 
								->select(array(DB::raw('count(roomStatus)')))
								->whereRaw('roomStatus = "Dirty" AND checkout = CURDATE() ')
								->join('reservations', 'reservations.room_id', '=', 'rooms.id')
								->count();
								// dd($getCurdateDirtyRooms);

// SELECT checkin FROM `reservations` where reservationStatus = "inhouse" AND checkin = curdate();
		$countOccupied  = DB::table('reservations')
						->select(array(DB::raw('count(checkin)')))
						->whereRaw('reservationStatus = "inhouse" AND checkin = CURDATE()')
						->count();
						// dd($countOccupied);
		
		$countTotalRooms = DB::table('Rooms')->count();
		
		$countOccupiedPres = $countOccupied / $countTotalRooms * 100;
		// dd($countOccupiedPres);
		$occupancyPercentage = round($countOccupiedPres);
		// dd($round);

		

		$countGetTomorrowCheckout = DB::table('reservations')
							->select(array(DB::raw('count(checkout)')))
							->whereRaw('checkout = CURDATE() + 1')
							->count();
							// dd($countGetTomorrowCheckout);

		$countGetTomorrowCheckin = DB::table('reservations')
							->select(array(DB::raw('count(checkin)')))
							->whereRaw('checkin = CURDATE() + 1')
							->count();
							// dd($countGetTomorrowCheckin);


		// $countNumOfAdult = DB::table('reservations')
		// 						->sum('adult');							
		// 						// dd($countNumOfAdult);	
		$countNumOfAdult = DB::table('rooms')
							->select(array(DB::raw('sum(adult)')))
							->whereRaw('checkin = CURDATE() OR checkout = CURDATE() and reservationStatus = "inhouse"')
							->join('reservations', 'reservations.room_id', '=', 'rooms.id')
							->sum('adult');
							// dd($countNumOfAdult);
	
		// $countNumOfChild = DB::table('reservations')
		// 						->sum('child');
		// 						// dd($countNumOfChild);
		$countNumOfChild = DB::table('rooms')
							->select(array(DB::raw('sum(child)')))
							->whereRaw('checkin = CURDATE() OR checkout = CURDATE() and reservationStatus = "inhouse"')
							->join('reservations', 'reservations.room_id', '=', 'rooms.id')
							->sum('child');
							// dd($countNumOfChild);

		$ReservationMadeToday = DB::table('reservations')
							->select(array(DB::raw('count(created_at)')))
							->whereRaw('created_at = CURDATE()')
							->count();
							// dd($ReservationMadeToday);


		

		$AVGSale = DB::table('rooms')
				->select(array(DB::raw('avg(amount)')))
				->whereRaw('checkin = CURDATE() and reservationStatus = "inhouse"')
				->join('reservations', 'reservations.room_id', '=', 'rooms.id')
				->avg('amount');
				// dd($AVGSale);
		$AVGSale = number_format((float)$AVGSale, 2, '.', ''); 
		// round($AVGSale,2);
		// dd($round2dPsAVGSale);
		// dd($AVGSale);



		$totalStay = DB::table('reservations')
					->select(array(DB::raw('sum(amount)')))
					->whereRaw('checkin = CURDATE()')
					->sum('amount');
					// dd($totalStay); //100

		$getDebitsum = DB::table('reservations')
					->join('payments', 'reservation_id', '=', 'reservations.id')
					->whereRaw('checkin = CURDATE()')
					->sum(DB::raw('Debit'));
					// dd($getDebitsum); 
					//275

		$getCreditsum = DB::table('reservations')
						->join('payments', 'reservation_id', '=', 'reservations.id')
						->whereRaw('checkin = CURDATE()')
						->sum(DB::raw('Credit'));
						// dd($getCreditsum); //100
		$sumTotal = $getDebitsum  - $getCreditsum;
		// dd($sumTotal);//175
		$totalSaleRev = $sumTotal + $totalStay;
		$totalSaleRev = number_format((float)$totalSaleRev, 2, '.', '');
		// dd($totalSaleRev);






		/////////////////////////// TESTING starts

		// $resId = 1;
		//  $getCuctomerDetails = DB::table('reservations')
  //               ->join('customers', 'reservations.customer_id', '=', 'customers.id')
  //               ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
  //               ->select('reservations.*', 'customers.*', 'reservations.id as resId', 'rooms.*', 'rooms.id as roomId')
  //               ->whereRaw('checkin = CURDATE() and reservationStatus = "inhouse"')
  //               // ->first();
  //               ->get();
  //   // dd($getCuctomerDetails);

  //   $nights = $getCuctomerDetails->numNights;
  //   $amount = $getCuctomerDetails->amount;
  //   $totalStay = $nights * $amount;

    // dd($totalStay);



	// $totalStay = DB::table('reservations')
	// 			->select(array(DB::raw('sum(amount)')))
	// 			->whereRaw('checkin = CURDATE()')
	// 			->sum('amount');
	// 			dd($totalStay);


/////////////


// SELECT SUM(reservations.amount) FROM `reservations`
// inner join payments 
// on payments.reservation_id = reservations.id
// WHERE reservations.checkin = CURDATE();



// SELECT DISTINCT reservations.*, payments.* FROM `reservations`
// inner join payments 
// on payments.reservation_id = reservations.id
// WHERE reservations.checkin = CURDATE();



// gettotalCredit 
// gettotalDebit 

// minus debit from gettotalCredit

// create foreach loop to find each reservations and then find total amount from payments and reservations and get credit and debit from there too 

		///////////

	// $getDebitsum = DB::table('payments')->where('reservation_id', $resId)->sum(DB::raw('Debit'));
 //    $getCreditsum = DB::table('payments')->where('reservation_id', $resId)->sum(DB::raw('Credit'));
 //    $sumTotal = $getDebitsum  - $getCreditsum;


// $totalStay = DB::table('reservations')
// 				->select(array(DB::raw('sum(reservations.amount)')))
// 				->whereRaw('checkin = CURDATE() and reservationStatus = "inhouse"')
// 				->join('payments', 'reservation_id', '=', 'reservations.id')
// 				->sum('reservations.amount');
// 				dd($totalStay);



// $totalStay = DB::table('reservations')
// 			->select(array(DB::raw('sum(amount)')))
// 			->whereRaw('checkin = CURDATE()')
// 			->sum('amount');
// 			// dd($totalStay); //100

// $getDebitsum = DB::table('reservations')
// 				->join('payments', 'reservation_id', '=', 'reservations.id')
// 				->whereRaw('checkin = CURDATE()')
// 				->sum(DB::raw('Debit'));
// 				// dd($getDebitsum); 
// 				//275

// $getCreditsum = DB::table('reservations')
// 				->join('payments', 'reservation_id', '=', 'reservations.id')
// 				->whereRaw('checkin = CURDATE()')
// 				->sum(DB::raw('Credit'));
// 				// dd($getCreditsum); //100
// $sumTotal = $getDebitsum  - $getCreditsum;
// // dd($sumTotal);//175
// $totalSaleRev = $sumTotal + $totalStay;
// $totalSaleRev = number_format((float)$totalSaleRev, 2, '.', '');
// // dd($totalSaleRev);



		// tottal room cost from reservations
		// +
		// anything from payments 

		//////////////////////////					TESTING ends here
						

						// $countTotalRooms = DB::table('Rooms')->count();
						// dd($countTotalRooms);

////////////////


// $countNumOfAdult = DB::table('rooms')
// 							->select(array(DB::raw('sum(adult)')))
// 							->whereRaw('checkin = CURDATE() OR checkout = CURDATE() and reservationStatus = "inhouse"')
// 							->join('reservations', 'reservations.room_id', '=', 'rooms.id')
// 							->sum('adult');
// 							dd($countNumOfAdult);




	

////////////
//////////////////////////////////////////
// SELECT COUNT(checkin) FROM `reservations`



// SELECT COUNT(checkin) FROM `reservations`
// WHERE checkin = CURDATE();


// SELECT count(roomStatus) FROM `reservations` inner join rooms on rooms.id = reservations.room_id 
// WHERE checkin != curdate() and checkout != CURdate() and roomStatus = 'avil';


// SELECT count(roomStatus) FROM `reservations` inner join rooms on rooms.id = reservations.room_id 
// WHERE checkin != curdate() and checkout != CURdate() and reservationStatus = 'inhouse';


// SELECT count(roomStatus) FROM `reservations` inner join rooms on rooms.id = reservations.room_id 
// WHERE checkin != curdate() and checkout != CURdate();


/////////////////////

//SELECT AVG(amount) FROM `reservations`
//SELECT SUM(amount) FROM `reservations`

		// SELECT COUNT(checkin) FROM `reservations`

		// SELECT COUNT(checkin) FROM `reservations`
		// WHERE checkin = CURDATE();


		// $query = DB::table('category_issue')
  //   ->select(array('issues.*', DB::raw('COUNT(issue_subscriptions.issue_id) as followers')))
  //   ->where('category_id', '=', 1)
  //   ->join('issues', 'category_issue.issue_id', '=', 'issues.id')
  //   ->left_join('issue_subscriptions', 'issues.id', '=', 'issue_subscriptions.issue_id')
  //   ->group_by('issues.id')
  //   ->order_by('followers', 'desc')
  //   ->get();

// 7 / 10 * 100
								// that are not booked
/////////////////////////////////////////////////////////////

    	$reportArray = array(
    		'countTotalRooms'=>$countTotalRooms, 
    		'countGetCurdateCheckin'=>$countGetCurdateCheckin,
    		'countGetCurdateCheckout'=>$countGetCurdateCheckout,
    	 	'countGetAvilRooms'=>$countGetAvilRooms,
    	 	'countGetUnAvilRooms'=>$countGetUnAvilRooms,
    	 	'getCurdateDirtyRooms'=>$getCurdateDirtyRooms,
    	 	'countOccupied' => $countOccupied,
    	 	'countGetTomorrowCheckout'=>$countGetTomorrowCheckout,
    	 	'countGetTomorrowCheckin'=> $countGetTomorrowCheckin,
    	 	'countNumOfAdult'=> $countNumOfAdult,
    	 	'countNumOfChild'=>$countNumOfChild,
    	 	'occupancyPercentage'=>$occupancyPercentage,
    	 	'ReservationMadeToday'=>$ReservationMadeToday,
    	 	'AVGSale' => $AVGSale,
    	 	'totalSaleRev' => $totalSaleRev
    	 );
    	// dd($reportArray);
    	return view('admin/report',['reportArray'=>$reportArray]);
    	
	}

	// count the years first, make an array for years, put Year as e.g 2018 and 2019 in that array"
	// sum the amount from res and payments table
	// get sum of debit for each year
	// get credit for  for each year
	//minus debit from credit for each year
	// pass the value in arry to view


// threee sql statments
	// first work out tital stay for each res
	//then get the sum but not include status is cancled
	//2 nd get the sum of the debit
	//3 get the sum of the credit
	// work out the minus debit from credit
	// sum the total
	// wheer at current year
	// paas the 
	//


	////////////
	// get total Reservation data for each month
	//get month name
	//get month number
	//count each month Reservation
	function getAllMonths(){
		$monthArray = array();
		$reservationDates = Reservation::orderBy('checkin', 'ASC')->get();
		 // dd($reservationDates);
		$reservationDates = json_decode($reservationDates);
		// dd($reservationDates);
		if(! empty($reservationDates)){
			foreach($reservationDates as $reservationDate){
				// dd($reservationDate);
				$date = new \DateTime($reservationDate->checkin);
				// dd($date);
				$monthNum = $date->format('m');
				$monthName = $date->format('M');
				// dd($monthNum);
				$monthArray[$monthNum]=$monthName;
				// dd($monthArray);			
			}
		}
		return $monthArray;
		// dd($monthArray);
	}

	function countMonthlyReservation($month){
		$monthleyReservationCount = Reservation::whereMonth('checkin', $month)->get()->count();
		return $monthleyReservationCount;
	}

	function monthlyReservationData(){
			$monthleyReservationCountArray = array();
			$monthArray = $this->getAllMonths();
			$monthNameArray = array();
			if(! empty($monthArray)){
				foreach ($monthArray as $monthNum => $monthName) {
					$monthleyReservationCount = $this->countMonthlyReservation($monthNum);
					array_push($monthleyReservationCountArray, $monthleyReservationCount);
					array_push($monthNameArray, $monthName);
				}
			}

			$maxNum = max($monthleyReservationCountArray);
			$maxNum = round(($maxNum + 10/2) / 10) * 10;
			// dd($maxNum);

			$monthleyReservationDataArray = array(
				'maxNum' => $maxNum,
				'months' => $monthNameArray,
				'ReservationCount' => $monthleyReservationCountArray
			);
			// dd($monthleyReservationDataArray);
			
			return $monthleyReservationDataArray;

		}
    
}
