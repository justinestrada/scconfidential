export const RightSidebar = {
  open: false,
  onLoad: function() {
    this.onClick();
    this.onClickOutsideMenu();
    this.setPaddingRight();
    $(window).on('resize', function() {
      RightSidebar.setPaddingRight();
    });
  },
  onClick: function() {
    $('#toggle-menu, .btn-close-menu').on('click', function(e) {
      e.preventDefault();
      if (RightSidebar.open)
        RightSidebar.closeSidebar()
      else
        RightSidebar.openSidebar()
    });
  },
  onClickOutsideMenu: function() {
    $(document).mouseup(function(e) {
      var container = $('#right-sidebar');
      if (RightSidebar.open) {
        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0) {
          RightSidebar.closeSidebar()
        }
      }
    });
  },
  openSidebar: function() {
    setTimeout(() => {this.open = true}, 1)

    $('#body-wrap').addClass('toggled');
    $('.xoo-wsc-modal').addClass('right-sidebar-active');
  },
  closeSidebar: function() {
    setTimeout(() => {this.open = false}, 1)

    $('#body-wrap').removeClass('toggled');
    $('.xoo-wsc-modal').removeClass('right-sidebar-active');
  },
  setPaddingRight: function() {
    const $right_sidebar_header = $('#right-sidebar .right-sidebar-header');
    const window_width = $(window).width();
    if (window_width >= 576) {
      const container = $('#header .container').first().width();
      const padding_right = (window_width - container) / 2;
      $right_sidebar_header.css('padding-right', padding_right);
    } else {
      $right_sidebar_header.css('padding-right', 'initial');
    }
  },
};
