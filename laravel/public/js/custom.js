$(function () {
    $('.pager .disabled a, .pager .active a').on('click', function(e) {
        e.stopPropagation();
        e.preventDefault();
    });
});