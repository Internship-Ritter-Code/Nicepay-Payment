<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your order is being processed...</title>
    <link rel="icon" type="image/png" href="{{ URL::asset('/img/nicepay_logo.jpg') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('/css/index.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <style>
		.qrdetails{
			align-content: center;
			text-align: center;
		}
		.qrdetailsimage{
			display: flex;
			justify-content: center;
		}
		.continue-btn{
			width: 10em;  
			height: 3em;
			font-size: 30px;
			color: white !important;
			background-color: orange !important;
		}
		.continue-btn:hover{
			color: white !important;
			background-color: darkorange !important;
		}
	</style>

    <!-- Javascript -->
	<script>
		function startTimer(duration, display) {
			var timer = duration, minutes, seconds;
			var end = setInterval(function () {
				minutes = parseInt(timer / 60, 10);
				seconds = parseInt(timer % 60, 10);

				minutes = minutes < 10 ? "0" + minutes : minutes;
				seconds = seconds < 10 ? "0" + seconds : seconds;

				display.textContent = minutes + ":" + seconds;

				if (--timer < 0) {
					// timer = duration;

					const buildURLQuery = obj =>
					Object.entries(obj)
							.map(pair => pair.map(encodeURIComponent).join('='))
							.join('&');

					window.location.href = '{{ url('resultQris?') }}' + buildURLQuery({tXid: '{{ $_GET['tXid'] }}', referenceNo: '{{ $_GET['referenceNo'] }}', amt: '{{ $_GET['amt'] }}', description: '{{ $_GET['description'] }}'});


					clearInterval(end);
				}
			}, 1000);
		}

		window.onload = function () {
			var fiveMinutes = 60 * 5,
			display = document.querySelector('#time');
			startTimer(fiveMinutes, display);
		};
	</script>
</head>

<body>
    <div id="response-payMethod-QRIS" class="form-style-8" style="margin-top:5%;">
		<h2><img class="img-valign" style="width: 60px; height:auto" src="" alt="">Result QRIS</h2>
		
		<div class="qrdetails">
			<h4><strong>Silahkan Scan QRIS berikut menggunakan Applikasi pembayaran yang mendukung QRIS.</strong></h4>
		</div>

		<div class="group qrdetailsimage" style="margin-bottom: 20px;">
            <img src="{{ url('/img/qrisLogo.png') }}" alt="QRIS Logo">
		</div>

		<div class="group qrdetailsimage">
			<img src="{{ $_GET['qrUrl'] }}" alt="QRIS Image" width="280px" height="280px">
		</div>

		<div class="group qrdetails" style="margin-bottom: 20px;">
			<button onClick="window.location = '{{ $_GET['qrUrl'] }}'" class="btn"> <i class="fa fa-download"></i> Download QR </button>
			<strong>QR hanya valid dalam <strong><p id="time">5 Menit</p></strong>Tekan tombol Continue jika sudah melakukan pembayaran.</strong>
			<p><small>Halaman ini akan otomatis redirect dalam 5 menit.</small></p>
		</div>

		<div class="group qrdetailsimage">
			<a href="{{ url('qris') }}"><input type="button" value="Continue" /></a>
		</div>

		<div class="group">
			<input type="text" name="code" id="code" value="{{ $_GET['resultCd'] }}" />
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>Result Code</label>
		</div>

		<div class="group">
			<input type="text" name="message" id="message" value="{{ $_GET['resultMsg'] }}" />
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>Result Message</label>
		</div>

		<div class="group">
			<input type="text" name="tXid" id="tXid" value="{{ $_GET['tXid'] }}" />
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>Trans ID</label>
		</div>

		<div class="group">
			<input type="text" name="referenceNo" id="referenceNo" value="{{ $_GET['referenceNo'] }}" />
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>Reference Number</label>
		</div>

		<div class="group">
			<input type="text" name="amt" id="amt" value="{{ $_GET['amt'] }}" />
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>Amount</label>
		</div>

		<div class="group">
			<input type="text" name="billingNm" id="billingNm" value="{{ $_GET['billingNm'] }}" />
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>Billing Name</label>
		</div>

		<div class="group">
			<input type="text" name="paymentExpDt" id="paymentExpDt" value="{{ $_GET['paymentExpDt'] }}" />
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>Payment Expired Date</label>
		</div>

		<div class="group">
			<input type="text" name="paymentExpTm" id="paymentExpTm" value="{{ $_GET['paymentExpTm'] }}" />
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>Payment Expired Time</label>
		</div>

		<div class="group">
			<input type="text" style="text-transform: lowercase;" name="qrContent" id="qrContent" value="{{ $_GET['qrContent'] }}" />
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>QR Content</label>
		</div>

		<div class="group">
			<input type="text" style="text-transform: none;" name="qrUrl" id="qrUrl" value="{{ $_GET['qrUrl'] }}" />
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>QR URL</label>
		</div>
	</div>
</body>
</html>
