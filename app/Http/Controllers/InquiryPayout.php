<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Library\NicepayLib;

class InquiryPayout extends Controller
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
            $timeStamp = $_POST['timeStamp'];
            $accountNo = $_POST['accountNo'];

            // print_r($nicepay);exit();
        
            // Send Data
            $response = $nicepay->InquiryPayout($timeStamp, $iMid, $tXid, $accountNo);

            // print_r($response);exit();

            // Response from NICEPAY
            if (isset($response->resultCd) && $response->resultCd == "0000") {

                return redirect()->route('resultInquiry', 'tXid='.
                    $response->tXid.'&referenceNo='.$response->referenceNo.
                    '&status='.$response->status.
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
