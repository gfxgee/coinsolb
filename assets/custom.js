$(document).ready(function() {
    $('#score-table').DataTable({
    	"pageLength" : 25,
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
});