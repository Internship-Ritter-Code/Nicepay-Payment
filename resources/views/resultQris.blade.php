<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Result QRIS</title>
    <link rel="icon" type="image/png" href="{{ URL::asset('/img/nicepay_logo.jpg') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('/css/index.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>

<body>

<div class="form-style-8" style="margin-top:5%;">
    <div class="main-title"><img class="img-valign" style="width: 60px; height:auto" src="{{ url('/img/nicepay_logo.jpg') }}" alt="">Thank You and Have a nice pay</div>

    <form action="/checkPayment" method="post">
        @csrf
        
        <div class="group">
            <input type="text" name="" value="{{ $_GET['tXid'] }}">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Transaction ID</label>
        </div>
        <div class="group">
            <input type="text" name="" value="{{ $_GET['referenceNo'] }}">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Reference Number</label>
        </div>
        <div class="group">
            <input type="text" name="" value="{{ $_GET['amt'] }}">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Amount</label>
        </div>
        <div class="group">
            <input type="text" name="" value="{{ $_GET['description'] }}">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Description</label>
        </div>

        <input type="hidden" name="tXid" value="<?= $_GET['tXid'] ?>">
        <input type="hidden" name="amt" value="<?= $_GET['amt'] ?>">
        <input type="hidden" name="referenceNo" value="<?= $_GET['referenceNo'] ?>">

        <input type="submit" value="Check Payment"/>
    </form>
    <br>
    <form action="/" method="get">
        <input type="submit" value="Back To Checkout" formaction="/" />
    </form>
</div>
</body>
</html>
