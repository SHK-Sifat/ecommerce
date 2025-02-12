setTimeout(function() {
    $('.alert_success').slideUp(1000);
 },5000);

setTimeout(function() {
    $('.alert_error').slideUp(1000);
 },10000);

 //Modal code start
 $(document).ready(function(){
 	$(document).on("click", "#delete", function () {
 		 var deleteID = $(this).data('id');
 		 $(".modal_card #modal_id").val( deleteID );
 	});
 });

 $(document).ready(function(){
   $(document).on("click", "#restore", function () {
      var restoreID = $(this).data('id');
      $(".modal_card #modal_id").val( restoreID );
   });
 });
