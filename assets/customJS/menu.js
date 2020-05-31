jQuery(document).ready(function () {
    console.log('aici');
    var url = window.location.pathname,
        urlRegExp = new RegExp(url.replace(/\/$/,'') + "$");
    jQuery('.navbar-nav li a').each(function(){
        if(urlRegExp.test(this.href.replace(/\/$/,''))){
            jQuery(this).addClass('active');
        }
    });
});
