{{--
  Template Name: Full Page
--}}

@php
get_header();
@endphp

<div id="fullpage">
  <div class="section">Some section</div>
  <div class="section">Some section</div>
  <div class="section">Some section</div>
  <div class="section">Some section</div>
</div>

<script>
(function($) {
$(document).ready(function() {
  // $('#fullpage').fullpage({
    // license
    // licenseKey: '0B15C1CC-608E4F8B-89497DD9-4BE31E57',
    // scrollHorizontally: true
  // });

  //methods
  // $.fn.fullpage.setAllowScrolling(false);

new fullpage('#fullpage', {
  licenseKey: '0B15C1CC-608E4F8B-89497DD9-4BE31E57',
  // options here
  autoScrolling:true,
  anchors:['firstPage', 'secondPage', 'thirdPage']
});

});

})(jQuery);
</script>

@php
get_footer();
@endphp
