jQuery(document).ready(function ($) {
  //Polyfill Object Fit su I.E. --> font-family: 'object-fit: cover;';
  if (typeof objectFitImages == "function") {
    objectFitImages();
  }

  jQuery(".j-toggle").click(function () {
    jQuery("body").toggleClass("j-menu-open");
  });

  //STICKY HEADER
  if (jQuery(document).scrollTop() > 60) {
    jQuery(".c-site-header").addClass("j-sticky");
  }
  jQuery(document).scroll(function () {
    if (jQuery(document).scrollTop() > 60) {
      jQuery(".c-site-header").addClass("j-sticky");
    } else {
      jQuery(".c-site-header").removeClass("j-sticky");
    }
  });

  //SMOOTH SCROLL
  jQuery("a").on("click", function (event) {
    if (this.hash !== "") {
      var hash = this.hash;
      var url = jQuery(this).attr("href");
      url = url.split("#");

      if (url[0] == "" || url[0] == window.location.href) {
        event.preventDefault();
        $("html, body").animate(
          {
            scrollTop: $(hash).offset().top,
          },
          800,
          function () {
            window.location.hash = hash;
          }
        );
      }
    }
  });

  //SCRIPT PER CF7
  jQuery(".wpcf7-submit").addClass("c-button");

  jQuery(".wpcf7-select").each(function () {
    jQuery(this).wrap('<span class="c-select-container">');
    jQuery(this).addClass("c-select");
  });

  jQuery(".wpcf7-acceptance").each(function () {
    jQuery(this)
      .find(".wpcf7-list-item")
      .addClass("c-form__field c-form__field--checkbox");
    jQuery(this)
      .find(".wpcf7-list-item > label")
      .replaceWith(jQuery(this).find(".wpcf7-list-item > label").html());
    jQuery(this)
      .find(".wpcf7-list-item .wpcf7-list-item-label")
      .replaceWith(
        '<label for="' +
          jQuery(this)
            .find(".wpcf7-list-item input[type=checkbox]")
            .attr("name") +
          '">' +
          jQuery(this).find(".wpcf7-list-item .wpcf7-list-item-label").html() +
          "</label>"
      );
    jQuery(this).find(".wpcf7-list-item").append("<span></span>");
    jQuery(this)
      .find(".wpcf7-list-item input[type=checkbox]")
      .attr(
        "id",
        jQuery(this).find(".wpcf7-list-item input[type=checkbox]").attr("name")
      );
    jQuery(this)
      .find(".wpcf7-list-item label")
      .appendTo(jQuery(this).find(".c-form__field--checkbox"));
  });

  //RIMOZIONE P INUTILI
  jQuery("p").each(function () {
    var thisEl = jQuery(this);
    if (thisEl.html().replace(/\s|&nbsp;/g, "").length == 0) thisEl.remove();
  });
});
