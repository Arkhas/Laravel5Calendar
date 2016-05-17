$(function() {
	$(document).on("click", '.calendarButton', function (e){ 
     e.preventDefault(); 
     $.ajax({
        url: $(this).attr('href')
        ,success: function(response) {
           $( ".calendar" ).replaceWith( response );
        }
     })
     return false; //for good measure
	});
}); 