$(function () {

    $("#nav ul li a[href^='#']").on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $(this.hash).offset().top
        }, 300);
    });

    setTimeout(function() {
        $('#content').removeClass('crouch');
    }, 300);

    setTimeout(function() {
        $('#nav').removeClass('crouch');
    }, 500);

    $(window).scroll(function() {
        $('body').css('background-position', '0 '+ -($(window).scrollTop() / 5) + 'px' );
    });

    $('div.nokut').on('click', function(e) {
        e.preventDefault();
        $(this).hasClass('small') ? $(this).removeClass('small').addClass('large') : $(this).removeClass('large').addClass('small') ;
    });
});