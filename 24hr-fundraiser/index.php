// <?php

// $url = "https://www.justgiving.com/crowdfunding/roundtheclockradiochallenge";
// $html = file_get_contents($url);

// $dom = new DOMDocument();
// $dom->loadHTML($html);

// $xpath = new DOMXPath($dom);

// $elements = $xpath->query("//*[@class='jg-text--brand-large _24ROb']");

// $value = $elements[0]->nodeValue;

// $printStr = substr($value, strpos($value, "£"), strlen($value));
// // echo substr($value, strpos($value, "£"), strlen($value));

// ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="extra-style.css">
    <title>PureFM Clock</title>
    <script src="script.js"></script>
</head>
<body onload="setCurrentTime()">
    <div class="header">
        <p style="color: red;">This is a legacy page and will no longer be updaed.. Thank you to all who have donated and been a part of the Round The Clock Radio Challenege. The JustGiving live updates have been disabled. See the <a href="https://www.justgiving.com/crowdfunding/roundtheclockradiochallenge">JustGiving page</a> for the live total.</p>
       <img src="pure-logo.png" alt-text="PureFM Logo" class="left logo-img">
        <img src="rtcrc.png" alt-text="Round The Clock Radio Challenge Logo" class="logo-img right" id="rtcrc">
    </div>
    <div class="left container">
        <div class="clock">
            <div class="outer-clock-face">
                <div class="marking marking-one"></div>
                <div class="marking marking-two"></div>
                <div class="marking marking-three"></div>
                <div class="marking marking-four"></div>
                <div class="inner-clock-face">
                    <div class="hand hour-hand" id="hour-hand"></div>
                    <div class="hand min-hand" id="min-hand"></div>
                    <div class="hand second-hand" id=second-hand></div>
                </div>
            </div>
        </div>
        <div class="words">
            <p id="numeric-time" class="big bottom-gap">Time</p>
            <p id="words-time" class="big large-bottom-gap">Words Time</p>
            <p id="date" class="medium bottom-gap">Date</p>
        </div>
    </div>
    <div class="right">
        <div class="container-box">
            <p class="medium">Time remaining</p>
            <p id="countdown-timer" class="words medium script"></p>
        </div>
        <div class="container-box">
            <p class="medium">Fundraising Target</p>
            <p class="words medium script">£600</p>
        </div>
        <div class="container-box">
            <p class="medium">Amount Raised <span class="small italic">(approx)</span></p>
            <p class="words medium script">£545</p>
        </div>
    </div>
    <div class="footer">
        <p>PureFM Studio Clock | Open Source on Github</p>
        <p>24 hour Round The Clock Challenge Special Edition</p>
        <p>v1 2023-03-03 | PHP atrocity edition</p>
    </div>

    <script>
        // this makes the countdown timer do timer things.
        // at this point, this is the best that its gonna be.
        // I think this came from a W3schools tutorial many years ago, modified slightly to be better JS. 

        // Set the date we're counting down to
        let countDownDate = new Date("Mar 5, 2023 12:00:00").getTime();

        // Update the count down every 1 second
        let x = setInterval(function() {

            // Get today's date and time
            let now = new Date().getTime();

            // Find the distance between now and the count down date
            let distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            let days = Math.floor(distance / (1000 * 60 * 60 * 24));
            let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("countdown-timer").innerHTML = minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown-timer").innerHTML = "00m 00s";
            }
        }, 1000);
    </script>

</body>
</html>
