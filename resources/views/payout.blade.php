<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="author" content="Riko Adi S">
  <title>NICEPAY - Secure Checkout</title>
  <link rel="icon" type="image/png" href="{{ URL::asset('/img/nicepay_logo.jpg') }}"/>
  <link rel="stylesheet" href="{{ URL::asset('/css/index.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

  <style>
    .nav{
      font-family: 'Roboto', sans-serif;
      width: 800px;
      padding: 30px;
      /* background: #FFFFFF; */
      margin: 50px auto 25px auto;
      /* box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22); */
      -moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
      -webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);
    }
  </style>
</head>

<body>

  <!-- NAVIGATION PANE -->
  <div class="nav">
    <center>
      <input class="tablinks" style="font-size: 14px;" type="button" onclick="openCity(event, 'payMethod-form')" id="payMethod-btn" value="Request Payout" />
      <input class="tablinks" style="font-size: 14px;" type="button" onclick="openCity(event, 'reject-form')" id="reject-btn" value="Reject Payout" />
      <input class="tablinks" style="font-size: 14px;" type="button" onclick="openCity(event, 'check-form')" id="check-btn" value="Check Status" />
      <input class="tablinks" style="font-size: 14px;" type="button" onclick="openCity(event, 'balance-form')" id="balance-btn" value="Check Balance" />
      <input class="tablinks" style="font-size: 14px;" type="button" onclick="openCity(event, 'cancel-form')" id="cancel-btn" value="Cancel Payout" />
    </center><br>
    <center>
      <input class="tablinks" type="hidden" onclick="openCity(event, 'selBalance-form')" id="selBalance-btn" value="Seller Balance" />
      <input class="tablinks" type="hidden" onclick="openCity(event, 'merBalance-form')" id="merBalance-btn" value="Merchant Balance" />
    <center>  
  </div>
  
  <!-- FORM REQUEST PAYOUT -->
  <div id="payMethod-form" class="form-style-8" style="width: 800px">
    <h2><img class="img-valign" style="width: 60px; height:auto" src="nicepay_logo.jpg" alt="">Request Payout</h2>
      <form action="/requestPayout" method="post">
        @csrf
        <input type="hidden" name="payMethod" value="07">

        <div class="group">      
            <input type="text" name="referenceNo" value="<?php date_default_timezone_set('Asia/Jakarta'); echo(date('YmdHis'));?>"/>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Reference Number</label>
        </div>

        <div class="group">
            <input type="text" name="accountNo" value="6030901753" required/>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Beneficiary Account No</label>
        </div>

        <div class="group">      
            <input type="number" min="1" name="amt" value="15000" />
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Price</label>
        </div>

        <div class="group">
            <input type="text" name="benefPhone" value="082110000000" required/>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Beneficiary Phone</label>
        </div>

        <input type="submit" value="Submit" />
      </form>
  </div>

  <!-- FORM REJECT -->
  <div id="reject-form" class="form-style-8" style="width: 800px">
    <h2><img class="img-valign" style="width: 60px; height:auto" src="nicepay_logo.jpg" alt="">Reject Payout</h2>
    <form action="/rejectPayout" method="post">
      @csrf
      <input type="hidden" name="payMethod" value="07">
      
        <div class="group">
            <input type="text" name="tXid"/>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Transaction ID</label>
        </div>

        <div class="group">
            <input type="number" min="1" name="timeStamp" value="<?=date("Ymd").date("his") ?>" />
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Time Stamp</label>
        </div>

      <input type="submit" value="Submit" />
    </form>
  </div>

  <!-- FORM CHECK STATUS -->
  <div id="check-form" class="form-style-8" style="width: 800px">
    <h2><img class="img-valign" style="width: 60px; height:auto" src="nicepay_logo.jpg" alt="">Check Status</h2>
    <form action="/inquiryPayout" method="post">
      @csrf
      <input type="hidden" name="payMethod" value="07">

      <div class="group">
        <input type="text" name="tXid"/>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Transaction ID</label>
      </div>

      <div class="group">
        <input type="text" name="accountNo" value="6030901753" />
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Account No</label>
      </div>

      <div class="group">
        <input type="number" min="1" name="timeStamp" value="<?=date("Ymd").date("his") ?>" />
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Time Stamp</label>
      </div>

      <input type="submit" value="Submit" />
    </form>
  </div>

  <!-- FORM CHECK BALANCE -->
  <div id="balance-form" class="form-style-8" style="width: 800px">
    <h2><img class="img-valign" style="width: 60px; height:auto" src="nicepay_logo.jpg" alt="">Check Balance</h2>
    <form action="/balanceInquiry" method="post">
      @csrf
      <input type="hidden" name="payMethod" value="07">

      <div class="group">
        <input type="text" name="iMid" value="IONPAYTEST" />
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>IMID</label>
      </div>

      <div class="group">
        <input type="number" min="1" name="timeStamp" value="<?=date("Ymd").date("his") ?>" />
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Time Stamp</label>
      </div>

      <input type="submit" value="Submit" />
    </form>
  </div>

  <!-- FORM CANCEL PAYOUT -->
  <div id="cancel-form" class="form-style-8" style="width: 800px">
    <h2><img class="img-valign" style="width: 60px; height:auto" src="nicepay_logo.jpg" alt="">Cancel Payout</h2>
    <form action="/cancelPayout" method="post">
      @csrf
      <input type="hidden" name="payMethod" value="07">

      <div class="group">
        <input type="text" name="tXid" />
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Transaction ID</label>
      </div>

      <div class="group">
        <input type="number" min="1" name="timeStamp" value="<?=date("Ymd").date("his") ?>" />
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Time Stamp</label>
      </div>

      <input type="submit" value="Submit" />
    </form>
  </div>

  <!-- FORM SELLER BALANCE -->
  <div id="selBalance-form" class="form-style-8" style="width: 800px">
    <h2><img class="img-valign" style="width: 60px; height:auto" src="nicepay_logo.jpg" alt="">Seller Balance</h2>
    <form action="sellerBalance.php" method="post">
      @csrf
      <input type="hidden" name="payMethod" value="07">

      <div class="group">
        <input type="text" name="msId" value="123" />
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>MSID</label>
      </div>

      <div class="group">
        <input type="text" name="referenceNo" style="text-transform:lowercase" value="<?php date_default_timezone_set('Asia/Jakarta'); echo(date('YmdHis'));?>"/>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Reference Number</label>
      </div>

      <div class="group">
        <input type="number" min="1" name="amt" value="1000" />
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Amount</label>
      </div>

      <input type="submit" value="Submit" />
    </form>
  </div>

  <!-- FORM MERCHANT BALANCE -->
  <div id="merBalance-form" class="form-style-8" style="width: 800px">
    <h2><img class="img-valign" style="width: 60px; height:auto" src="nicepay_logo.jpg" alt="">Merchant Balance</h2>
    <form action="merchantBalance.php" method="post">
      @csrf
      <input type="hidden" name="payMethod" value="07">

      <div class="group">
        <input type="text" name="msId" value="123" />
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>MSID</label>
      </div>

      <div class="group">
        <input type="text" name="referenceNo" style="text-transform:lowercase" value="<?php date_default_timezone_set('Asia/Jakarta'); echo(date('YmdHis'));?>"/>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Reference Number</label>
      </div>

      <div class="group">
        <input type="number" min="1" name="amt" value="1000" />
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Amount</label>
      </div>

      <input type="submit" value="Submit" />
    </form>
  </div>

  <script type="text/javascript" src="http://code.jquery.com/jquery-1.5.1.min.js?ver=3.5"></script>
  <script type="text/javascript" src="{{ URL::asset('/js/index.js') }}"></script>

</body>
</html>