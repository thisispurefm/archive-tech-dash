function setCurrentTime(){
    const currentDateTime = new Date()
    setNumericTime(currentDateTime);
    setWrittenTime(currentDateTime);
    setDate(currentDateTime);
    tickClock(currentDateTime);
    checkReload(currentDateTime);
}

function setNumericTime(currentDateTime){
    const timeNowOptions = {
        hour: "numeric",
        minute: "numeric",
        second: "numeric",
    };
    let timeToDisplay = currentDateTime.toLocaleString('en-GB', timeNowOptions);
    document.getElementById("numeric-time").innerHTML = timeToDisplay;
}

function setDate(currentDateTime){
    const dateOptions = {
        weekday: "long",
        day: "numeric",
        month: "long",
        year: "numeric",
    };
    let dateToDisplay = currentDateTime.toLocaleString('en-GB', dateOptions);
    document.getElementById("date").innerHTML = dateToDisplay;
}

function setWrittenTime(currentDateTime){
    let mins = currentDateTime.getMinutes();
    let hours = currentDateTime.getHours();
    document.getElementById("words-time").innerHTML = getWrittenTime(hours, mins);
}

const getWrittenTime = (h, m) => {
    h = h % 12;
    let count = ["zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen", "twenty", "twenty one", "twenty two", "twenty three", "twenty four", "twenty five", "twenty six", "twenty seven", "twenty eight", "twenty nine", "thirty"]
    if (m === 1) {
        return count[m] + " minute past " + count[h];
    } else if (m === 59) {
        return count[60 - m] + " minute to " + count[h + 1];
    } else if (m === 0 ) {
        return count[h] + " o'clock"; 
    } else if (m === 15) {
        return "Quarter past " + count[h];
    } else if (m === 30) {
        return "half past " + count[h];
    } else if (m === 45) {
        return "Quarter to " + count[h];
    } else if (m < 30) {
        return count[m] + " minutes past " + count[h];
    } else if (m > 30) {
        return count[60 - m] + " minutes to " + count[h + 1];
    }
};

function tickClock(now) {
    let secondHand = document.getElementById('second-hand');
    let minsHand = document.getElementById('min-hand');
    let hourHand = document.getElementById('hour-hand');

    const seconds = now.getSeconds();
    const secondsDegrees = ((seconds / 60) * 360) + 90;
    secondHand.style.transform = "rotate(" + secondsDegrees + "deg)";

    const mins = now.getMinutes();
    const minsDegrees = ((mins / 60) * 360) + ((seconds/60)*6) + 90;
    minsHand.style.transform = "rotate(" + minsDegrees + "deg)";

    const hour = now.getHours();
    const hourDegrees = ((hour / 12) * 360) + ((mins/60)*30) + 90;
    hourHand.style.transform = "rotate(" + hourDegrees + "deg)";
}

function checkReload(currentDateTime){
    if (currentDateTime.getSeconds() == 24){
        window.location.reload();
    }
}

setInterval(setCurrentTime, 1000);
setCurrentTime()