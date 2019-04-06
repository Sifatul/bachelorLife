<!-- Modal -->
<div class="modal fade" id="addExpenseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Expense</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <form  method="post" action="{{'signin'}}">
                           
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Expense Category</label>
                              <select class="form-control" id="exampleFormControlSelect1">
                                    @foreach ($all_cat_slug as $cat)
                                    <option>{{  $cat->cat_name }}</option>
                                @endforeach
                                {{-- <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option> --}}
                              </select>
                            </div>
                            <div class="form-group">
                                    <label for="exampleFormControlInput1">Amount</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="100 ">
                                  </div>
                          </form>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>