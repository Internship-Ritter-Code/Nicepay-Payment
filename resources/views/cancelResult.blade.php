<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Gili and HanHan">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cancellation Result</title>
    <link rel="stylesheet" href="{{ URL::asset('/css/index.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>

    <div class="form-style-8" style="margin-top:5%;">
        <h2><img class="img-valign" style="width: 60px; height:auto" src="{{ url('/img/nicepay_logo.jpg') }}" alt="">CANCELLATION RESULT</h2>
            
            <div class="group">
                <input type="text" name="resultMsg" value="<?=$_GET['resultMsg'] ?>">            
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Status Cancel</label>           
            </div>
            
            <div class="group">
                <input type="text" name="canceltXid" value="<?= $_GET['tXid'] ?>">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Cancel Transaction ID</label>           
            </div>

            <div class="group">
                <input type="text" name="amt" value="<?= $_GET['amt'] ?>">            
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Amount</label>           
            </div>
            
            <div class="group">
                <input type="text" name="transDt" value="<?= $_GET['transDt'] ?>">            
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Transaction Date</label>           
            </div>

            <div class="group">
                <input type="text" name="transTm" value="<?= $_GET['transTm'] ?>">            
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Transaction Time</label>           
            </div>

        <form action="/" method="get">
            <input type="submit" value="Back To Checkout" formaction="/" />
        </form>
    </div>
</body>
</html>
