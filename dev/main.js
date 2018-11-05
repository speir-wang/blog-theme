import "./sass/style.scss";

/**
 * Smooth scrolling
 */
$("a[href*='#']").on("click", function(e) {
	e.preventDefault();

	if ($(e.target.hash).offset() !== undefined) {
		let headerHeight = $("header").height();
		$("body,html").animate(
			{
				scrollTop: $(e.target.hash).offset().top
			},
			500
		);
	}
});
/**
 * Mobile header
 */
$(".mobile-navigation").on("touchmove", function(e) {
	e.preventDefault();
});
$(".nav-toggle, .mobile-menu li").on("click", function(e) {
	$(".nav-toggle").toggleClass("is-active");
	$(".mobile-navigation").toggleClass("is-active");
});

(function() {
	$(".js-top").on("click", function(e) {
		$("body,html").animate(
			{
				scrollTop: 0
			},
			500
		);
	});
})();
