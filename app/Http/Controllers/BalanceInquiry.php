<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Library\NicepayLib;

class BalanceInquiry extends Controller
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

        if(!empty($_POST['iMid']) && !empty($_POST['iMid'])){

            // Populate Mandatory parameters to send
            $iMid = $_POST['iMid'];
            $nicepay->set('merchantKey', NICEPAY_MERCHANT_KEY);
            $timeStamp = $_POST['timeStamp'];

            // print_r($nicepay);exit();
        
            // Send Data
            $response = $nicepay->BalanceInquiry($timeStamp, $iMid);

            // print_r($response);exit();

            // Response from NICEPAY
            if (isset($response->resultCd) && $response->resultCd == "0000") {

                return redirect()->route('resultBalance', 'resultCd='.
                    $response->resultCd.'&balance='.$response->balance.
                    '&scheduled='.$response->scheduled.
                    '&resultMsg='.$response->resultMsg
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
