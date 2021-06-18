import { Countdown } from '../utils/Countdown';

export const Splash = {
  onLoad: function() {
    if ($('.template-splash').length) {
      Countdown.init('April 28, 2020 00:00:00');
    }
  },
};
