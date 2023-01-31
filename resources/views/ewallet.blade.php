<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Gili and HanHan">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NICEPAY - Secure Checkout</title>
    <link rel="icon" type="image/png" href="{{ URL::asset('/img/nicepay_logo.jpg') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('/css/index.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>

<body>

<!-- NAVIGATION PANE -->
<!-- <div class="nav flex-center">
    <input class="tablinks" type="button" onclick="window.location='{{ url("/")}}'" id="home-btn" value="<<" />
    <input class="tablinks" type="button" onclick="openCity(event, 'payMethod-form')" id="payMethod-btn" value="E-Wallet" />
    <input class="tablinks" type="button" onclick="openCity(event, 'check-form')" id="check-btn" value="Check Payment" />
    <input class="tablinks" type="button" onclick="openCity(event, 'cancel-form')" id="cancel-btn" value="Cancel Payment" />
</div> -->

<!-- FORM CHECKOUT PAYMENT METHOD -->
<div id="payMethod-form" class="form-style-8">
    <div class="main-title"><img class="img-valign" style="width: 60px; height:auto" src="{{ url('/img/nicepay_logo.jpg') }}" alt="Logo">E-Wallet V2 DIRECT</div>
    <form action="/requestEWallet" method="post">
        @csrf
        <input type="hidden" name="payMethod" value="05">

        <div class="group">
        <input type="text" name="referenceNo"  value="<?php date_default_timezone_set('Asia/Jakarta'); echo(date('YmdHis'));?>"/>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Reference Number</label>
        </div>

        <div class="group">
            <input type="number" min="1" name="amt" value="2000" />
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Price</label>
        </div>

        <div class="group">
            <select name="mitraCd">
                <option selected value="OVOE">OVO</option>
                <option value="DANA">DANA</option>
                <option value="LINK">LINK</option>
                <option value="ESHP">ShopeePay</option>
            </select>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Mitra E-Wallet</label>
        </div>

        <div class="group">
            <input type="text" name="phoneNumber" value="082110000000" required/>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Phone Number</label>
        </div>


        <input class="help-btn" type="button" onclick="window.location='https://docs.nicepay.co.id/api-v2-EN.html#virtual-account'" id="home-btn" value="?" />
        <input type="submit" value="Checkout" />
        <input class="tablinks" type="button" onclick="window.location='{{ url('/')}}'" id="home-btn" value="<<" />
    </form>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.1.min.js?ver=3.5"></script>
<script type="text/javascript" src="{{ URL::asset('/js/index.js') }}"></script>

</body>
</html>