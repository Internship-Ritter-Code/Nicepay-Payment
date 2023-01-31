<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\NicepayLib;

class CheckPayment extends Controller
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

        if(!empty($_POST['tXid']) && !empty($_POST['tXid'])){

            // Populate Mandatory parameters to send
            $iMid = NICEPAY_IMID;
            $nicepay->set('merchantKey', NICEPAY_MERCHANT_KEY);
            $tXid = $_POST['tXid'];
            $amt = $_POST['amt'];
            $referenceNo = $_POST['referenceNo'];
            $timeStamp = date("Ymd").date("his");
            //print_r($tXid.'-'.$amt.'-'.$referenceNo);exit();

            // <REQUEST to NICEPAY>
            $response = $nicepay->checkPaymentStatus($timeStamp, $iMid, $tXid, $referenceNo, $amt);
            //print_r($response);exit();

            // <RESPONSE from NICEPAY>
            if (isset($response->resultCd) && $response->resultCd == "0000") {
                return redirect()->route('checkPaymentResult', 'tXid='.
                    $response->tXid.
                    '&referenceNo='.$response->referenceNo.
                    '&reqDt='.$response->reqDt.
                    '&reqTm='.$response->reqTm.
                    '&transDt='.$response->transDt.
                    '&transTm='.$response->transTm.
                    '&resultMsg='.$response->resultMsg.
                    '&payMethod='.$response->payMethod.
                    '&amt='.$response->amt
                );
            } elseif(isset($response->resultCd)) {
                return redirect()->route('otherError', (array) $response);
            } else {
                $request->session()->flash('msg', 'Connection Timeout. Please Try Again!');
            }
        }
    }
}
