<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\NicepayLib;
include_once(app_path() . '/Library/NicepayConfig.php');

class CancelPayment extends Controller
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
        //dd(NICEPAY_IMID);exit();

        if(!empty($_POST['tXid']) && !empty($_POST['tXid'])){

            $nicepay->set('iMid', NICEPAY_IMID);
            $nicepay->set('merchantKey', NICEPAY_MERCHANT_KEY);
            $nicepay->set('payMethod', $_POST['payMethod']);
            $nicepay->set('tXid', $_POST['tXid']);
            $nicepay->set('cancelType', $_POST['cancelType']);
            $nicepay->set('referenceNo', $_POST['referenceNo']);
            $nicepay->set('timeStamp', date("Ymd").date("his"));
            if ($_POST['cancelType']=='2'){
                $nicepay->set('amt', $_POST['amt']/2);
            }
            $nicepay->set('amt', $_POST['amt']);
        
            // <REQUEST to NICEPAY>
            $response = $nicepay->cancelTrans();
            //print_r($response);exit();
            //dd($_POST['cancelType']);exit();
            //print_r($request->iMid);exit();

            // <RESPONSE from NICEPAY>
            if (isset($response->resultCd) && $response->resultCd == "0000") {
                return redirect()->route('cancelResult', 'tXid='.
                $response->tXid.
                '&resultMsg='.$response->resultMsg.
                '&amt='.$response->amt.
                '&transDt='.$response->transDt.
                '&transTm='.$response->transTm.
                '&resultMsg='.$response->resultMsg.
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
