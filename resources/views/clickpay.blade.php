<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Gili and HanHan">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NICEPAY - Regist Clickpay</title>
    <link rel="icon" type="image/png" href="{{ URL::asset('/img/nicepay_logo.jpg') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('/css/index.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>

<body>

<!-- FORM CHECKOUT PAYMENT METHOD -->
<div id="payMethod-form" class="form-style-8">
    <div class="main-title"><img class="img-valign" style="width: 60px; height:auto" src="{{ url('/img/nicepay_logo.jpg') }}" alt="Logo">Clickpay Jenius V2 Direct</div>
    <form action="/requestClickPay" method="post">
        @csrf
        <input type="hidden" name="payMethod" value="04">

        <div class="group">
            <div class="row">
                <div class="column left"><img class="img-valign" style="width: 150px; height:auto" src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone11-select-2019-family?wid=882&amp;hei=1058&amp;fmt=jpeg&amp;qlt=80&amp;op_usm=0.5,0.5&amp;.v=1567022175704" alt="Logo"></div>
                <div class="column right"><p style="text-align: justify">iPhone 11 succeeds the iPhone XR, and it features a 6.1-inch LCD display that Apple calls a "Liquid Retina HD Display." It features a 1792 x 828 resolution at 326ppi, a 1400:1 contrast ratio, 625 nits max brightness, True Tone support for adjusting the white balance to the ambient lighting, and wide color support for true-to-life colors.</p></div>
            </div>
        </div>
        
        <div class="group">
            <input type="text" name="referenceNo"  value="{{uniqid('NCPAY-', true)}}"/>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Reference Number</label>
        </div>

        <div class="group">
            <select name="mitraCd">
              <option selected value="JENC">Jenius</option>
            </select>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Mitra Code</label>
          </div>

        <div class="group">
            <input type="number" min="1" name="amt" value="15000" />
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Price</label>
        </div>

        <div class="group">
            <input type="number" min="11" name="billingPhone" value="082110000000" />
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Phone Number</label>
        </div>


        <input class="help-btn" type="button" onclick="window.location='https://docs.nicepay.co.id/api-v2-EN.html#virtual-account'" id="home-btn" value="?" />
        <input type="submit" value="Checkout" />
        <input class="tablinks" type="button" onclick="window.location='{{ url("/")}}'" id="home-btn" value="<<" />
    </form>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.1.min.js?ver=3.5"></script>
<script type="text/javascript" src="{{ URL::asset('/js/index.js') }}"></script>

</body>
</html>
