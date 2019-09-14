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
});