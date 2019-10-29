  window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
      document.getElementById("main-nav").style.padding = "10px 10px";
      document.getElementById("navbar-logo").style.width = "100px";
      document.getElementById("main-nav").style.backgroundColor = "#061a28f2";
    } else {
      document.getElementById("main-nav").style.padding = "20px 10px";
      document.getElementById("main-nav").style.backgroundColor = "#061A28";
      document.getElementById("navbar-logo").style.width = "200px";
    }
  }

$(document).ready(function() {


    $('#promomodal').modal('show');

    $('#select-payment').change(function(){

        $('.account').fadeOut('slow');
        
        setTimeout( function() {

            $('#account-details-'+$('#select-payment').val()).fadeIn('slow');

        } , 400);

    });

    let scroll_link = $('.scroll');

    //smooth scrolling -----------------------
    scroll_link.click(function(e){
        e.preventDefault();

        let url = $('body').find($(this).attr('href')).offset().top-50;

        $('html, body').animate({
            scrollTop : url
        },700);

        $(this).parent().addClass('active');
        $(this).parent().siblings().removeClass('active');

        return false; 
    });

    $('.copy-link').tooltip({title: 'Copy Link', trigger : 'hover'});
        
    $('.copy-link').click(function(){

        $('.copy-link').tooltip('dispose').tooltip({title: 'Copied'}).tooltip('show');

        setTimeout ( function () {
            $('.copy-link').tooltip('dispose').tooltip({title: 'Copy Link'}).tooltip('hide');
        }, 1000);
    });


    if($("#wrapfabtest").height() > 0) {
        $('.ad-block-detect').hide();
        
    } else {
        $('.ad-block-detect').show();
        
    }

          
});
          

function copyToClipboard(element) {
    
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
}