
// edit expense modal
$(document).on("shown.bs.modal", ".modal", function(event) {
  // $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var cat_id_old = button.data("expense-cat_id"); // cat of the bill
  var edit_amount = button.data("expense-amount"); // amount of the bill
  var expense_id = button.data("expense-id"); // unique id of the bill
  var modal = $(this);

  $("#edit_expense_select_cat option[value=" + cat_id_old + "]").attr(
    "selected",
    "selected"
  ); //option selected
  modal.find(".modal-body .edit-expense-id").val(expense_id);
  modal.find(".modal-body  .edit-expense_amount").val(edit_amount);
});

// Execute something when the modal window is shown.
$('#deleteConfirmationModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var recipient = button.data('link'); // Extract info from data-link attributes from the delete button
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  $("#delete_form").attr("action", recipient); 
  // var modal = $(this);
  // modal.find('.modal-title').text('New message to ' + recipient);
  // modal.find('.modal-body input').val(recipient);
});
 
$(function() {
  $("#start_date,#end_date").datepicker({
    format: "mm/dd/yyyy",
  });
});
$('form').on('submit', function(event) {
  // event.preventDefault();
  $('#header_progress').css('opacity','1');
  // $(this).submit();

  value = 50;
  setTimeout( function(){
  $('#header_progress').css('opacity','1');
  $('#header_progress .progress-bar').css('width',''+(value++)+'%');
  } , 2000 ); 
  $('#header_progress').css('opacity','0');

}); 
 $( ".navbar-toggler" ).click(function() {
  $('.sidebar').toggle();
});
