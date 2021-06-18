
export const Hero = {
  onLoad: function() {
    if ($('body.single-post').length) {
      this.initFullPage();
    }
  },
  initFullPage: function() {
    const options = {
      /* eslint no-undef: */
      licenseKey: theme.fullPage.key,
      // options here
      autoScrolling: true,
      // anchors:[
      //   'hero', 'content',
      // ],
      scrollingSpeed: 1000,
      scrollOverflow: true,
    };
    new fullpage('#page-content-wrap', options);
    // console.log(options);
  },
};
