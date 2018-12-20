console.log('it works');

function post(){
	var date_from = $('#date_from').val();
                var date_to = $('#date_to').val();

	console.log(date_to);
	console.log('post');
	$.ajax({
        type: "POST",
        url: "/invoices/ajax",
        data: {
           from_date: date_from,
           to_date: date_to,
        },
        dataType: "json",
        async: true,
        success: function(response) {
            console.log(response);
        },
	    error: function (XMLHttpRequest, textStatus, errorThrown) {
	        console.log('Error3 : ' + errorThrown);
	    }
    });
}   