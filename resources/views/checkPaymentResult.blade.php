<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Gili and HanHan">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Status</title>
    <link rel="icon" type="image/png" href="{{ URL::asset('/img/nicepay_logo.jpg') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('/css/index.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>

<body>

<div class="form-style-8" style="margin-top:5%;">
    <div class="main-title"><img class="img-valign" style="width: 60px; height:auto" src="{{ url('/img/nicepay_logo.jpg') }}" alt="">Your Payment...</div>
    <form action="cancelPayment" method="post">
            @csrf
            <div class="group">
                <input type="text" name="tXid" value="{{ $_GET['tXid'] }}">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Transaction ID</label>
            </div>
            <div class="group">
                <input type="text" name="resultMsg" value="<?=$_GET['resultMsg'] ?>">            
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Status Payment</label>           
            </div>
            
            <div class="group">
                <input type="text" name="amt" value="<?=$_GET['amt'] ?>">            
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Amount</label>           
            </div>

            <div class="group">
                <input type="text" name="payMethod" value="<?=$_GET['payMethod'] ?>">            
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>payMethod</label>           
            </div>

            <div class="group">
                <input type="text" name="reqDt" value="<?= $_GET['reqDt'] ?>">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Request Date</label>           
            </div>

            <div class="group">
                <input type="text" name="reqTm" value="<?= $_GET['reqTm'] ?>">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Request Time</label>           
            </div>
            
            <div class="group">
                <input type="text" name="transDt" value="<?= $_GET['transDt'] ?>">            
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Transaction Date</label>           
            </div>

            <div class="group" style="margin-bottom: 5% !important;">
                <input type="text" name="transTm" value="<?= $_GET['transTm'] ?>">            
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Transaction Time</label>           
            </div>

            <div class="group" style="margin-bottom: 5% !important;">
                <input type="text" name="referenceNo" value="<?= $_GET['referenceNo'] ?>">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Reference No.</label>
            </div>

            <input type="radio" name="cancelType" value="1" checked>Full Cancellation
            <input type="radio" name="cancelType" value="2">Partial Cancellation
            <br >

            <input style="margin-top:5% !important;" type="submit" value="Cancel Transaction"/>
        </form>
        <br>
        <form action="index.php" method="get">
            <input type="submit" value="Back To Checkout" formaction="/"/>
        </form>

</div>
</body>
</html>
