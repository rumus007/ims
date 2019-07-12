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
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        })
       .done(function(data) { 
          $( "#success-indicator" ).fadeIn(100).delay(1000).fadeOut();
       })
       .fail(function() { console.log('error'); })
     }
   }); 
});

$(document).ready(function(){
//   $('.delete_toggle').each(function(index,elem) {
//     $(elem).click(function(e){
//       e.preventDefault();
//       $('#postvalue').attr('value',$(elem).attr('rel'));
//       $('#deleteModal').modal('toggle');
//     });
// });

  $('.delete_toggle').on('click', function(){
    var id = $(this).attr('rel');
    var confirmation =confirm("Are you sure?")
    if(confirmation){
        $.ajax({
          type: 'POST',
          url: base_url + '/admin/menus/delete',
          data: {id: id},
          headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        })
        .done(function(data){
          var redirect = base_url + '/admin/menus';
          console.log(data);
          if(data.success){
            toastr.success("Category successfully deleted");
            window.location.href = redirect;
          }else{
            toastr.error("Error in deleting category");
            window.location.href = redirect;
            
          }
          
        })
        .fail(function(){
          toastr.error("Error in deleting category");
        });
    }
    
  });
});