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
    $('#score-table').DataTable({
    	"pageLength" : 25,
        "order" : [],
        "ajax": {
            url : "coin_solve/get_user_points_history",
            type : 'GET'
        },
        columns: [
            { title: "Date" },
            { title: "Score" },
            { title: "Earned From" }
        ]
    });

    $('#referrals-table').DataTable({
        "pageLength" : 25,
        "order" : [],
        "ajax": {
            url : "coin_solve/get_user_referrals_history",
            type : 'GET'
        },
        columns: [
            { title: "Name" },
            { title: "Email" },
            { title: "Status" }
        ]
    });

    $('#withdrawals-table').DataTable({
        "pageLength" : 25,
        "order" : [],
        "ajax": {
            url : "coin_solve/get_user_withdrawals_history",
            type : 'GET'
        },
        columns: [
            { title: "Date" },
            { title: "Type of Withdrawal"},
            { title: "Amount" },
            { title: "Status" }
        ]
    });

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
});
/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://coinsolb.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
                            