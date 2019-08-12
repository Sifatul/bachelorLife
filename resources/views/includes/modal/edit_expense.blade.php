<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action={{url('/update_bill')}}>
      {{ csrf_field() }}
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Expense</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                      <label for="exampleFormControlSelect1">Expense Category</label>
                      <select name="category_id" class="form-control" id="edit_expense_select_cat">
                          @foreach ($all_cat_slug as $cat)
                            <option value="{{$cat->cat_id}}" >{{  $cat->cat_name }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="exampleFormControlInput1">Amount</label>
                      <input type="number" name="amount" required="true" class="form-control edit-expense_amount"  placeholder="100 ">
                      <input type="hidden"  name="expense_id"   class="edit-expense-id">
                  </div> 
                           

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
          </div>
      </div>
  </form>
</div>