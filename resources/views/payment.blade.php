<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Gili and HanHan">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your order is being processed...</title>
    <link rel="icon" type="image/png" href="{{ URL::asset('/img/nicepay_logo.jpg') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('/css/index.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>

<body>

<div class="form-style-8" style="margin-top:5%;">
    <div class="main-title"><img class="img-valign" style="width: 60px; height:auto" src="{{ url('/img/nicepay_logo.jpg') }}" alt="">Thank You and Have a nice pay</div>

    <form action="{{ NICEPAY_ORDER_PAYMENT_URL }}" method="post">
        @csrf
        
        <div class="group">
            <input type="text" name="tXid" value="{{ $_GET['tXid'] }}">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Transaction ID</label>
        </div>
        <div class="group">
            <input type="text" name="timeStamp" value="{{ $_GET['timeStamp'] }}">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>TimeStamp</label>
        </div>
        <div class="group">
            <input type="hidden" name="merchantToken" value="{{ $_GET['merchantToken'] }}">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Merchant Token</label>
        </div>
        <div class="group">
            <input type="text" name="cardNo" value="4111111111111111">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Card Number</label>
        </div>
        <div class="group">
            <input type="text" name="cardExpYymm" value="" placeholder="YYMM">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Card Expired (YYMM)</label>
        </div>
        <div class="group">
            <input type="password" name="cardCvv" value="">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>CVV</label>
        </div>
        <div class="group">
            <input type="hidden" name="callBackUrl" value="{{ $_GET['callBackUrl'] }}">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Callback</label>
        </div>
        <div class="group">
            <input type="text" name="cardHolderNm" value="John Doe">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Card Holder Name</label>
        </div>

        <input type="submit" value="Submit"/>
    </form>
</div>
</body>
</html>