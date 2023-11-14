$('.User-avtar1').click(function(){
    if( $(".User-Dropdown1").hasClass( "U-open" ) ){
            $('.User-Dropdown1').removeClass("U-open");
    }
    else {
            $('.User-Dropdown1').addClass("U-open");
    }
});

$('.User-avtar2').click(function(){
        if( $(".User-Dropdown2").hasClass( "U-open" ) ){
                $('.User-Dropdown2').removeClass("U-open");
        }
        else {
                $('.User-Dropdown2').addClass("U-open");
        }
});