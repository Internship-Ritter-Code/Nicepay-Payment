<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NICEPAY Customer Journey</title>

    <!-- Icon -->
    <link rel="icon" type="image/png" href="{{ URL::asset('/img/nicepay_logo.jpg') }}"/>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 75px;
            font-family: Georgia, Helvetica, sans-serif;
        }

        .links > a {
            color: #00b5ad;
            padding: 0 25px;
            font-size: 20px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        canvas {
            width: 100vw;
            height: 100vh;
            position:fixed;
        }
    </style>
</head>
<body>
<canvas id="c"></canvas>
<div class="flex-center position-ref full-height">
    <div class="content">
        {{-- <div style="cursor: pointer;"><img style="width: 100px;" class="img-valign" style="width: 60px; height:auto" src="{{ url('/img/nicepay-logo.jpg') }}" onclick="window.location='{{ url("https://nicepay.co.id")}}'"></div> --}}
        <div class="title m-b-md">
            NICEPAY API V2
        </div>
        <div class="links">
            <a href="/cc">Credit Card</a>
            <a href="/va">Virtual Account</a>
            <a href="/cvs">Convenience Store</a>
            <a href="/clickpay">Clickpay</a>
            <a href="/ewallet">Ewallet</a>
            <a href="/payloan">Payloan</a>
            <a href="/payout">Payout</a>
            <a href="/qris">QRIS</a>
            <a href="https://docs.nicepay.co.id/api-v2-EN.html">Documentation</a>
        </div>
        <canvas id="c"></canvas>
    </div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.1.min.js?ver=3.5"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/animejs/1.0.0/anime.min.js"></script>
<script type="text/javascript">
    var c = document.getElementById("c");
    var ctx = c.getContext("2d");
    var cH;
    var cW;
    var bgColor = "White";
    var animations = [];
    var circles = [];

    var colorPicker = (function() {
        var colors = ["White", "#282741"];
        var index = 0;
        function next() {
            index = index++ < colors.length-1 ? index : 0;
            return colors[index];
        }
        function current() {
            return colors[index]
        }
        return {
            next: next,
            current: current
        }
    })();

    function removeAnimation(animation) {
        var index = animations.indexOf(animation);
        if (index > -1) animations.splice(index, 1);
    }

    function calcPageFillRadius(x, y) {
        var l = Math.max(x - 0, cW - x);
        var h = Math.max(y - 0, cH - y);
        return Math.sqrt(Math.pow(l, 2) + Math.pow(h, 2));
    }

    function addClickListeners() {
        document.addEventListener("touchstart", handleEvent);
        document.addEventListener("mousedown", handleEvent);
    };

    function handleEvent(e) {
        if (e.touches) {
            e.preventDefault();
            e = e.touches[0];
        }
        var currentColor = colorPicker.current();
        var nextColor = colorPicker.next();
        var targetR = calcPageFillRadius(e.pageX, e.pageY);
        var rippleSize = Math.min(200, (cW * .4));
        var minCoverDuration = 750;

        var pageFill = new Circle({
            x: e.pageX,
            y: e.pageY,
            r: 0,
            fill: nextColor
        });
        var fillAnimation = anime({
            targets: pageFill,
            r: targetR,
            duration:  Math.max(targetR / 2 , minCoverDuration ),
            easing: "easeOutQuart",
            complete: function(){
                bgColor = pageFill.fill;
                removeAnimation(fillAnimation);
            }
        });

        var ripple = new Circle({
            x: e.pageX,
            y: e.pageY,
            r: 0,
            fill: currentColor,
            stroke: {
                width: 3,
                color: currentColor
            },
            opacity: 1
        });
        var rippleAnimation = anime({
            targets: ripple,
            r: rippleSize,
            opacity: 0,
            easing: "easeOutExpo",
            duration: 900,
            complete: removeAnimation
        });

        var particles = [];
        for (var i=0; i<32; i++) {
            var particle = new Circle({
                x: e.pageX,
                y: e.pageY,
                fill: currentColor,
                r: anime.random(24, 48)
            })
            particles.push(particle);
        }
        var particlesAnimation = anime({
            targets: particles,
            x: function(particle){
                return particle.x + anime.random(rippleSize, -rippleSize);
            },
            y: function(particle){
                return particle.y + anime.random(rippleSize * 1.15, -rippleSize * 1.15);
            },
            r: 0,
            easing: "easeOutExpo",
            duration: anime.random(1000,1300),
            complete: removeAnimation
        });
        animations.push(fillAnimation, rippleAnimation, particlesAnimation);
    }

    function extend(a, b){
        for(var key in b) {
            if(b.hasOwnProperty(key)) {
                a[key] = b[key];
            }
        }
        return a;
    }

    var Circle = function(opts) {
        extend(this, opts);
    }

    Circle.prototype.draw = function() {
        ctx.globalAlpha = this.opacity || 1;
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.r, 0, 2 * Math.PI, false);
        if (this.stroke) {
            ctx.strokeStyle = this.stroke.color;
            ctx.lineWidth = this.stroke.width;
            ctx.stroke();
        }
        if (this.fill) {
            ctx.fillStyle = this.fill;
            ctx.fill();
        }
        ctx.closePath();
        ctx.globalAlpha = 1;
    }

    var animate = anime({
        duration: Infinity,
        update: function() {
            ctx.fillStyle = bgColor;
            ctx.fillRect(0, 0, cW, cH);
            animations.forEach(function(anim) {
                anim.animatables.forEach(function(animatable) {
                    animatable.target.draw();
                });
            });
        }
    });

    var resizeCanvas = function() {
        cW = window.innerWidth;
        cH = window.innerHeight;
        c.width = cW * devicePixelRatio;
        c.height = cH * devicePixelRatio;
        ctx.scale(devicePixelRatio, devicePixelRatio);
    };

    (function init() {
        resizeCanvas();
        if (window.CP) {
            // CodePen's loop detection was causin' problems
            // and I have no idea why, so...
            window.CP.PenTimer.MAX_TIME_IN_LOOP_WO_EXIT = 6000;
        }
        window.addEventListener("resize", resizeCanvas);
        addClickListeners();
        if (!!window.location.pathname.match(/fullcpgrid/)) {
            startFauxClicking();
        }
        handleInactiveUser();
    })();

    function handleInactiveUser() {
        var inactive = setTimeout(function(){
            fauxClick(cW/2, cH/2);
        }, 99999);

        function clearInactiveTimeout() {
            clearTimeout(inactive);
            document.removeEventListener("mousedown", clearInactiveTimeout);
            document.removeEventListener("touchstart", clearInactiveTimeout);
        }

        document.addEventListener("mousedown", clearInactiveTimeout);
        document.addEventListener("touchstart", clearInactiveTimeout);
    }

    function startFauxClicking() {
        setTimeout(function(){
            fauxClick(anime.random( cW * .2, cW * .8), anime.random(cH * .2, cH * .8));
            startFauxClicking();
        }, anime.random(200, 900));
    }

    function fauxClick(x, y) {
        var fauxClick = new Event("mousedown");
        fauxClick.pageX = x;
        fauxClick.pageY = y;
        document.dispatchEvent(fauxClick);
    }

</script>
<script type="text/javascript" src="{{ URL::asset('/js/index.js') }}"></script>
</body>

</html>
