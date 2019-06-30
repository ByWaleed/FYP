<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\paymentType;
use Auth;

class PaymentTypeController extends Controller
{

    public function getPaymentTypeForm(){
      // dd('test');
      $paymentTypes = paymentType::all();
      // dd($paymentTypes);
      return view('payments.paymentTypeForm',['paymentTypes'=>$paymentTypes]);
    }

    public function storePaymentType(Request $request){
      $paymentType = new paymentType();
      $paymentType->paymentCode = $request->paymentCode;
      $paymentType->description = $request->description;
      $paymentType->save();
      return redirect()->back()->with('updatedDatabase', 'Payment type code added ');
    }

    public function editPaymentTypeForm($id){
      $paymentType = paymentType::find($id);
      return view('payments.editPaymentTypeForm',['paymentType'=>$paymentType]);
    }

    public function editPaymentTypeNow(Request $request, $id){
      $paymentCode = $request->paymentCode;
      $description = $request->description;
      $editPaymentTypeArray = array('paymentCode' => $paymentCode, 'description' => $description);
      DB::table('payment_types')->where('id',$id)->update($editPaymentTypeArray);
      return redirect()->route('getPaymentTypeForm');
    }

    public function removePaymentType($id){
        $paymentType = paymentType::find($id);
        $paymentType = $paymentType->paymentCode;
        paymentType::destroy($id);
        return redirect()->back()->with('updatedDatabase', 'Payment Type code '. $paymentType .' deleted ');
    }
}
