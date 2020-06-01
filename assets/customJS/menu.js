jQuery(document).ready(function () {

    var url = window.location.pathname.substring(window.location.pathname.lastIndexOf('/') + 1);
    jQuery('.navbar-nav li').each(function(){
        if(jQuery(this).attr('id') === 'home' && url.length === 0) {
            //jQuery('.navbar-nav ' + '#home').addClass('active');
            //jQuery(this).addClass('active');
        } else {
            jQuery('.navbar-nav').find('li').removeClass('active');
            jQuery('.navbar-nav ' + '#' + url).addClass('active');
        }
    });
});
