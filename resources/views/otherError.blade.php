<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Gili and HanHan">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cancellation Result</title>
    <link rel="icon" type="image/png" href="{{ URL::asset('/img/nicepay_logo.jpg') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('/css/index.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>

    <div class="form-style-8" style="margin-top:5%;">
        <div class="main-title"><img class="img-valign" style="width: 60px; height:auto" src="{{ url('/img/nicepay_logo.jpg') }}" alt="">Thank You and Have a nice pay</div>
        <form action="index.php" method="get">

            <div class="group">
                <input type="text" style="font-size: 10px;" name="tXid" value="<?= $_GET['resultCd'] ?>">   
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Error Code</label>         
            </div>

            <div class="group">
                <input type="text" style="font-size: 10px;" name="resultMsg" value="<?=$_GET['resultMsg'] ?>">            
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Error Message</label>           
            </div>
                               
            <input type="submit" value="Back To Checkout" formaction="/" />
        </form>
    </div>
</body>
</html>
