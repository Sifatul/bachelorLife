
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

// $(function() {
//   $("#start_date,#end_date").datepicker({
//     format: "mm/dd/yyyy",
//   });
// });

