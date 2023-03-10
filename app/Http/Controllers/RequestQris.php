<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\NicepayLib;

class RequestQris extends Controller
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
        if(isset($_POST['payMethod']) && $_POST['payMethod'] == '08'){

            // Populate Mandatory parameters to send
            $nicepay->set('payMethod', '08');
            $nicepay->set('currency', 'IDR');
        
            if(!isset($_POST['referenceNo']) || $_POST['referenceNo'] == null){
                $nicepay->set('referenceNo', generateReference()); // Invoice Number or Reference Number Generated by merchant
            }else{
                $nicepay->set('referenceNo', $_POST['referenceNo']);
            }
        
            $nicepay->set('amt', $_POST['amt']); // Total gross amount
            $nicepay->set('description', 'Payment of Invoice No '.$nicepay->get('referenceNo')); // Transaction description
        
            $nicepay->set('billingNm', 'John Doe'); // Customer name
            $nicepay->set('billingPhone', '081111111111'); // Customer phone number
            $nicepay->set('billingEmail', 'john@example.com'); // Customer Email
            $nicepay->set('billingAddr', 'Jl. Jend. Sudirman No. 28');
            $nicepay->set('billingCity', 'Jakarta Pusat');
            $nicepay->set('billingState', 'DKI Jakarta');
            $nicepay->set('billingPostCd', '10210');
            $nicepay->set('billingCountry', 'Indonesia');
        
            $nicepay->set('deliveryNm', 'John Doe'); // Delivery name
            $nicepay->set('deliveryPhone', '082111111111');
            $nicepay->set('deliveryAddr', 'Jl. Jend. Sudirman No. 28');
            $nicepay->set('deliveryCity', 'Jakarta Pusat');
            $nicepay->set('deliveryState', 'DKI Jakarta');
            $nicepay->set('deliveryPostCd', '10210');
            $nicepay->set('deliveryCountry', 'Indonesia');
        
            $timeStampRegist = date('Ymd').date('His');
            $nicepay->set('timeStamp', $timeStampRegist);
            $nicepay->set('reqDt', date('Ymd'));
            $nicepay->set('reqTm', date('His'));
            $nicepay->set('paymentExpDt', '');
            $nicepay->set('paymentExpTm', ''); // *Note paymentExpTm max 20 menit
        
            $nicepay->set('mitraCd', $_POST['mitraCd']); // QRIS
            $nicepay->set('shopId', 'NICEPAY'); // *Note shopId QRIS from Merchant
            // Send Data
            $response = $nicepay->requestQris();

            // Response from NICEPAY
            if (isset($response->resultCd) && $response->resultCd == "0000") {

                return redirect()->route('responseQris', 'tXid='.
                    $response->tXid.
                    '&referenceNo='.$response->referenceNo.
                    '&resultCd='.$response->resultCd.
                    '&resultMsg='.$response->resultMsg.
                    '&amt='.$response->amt.
                    '&description='.$response->description.
                    '&billingNm='.$response->billingNm.
                    '&paymentExpDt='.$response->paymentExpDt.
                    '&paymentExpTm='.$response->paymentExpTm.
                    '&qrContent='.$response->qrContent.
                    '&qrUrl='.$response->qrUrl
                );

            } elseif(isset($response->resultCd)) {
                return redirect()->route('otherError', (array) $response);
            } else {
                $request->session()->flash('msg', 'Connection Timeout. Please Try Again!');
            }

            
        }
    }
}