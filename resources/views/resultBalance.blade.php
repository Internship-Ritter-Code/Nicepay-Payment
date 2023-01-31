<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="author" content="Riko Adi S">
    <title>Result Balance Payout</title>
    <link rel="icon" type="image/png" href="{{ url('/img/nicepay_logo.jpg') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('/css/index.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>

    <div class="form-style-8" style="margin-top:5%;">
        <h2><img class="img-valign" style="width: 60px; height:auto" src="{{ url('/img/nicepay_logo.jpg') }}" alt="">Result Balance Payout</h2>

        <div class="group">
                <input type="text" name="resultCd" value="<?= $_REQUEST['resultCd'] ?>">   
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Result Code</label>         
            </div>

            <div class="group">
                <input type="text" name="balance" value="<?= $_REQUEST['balance'] ?>">            
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Balance</label>           
            </div>
            
            <div class="group">
                <input type="text" name="scheduled" value="<?= $_REQUEST['scheduled'] ?>">            
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Scheduled</label>           
            </div>

            <div class="group">
                <input type="text" name="resultMsg" value="<?= $_REQUEST['resultMsg'] ?>">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Result Message</label>           
            </div>

        <form action="/" method="get"><br>
            <input type="submit" value="Back" formaction="/payout" />
        </form>
    </div>
</body>
</html>