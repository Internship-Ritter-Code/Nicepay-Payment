<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="author" content="Gili Heriawan and Yohanes Darmawan">
    <title>Your order is being process...</title>
    <link rel="icon" type="image/png" href="{{ url('/img/nicepay_logo.jpg') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('/css/index.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>

    <div class="form-style-8" style="margin-top:5%;">
        <h2><img class="img-valign" style="width: 60px; height:auto" src="{{ url('/img/nicepay_logo.jpg') }}" alt="">Thank You and Have a nice pay</h2>
        <form action="/checkPayment" method="post">

            <input type="hidden" name="checkPayment" value="checkPayment">

            <?php if ($_REQUEST['resultCd'] == '0000') { ?>
                <div class="group">
                    <input type="text" name="" value="<?= $_REQUEST['tXid'] ?>">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>TXID</label>
                </div>
                <div class="group">
                    <input type="text" name="" value="<?= $_REQUEST['referenceNo'] ?>">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Reference Number</label>
                </div>
                <div class="group">
                    <input type="text" name="" value="<?= $_REQUEST['amt'] ?>">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Amount</label>
                </div>
                <div class="group">
                    <input type="text" name="" value="<?= $_REQUEST['resultMsg'] ?>">
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Result</label>
                </div>
            <?php } else { ?>
                <?php header('Location: otherError?resultCd='.$_REQUEST['resultCd'].'&resultMsg='.$_REQUEST['resultMsg']);exit(); ?>
            <?php } ?>

            <input type="hidden" name="tXid" value="<?= $_REQUEST['tXid'] ?>">
            <input type="hidden" name="amt" value="<?= $_REQUEST['amt'] ?>">
            <input type="hidden" name="referenceNo" value="<?= $_REQUEST['referenceNo'] ?>">

            <!-- <input type="submit" value="check Payment"/> -->
            <?php if ($_REQUEST['resultCd'] == '0000') { ?>
                <input type="submit" value="Check Payment"/><br><br>
            <?php } else { ?>
                <input type="hidden" value="Check Payment"/>
            <?php } ?>
        </form>
        <form action="/" method="get">
            <input type="submit" value="Back To Checkout" formaction="/" />
        </form>
    </div>
</body>
</html>