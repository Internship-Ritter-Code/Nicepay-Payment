<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\NicepayLib;

class RequestCC extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $nicepay = new NicepayLib();

        function generateReference()
        {
            $micro_date = microtime();
            $date_array = explode(" ",$micro_date);
            $date = date("YmdHis",$date_array[1]);
            $date_array[0] = preg_replace('/[^\p{L}\p{N}\s]/u', '', $date_array[0]);
            return "Ref".$date.$date_array[0].rand(100,999);
        }
        $payMethod = $request->input('payMethod');
        $referenceNo = $request->input('referenceNo');
        if(isset($payMethod) && $payMethod == '01'){

            // Populate Mandatory parameters to send
            $nicepay->set('payMethod', '01');
            $nicepay->set('currency', 'IDR');

            if(!isset($_POST['referenceNo']) || $_POST['referenceNo'] == null){
                $nicepay->set('referenceNo', generateReference()); // Invoice Number or Reference Number Generated by merchant
            }else{
                $nicepay->set('referenceNo', $_POST['referenceNo']);
            }

            $nicepay->set('amt', $_POST['amt']); // Total gross amount
            $nicepay->set('description', 'Payment of Invoice No '.$nicepay->get('referenceNo')); // Transaction description

            $nicepay->set('billingNm', 'John Doe'); // Customer name
            $nicepay->set('billingEmail', 'john@example.com'); // Customer Email
            $nicepay->set('billingAddr', 'Jl. Jend. Sudirman No. 28');
            $nicepay->set('billingCity', 'Jakarta Pusat');
            $nicepay->set('billingState', 'DKI Jakarta');
            $nicepay->set('billingPostCd', '10210');
            $nicepay->set('billingCountry', 'Indonesia');
            $nicepay->set('billingPhone', '082111111111');

            $nicepay->set('deliveryNm', 'John Doe'); // Delivery name
            $nicepay->set('deliveryPhone', '02112345678');
            $nicepay->set('deliveryAddr', 'Jl. Jend. Sudirman No. 28');
            $nicepay->set('deliveryCity', 'Jakarta Pusat');
            $nicepay->set('deliveryState', 'DKI Jakarta');
            $nicepay->set('deliveryPostCd', '10210');
            $nicepay->set('deliveryCountry', 'Indonesia');
            $nicepay->set('instmntType', $_POST['instmntType']);
            $nicepay->set('instmntMon', $_POST['instmntMon']);
            //$nicepay->set('recurrOpt', '0');

            $timeStampRegist = date('Ymd').date('His');
            $nicepay->set('timeStamp', $timeStampRegist);
            $nicepay->set('reqDt', date('Ymd'));
            $nicepay->set('reqTm', date('His'));

            // Send Data
            $response = $nicepay->requestCC();

            //print_r ($response);exit();

            // Response from NICEPAY
            if (isset($response->resultCd) && $response->resultCd == "0000") {
                $timeStampPayment = date('Ymd').date('His');
                $nicepay->set('timeStamp', $timeStampPayment);
                $nicepay->set('iMid', NICEPAY_IMID);
                $nicepay->set('referenceNo', $response->referenceNo);
                $nicepay->set('amt', $response->amt);
                $nicepay->set('merchantKey', NICEPAY_MERCHANT_KEY);
                $merchantToken = $nicepay->merchantToken();
                $callBackUrl = NICEPAY_CALLBACK_URL;

                return redirect()->route('payment', 'tXid='.$response->tXid.'&timeStamp='.$timeStampPayment.'&callBackUrl='.$callBackUrl.'&merchantToken='.$merchantToken);

            }
        } 
        
        // Unknown Pay Method
        else {
            $request->session()->flash('msg', 'Please Set Amount, ReferenceNo and tXid.');
            return redirect()->route('otherError');
        }
    }
}
