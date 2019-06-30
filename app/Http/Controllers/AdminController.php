<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function index(Request $request)
    	{
            $users = User::get();
	        // $users = User::where('userType', false)->get();
	        // dd($users);
	        return view('admin.allUsers', compact('users'));        
    	}

    	public function getUser(Request $request, $id){
    		$users = User::find($id);
    		// dd($user);
    		return view('admin.user', compact('users'));

    	}
    	public function updateUserDetails(Request $request, $id){
    		$fullname = $request->fullname;
    		$email = $request->email;
			$updateUserDetails = array('fullname'=>$fullname, 'email'=>$email);
		    // dd($updateUserDetails);
		    DB::table('users')->where('id',$id)->update($updateUserDetails);
		    return redirect()->route('systemAdmin');
    	}

    	public function updateUserPassword(Request $request, $id){
    		$password = $request->password;
		 	$user = User::find($id);
            $user->password = Hash::make($password);
            $user->save();

		    return redirect()->route('systemAdmin');

    	}


    	public function removeUser($id){
    		User::destroy($id);
		    return redirect()->route('systemAdmin');
    	}

        public function createNewUserForm(){
            // dd('test');
            return view('admin.createNewUserForm');
        }

        public function createNewUser(Request $request){
              $validatedData = $request->validate([
                'fullname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'contactNumber' => 'required',
                'jobRole' => 'required',
                'doorNum'=> 'required',
                'streetName' => 'required',
                'postcode' => 'required',
                'city' => 'required',
                'country' => 'required',
                'NINum' => 'required',
                
            ]);

              $email = $request->email;
              $jobRole = $request->input('jobRole');
              // dd($jobRole);

              if($jobRole === "Admin"){
                  // dd('1');
                  User::create([
                    'fullname' => $request->fullname,
                    'email' => $email,
                    'password' => Hash::make($request->password),
                    'userLevel'=> "1",
                    'userType' => "1",                    
                    'position' => $jobRole,
                    'contactNumber' => $request->contactNumber,
                    'doorNum' => $request->doorNum,
                    'streetName' => $request->streetName,
                    'postcode' => $request->postcode,
                    'city' => $request->city,
                    'country' => $request->country,
                    'NINum' => $request->NINum,
                ]);
              }elseif($jobRole === "Receptionist"){
                // dd('2');
                User::create([
                    'fullname' => $request->fullname,
                    'email' => $email,
                    'password' => Hash::make($request->password),
                    'userLevel'=> "2",
                    'userType' => "0",                    
                    'position' => $jobRole,
                    'contactNumber' => $request->contactNumber,
                    'doorNum' => $request->doorNum,
                    'streetName' => $request->streetName,
                    'postcode' => $request->postcode,
                    'city' => $request->city,
                    'country' => $request->country,
                    'NINum' => $request->NINum,
                ]);
              }else{
                // dd('3');
                User::create([
                    'fullname' => $request->fullname,
                    'email' => $email,
                    'password' => Hash::make($request->password),
                    'userLevel'=> "3",
                    'userType' => "0",
                    'position' => $jobRole,
                    'contactNumber' => $request->contactNumber,
                    'doorNum' => $request->doorNum,
                    'streetName' => $request->streetName,
                    'postcode' => $request->postcode,
                    'city' => $request->city,
                    'country' => $request->country,
                    'NINum' => $request->NINum,
                ]);
              }
              
             
            // User::create([
            //     'fullname' => $request->fullname,
            //     'email' => $email,
            //     'password' => Hash::make($request->password),
            //     'userType' => $request->userType,
            //     'userLevel'=> $request->userLevel,
            //     'position' => $request->position,
            //     'contactNumber' => $request->contactNumber,
            //     'doorNum' => $request->doorNum,
            //     'streetName' => $request->streetName,
            //     'postcode' => $request->postcode,
            //     'city' => $request->city,
            //     'country' => $request->country,
            //     'NINum' => $request->NINum,
            // ]);

              // $customer = new User();
              // $customer->title = $request->name;
              // $customer->firstname = $request->firstName;
              // $customer->lastname = $request->lastName;
              // $customer->doorNum = $request->inputDoorNum;
              // $customer->streetName = $request->inputStreet;
              // $customer->city = $request->inputCity;
              // $customer->postcode = $request->inputZip;
              // $customer->country = $request->inputCountry;
              // $customer->phone  = $request->phoneNumber;
              // $customer->email = $request->email;
              // $customer->save();
            return redirect('systemAdmin');
        }
}
