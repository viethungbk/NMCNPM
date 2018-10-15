$( ".search-top" ).click(function() {
	$( ".f-search" ).slideToggle( "slow", function() {
	});
});
$( ".menu-mobile .fa-bars" ).click(function() {
	$( ".list-mobile-main" ).slideToggle( "slow", function() {
	});
});
$( ".danhmucmobile .fa-bars" ).click(function() {
	$( ".list-menu-mobile-archive" ).slideToggle( "slow", function() {
	});
});
$(document).ready(function() {
	$(".list-menu-mobile ul li").hover(function(){
		$(this).find("ul:first").slideDown(500);
		},function(){
		$(this).find("ul:first").hide(300);

	});
});
$( ".tiemkiem-mobile .fa-search" ).click(function() {
	$( ".form-mobile" ).slideToggle( "slow", function() {
	});
});
jQuery(document).ready(function () {
		if (jQuery(window).width() >= 800){
	    jQuery('.slider .item ').height(jQuery(window).height() - jQuery('header').height());}
});
wow = new WOW(
  {
  boxClass:     'wow',      // default
  animateClass: 'animated', // default
  offset:       0,          // default
  mobile:       true,       // default
  live:         true        // default
}
)
wow.init();
$(document) .ready(function(){
	var owl=$('#slider-top .owl-carousel');
	owl.owlCarousel({
		loop:true,
        autoplay:true,
		margin:10,
		responsive:{
			0:{
            items:1,  
        	},
	        481:{
	            items:1,
	             },
	        992:{
	            items:1,  
	        },
	         1200:{
	            items:1, 
	        }
		}
	});
	$('.customNextBtn').click(function(){
		owl.trigger('next.owl.carousel')
	})
	$('.customPrevBtn').click(function(){
		owl.trigger('prev.owl.carousel')
	})
});
$(window).scroll(function(){
    if ($(window).scrollTop()>0){
        $("#back_top").show(300);
    }
    else{
        $("#back_top").hide(300);
    }
});
$('#back_top').click(function(){
    $('html, body').animate({scrollTop:0},500);
});
 jQuery(".menu-main li.menu-item-has-children > a").click(function() 
                {
        var li = $(this).parent();
        if (li.hasClass("selected")) {
            li.removeClass('selected');

        } 
        else {
            var licha = li.parent().parent();
            if(licha.hasClass("selected")){
                li.addClass("selected");

            }else{
                // Xóa class selected khỏi các thẻ li khác
                $('.menu-main li.menu-item-has-children').removeClass('selected');
                // Thêm class selected vào thẻ li hiện tại
                li.addClass("selected");
            }
        }
 
        // return false nghĩa là cho trang đứng im
        return false; 
 
    });