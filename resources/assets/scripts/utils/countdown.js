export const Countdown = {
  prependZero: function(time) {
    return (time <= 9) ? '0' + time : time;
  },
  init: function( endDateStr ) {
    const second = 1000,
          minute = second * 60,
          hour = minute * 60,
          day = hour * 24;
    const endDate = new Date( endDateStr ).toLocaleString('en-US', {timeZone: 'America/Los_Angeles'});
    let countDown = new Date(endDate).getTime(),
        x = setInterval(function() {
          const today = new Date().toLocaleString('en-US', {timeZone: 'America/Los_Angeles'});
          let now = new Date(today).getTime();
          let distance = countDown - now;
          const daysLeft = Math.floor(distance / (day));
          document.getElementById('days').innerText = Countdown.prependZero(daysLeft);
          const hoursLeft = Math.floor((distance % (day)) / (hour));
          document.getElementById('hours').innerText = Countdown.prependZero(hoursLeft);
          const minutesLeft = Math.floor((distance % (hour)) / (minute));
          document.getElementById('minutes').innerText = Countdown.prependZero(minutesLeft);
          const secondsLeft = Math.floor((distance % (minute)) / second);
          document.getElementById('seconds').innerText = Countdown.prependZero(secondsLeft);
          // if date is reached
          if (distance < 0) {
              $('#countdown').slideUp();
            clearInterval(x);
          }
    }, second);
    setTimeout(function() {
      $('#countdown').slideDown();
    }, 750)
  },
};
