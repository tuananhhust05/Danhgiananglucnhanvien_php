$(document).on('click', 'ul li.li-sb', function() {
    $(this).addClass('active-sb').siblings().removeClass('active-sb')
})