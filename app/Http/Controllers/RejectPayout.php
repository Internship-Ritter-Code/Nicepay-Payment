<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Library\NicepayLib;

class RejectPayout extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
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
            $timeStamp = date("Ymd").date("his");

            // print_r($nicepay);exit();
        
            // Send Data
            $response = $nicepay->RejectPayout($timeStamp, $iMid, $tXid);

            // print_r($response);exit();

            // Response from NICEPAY
            if (isset($response->resultCd) && $response->resultCd == "0000") {

                return redirect()->route('resultReject', 'tXid='.
                    $response->tXid.'&referenceNo='.$response->referenceNo.
                    '&resultMsg='.$response->resultMsg.
                    '&amt='.$response->amt.
                    '&accountNo='.$response->accountNo.
                    '&bankCd='.$response->bankCd.
                    '&benefNm='.$response->benefNm
                );

            } 
            elseif(isset($response->resultCd)) {
                return redirect()->route('otherError', (array) $response);
            } else {
                $request->session()->flash('msg', 'Connection Timeout. Please Try Again!');
            }
        }
    }
}
