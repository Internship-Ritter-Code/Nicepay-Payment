<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NICEPAY - Secure Checkout</title>
    <link rel="icon" type="image/png" href="{{ URL::asset('/img/nicepay_logo.jpg') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('/css/index.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>

<body>

<!-- FORM CHECKOUT PAYMENT METHOD -->
<div id="payMethod-form" class="form-style-8">
    <div class="main-title"><img class="img-valign" style="width: 60px; height:auto" src="{{ url('/img/nicepay_logo.jpg') }}" alt="Logo">Payloan V2 DIRECT</div>
    <form action="/requestPayloan" method="post">
        @csrf
        <input type="hidden" name="payMethod" value="06">

        <div class="group">
            <input type="text" name="referenceNo"  value="<?= uniqid('NCPAY-', true) ?>"/>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Reference Number</label>
        </div>

        <div class="group">
            <input type="number" min="1" name="amt" value="12000" />
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Price</label>
        </div>

        <div class="group">
            <select name="mitraCd">
                <option selected value="KDVI">Kredivo</option>
                <option value="AKLP">Akulaku</option>
                <option value="IDNA">Indodana</option>
            </select>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Mitra Payloan</label>
        </div>

        <div class="group">
            <select name="instmntMon">
                <option value="1">Full Payment</option>
                <option value="3" disabled>3 Months</option>
                <option value="6" disabled>6 Months</option>
                <option value="12" disabled>12 Months</option>
            </select>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Installment</label>
        </div>


        <input class="help-btn" type="button" onclick="window.location='https://docs.nicepay.co.id/api-v2-EN.html#payloan'" id="home-btn" value="?" />
        <input type="submit" value="Checkout" />
        <input class="tablinks" type="button" onclick="window.location='{{ url('/')}}'" id="home-btn" value="<<" />
    </form>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.1.min.js?ver=3.5"></script>
<script type="text/javascript" src="{{ URL::asset('/js/index.js') }}"></script>

</body>
</html>
