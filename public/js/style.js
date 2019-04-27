$( ".nav-link" ).click(function() {
    console.log( "Handler for .click() called." );
});



// edit expense modal
$(document).on('shown.bs.modal','.modal', function (event) {
    // $('#exampleModal').on('show.bs.modal', function (event) {    
  var button = $(event.relatedTarget) // Button that triggered the modal
  var cat_id_old = button.data('expense-cat_id') // cat of the of data
  var edit_amount = button.data('expense-amount')   // amount of the of data
  var expense_id = button.data('expense-id')   // id of the of data in db
  var modal = $(this)

//   console.log(cat_id);

  modal.find('.modal-body .edit-expense-id').val(expense_id) 
  modal.find('.modal-body  .edit-expense_amount').val(edit_amount)
})