<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Gili and HanHan">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NICEPay - Secure Checkout</title>
    <link rel="icon" type="image/png" href="{{ URL::asset('/img/nicepay_logo.jpg') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('/css/index.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<style>
    .label{
        position: relative;
        display: block;
        width: 100%;
        height: 35px;
    }
    .group {
    position: relative;
        margin-bottom: 25px;
    }
    .none {display: none;}
</style>
<body>

<div class="form-style-8" style="margin-top:5%;">
    <div class="main-title"><img class="img-valign" style="width: 60px; height:auto" src="{{ url('/img/nicepay_logo.jpg') }}" alt="">NICEPay Secure Checkout</div>

    <form action="{{ NICEPAY_ORDER_PAYMENT_URL }}" method="post">
        @csrf
        
        <div class="group">
            <label class="label">TimeStamp</label>
            <input type="text" name="timeStamp" value="{{ $_GET['timeStamp'] }}" readonly>
            <span class="highlight"></span>
            <span class="bar"></span>
        </div>
        <div class="group">
            <label class="label">Transaction ID</label>
            <input type="text" name="tXid" value="{{ $_GET['tXid'] }}" readonly>
            <span class="highlight"></span>
            <span class="bar"></span>
        </div>
        <div class="group">
            <label class="label">Reference Number</label>
            <input type="text" style="text-transform: none;" name="referenceNo" value="{{ $_GET['referenceNo'] }}" readonly>
            <span class="highlight"></span>
            <span class="bar"></span>
        </div>
        <div class="group">
            <label class="label">Price</label>
            <input type="number" name="amt" value="{{ $_GET['amt'] }}" readonly>
            <span class="highlight"></span>
            <span class="bar"></span>
        </div>
        <div class="group none">
            <label class="label">Merchant Token</label>
            <input type="hidden" name="merchantToken" value="{{ $_GET['merchantToken'] }}">
            <span class="highlight"></span>
            <span class="bar"></span>
        </div>
        <div class="group">
            <label class="label">Cashtag</label>
            <input type="text" style="text-transform: none;" name="cashtag" value="$">
            <span class="highlight"></span>
            <span class="bar"></span>
        </div>
        <div class="group">
            <label class="label">Callback URL</label>
            <input type="text" style="text-transform: none;" name="callBackUrl" value="{{ $_GET['callBackUrl'] }}" readonly>
            <span class="highlight"></span>
            <span class="bar"></span>
        </div>

        <input type="submit" value="Submit"/>
    </form>
</div>
</body>
</html>