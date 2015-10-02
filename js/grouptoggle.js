(function($) {
  $(function() {
    $(".group-toggle .group-toggle-title button").click(function(){
      $(this).parent("div").next("div").slideToggle();
    });
  });
})(jQuery);
