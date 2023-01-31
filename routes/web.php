<?php
use Illuminate\Http\Request;
include_once(app_path() . '/Library/NicepayConfig.php');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');
Route::view('cc', 'cc');
Route::view('va', 'va');
Route::view('cvs', 'cvs');
Route::view('ewallet', 'ewallet');
Route::view('qris', 'qris');
Route::view('clickpay', 'clickpay');
Route::view('payloan', 'payloan');
Route::view('payout', 'payout');

Route::any('result',function(Request $request){
    Session::flash('iMid', NICEPAY_IMID);
    Session::flash('merchantKey', NICEPAY_MERCHANT_KEY);
    return view ('result', $request->input());
});
Route::get('checkPaymentResult', function(Request $request){
    return view ('checkPaymentResult', $request->input());
})->name('checkPaymentResult');
Route::get('cancelResult', function(Request $request){
    return view ('cancelResult', $request->input());
})->name('cancelResult');

Route::get('otherError', function(Request $request){
    return view ('otherError', $request->input());
})->name('otherError');

Route::get('resultCVS', function(Request $request){
    return view ('resultCVS', $request->input());
})->name('resultCVS');

Route::get('result', function(Request $request){
    return view ('result', $request->input());
})->name('result');

Route::get('responseQris', function(Request $request){
    return view ('responseQris', $request->input());
})->name('responseQris');

Route::get('resultQris', function(Request $request){
    return view ('resultQris', $request->input());
})->name('resultQris');

Route::get('resultPayout', function(Request $request){
    return view ('resultPayout', $request->input());
})->name('resultPayout');

Route::get('resultApprove', function(Request $request){
    return view ('resultApprove', $request->input());
})->name('resultApprove');

Route::get('resultReject', function(Request $request){
    return view ('resultReject', $request->input());
})->name('resultReject');

Route::get('resultInquiry', function(Request $request){
    return view ('resultInquiry', $request->input());
})->name('resultInquiry');

Route::get('resultBalance', function(Request $request){
    return view ('resultBalance', $request->input());
})->name('resultBalance');

Route::get('resultCancel', function(Request $request){
    return view ('resultCancel', $request->input());
})->name('resultCancel');

Route::get('payment', function(Request $request){
    return view ('payment', $request->input());
})->name('payment');

Route::get('paymentClickPay', function(Request $request){
    return view ('paymentClickPay', $request->input());
})->name('paymentClickPay');

Route::post('requestCC','RequestCC');
Route::post('requestVA','RequestVA');
Route::post('requestCVS','RequestCVS');
Route::post('requestEWallet','RequestEWallet');
Route::post('requestQris','requestQris');
Route::post('requestClickPay','requestClickPay');
Route::post('requestPayloan','RequestPayloan');
Route::post('requestPayout','RequestPayout');
Route::post('approvePayout','ApprovePayout');
Route::post('rejectPayout','RejectPayout');
Route::post('inquiryPayout','InquiryPayout');
Route::post('balanceInquiry','BalanceInquiry');
Route::post('cancelPayout','CancelPayout');
Route::post('checkPayment','CheckPayment');
Route::post('cancelPayment', 'CancelPayment');
