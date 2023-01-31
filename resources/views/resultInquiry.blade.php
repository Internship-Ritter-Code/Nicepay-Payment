<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="author" content="Riko Adi S">
    <title>Result Inquiry Payout</title>
    <link rel="icon" type="image/png" href="{{ url('/img/nicepay_logo.jpg') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('/css/index.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>

    <div class="form-style-8" style="margin-top:5%;">
        <h2><img class="img-valign" style="width: 60px; height:auto" src="http://127.0.0.1:8000/img/nicepay_logo.jpg" alt="">Check Status Payout</h2>

            <div class="group">
                <input type="text" name="tXid" value="<?= $_REQUEST['tXid'] ?>">   
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Transaction ID</label>         
            </div>

            <div class="group">
                <input type="text" name="status" value="<?= $_REQUEST['status'] ?>">            
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Status</label>           
            </div>
            
            <div class="group">
                <input type="text" name="amt" value="<?= $_REQUEST['amt'] ?>">            
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Amount</label>           
            </div>

            <div class="group">
                <input type="text" name="referenceNo" value="<?= $_REQUEST['referenceNo'] ?>">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Reference No</label>           
            </div>

            <div class="group">
                <input type="text" name="benefNm" value="<?= $_REQUEST['benefNm'] ?>">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Beneficiary Name</label>           
            </div>

            <div class="group">
                <input type="text" name="accountNo" value="<?= $_REQUEST['accountNo'] ?>">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Beneficiary Account No</label>           
            </div>

            <div class="group">
                <input type="text" name="bankCd" value="<?= $_REQUEST['bankCd'] ?>">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Bank Code</label>
            </div>

        <form action="/" method="get"><br>
            <input type="submit" value="Back" formaction="/payout" />
        </form>
    </div>
</body>
</html>