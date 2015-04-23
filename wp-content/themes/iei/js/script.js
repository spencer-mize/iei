$(document).ready(function(){
	$("body").addClass("loaded");

    var viewport = $(window),
        setVisible = function (e) {
            var viewportTop = viewport.scrollTop(),
                viewportBottom = viewport.scrollTop() + viewport.height();
            $('.svg-container').each(function () {
                var self = $(this),
                    top = self.offset().top,
                    bottom = top + self.height(),
                    topOnScreen = top >= viewportTop && top <= viewportBottom,
                    bottomOnScreen = bottom >= viewportTop && bottom <= viewportBottom,
                    elemVisible = topOnScreen || bottomOnScreen;
                self.toggleClass('visible', elemVisible);
            });
        };
    viewport.scroll(setVisible);
    setVisible();

});