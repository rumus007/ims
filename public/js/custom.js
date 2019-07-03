$(document).ready(function () {
    $('#datatable').DataTable();
});

$(document).ready(function () {
    $('.sumoSelect').SumoSelect();
});

$(document).ready(function () {
	 $('.dd').nestable({ 
    dropCallback: function(details) {
       
       var order = new Array();
       $("li[data-id='"+details.destId +"']").find('ol:first').children().each(function(index,elem) {
         order[index] = $(elem).attr('data-id');
       });

       if (order.length === 0){
        var rootOrder = new Array();
        $("#nestable > ol > li").each(function(index,elem) {
          rootOrder[index] = $(elem).attr('data-id');
        });
       }
       $.ajax({
            type: "POST",
            url: base_url+'/admin/menus/order',
            data: { source : details.sourceId, 
                    destination: details.destId, 
                    order:JSON.stringify(order),
                    rootOrder:JSON.stringify(rootOrder) 
                },
            dataType: 'json',
        })
       .done(function(data) { 
          $( "#success-indicator" ).fadeIn(100).delay(1000).fadeOut();
       })
       .fail(function() { console.log('error'); })
     }
   }); 
})