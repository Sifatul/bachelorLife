<!-- Modal -->
<div class="modal fade" id="addExpenseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <form method="post" action={{url('/new_bill')}}>
        {{ csrf_field() }}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Expense</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="py-1" for="exampleFormControlSelect1">Expense Category</label>
                        
                        <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                            @foreach ($all_cat_slug as $cat) 
                                <option value="{{ $cat->cat_id }}">{{ $cat->cat_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="py-1" for="exampleFormControlInput1">Amount</label>
                        <input type="number" name="amount" required="true" class="form-control" id="exampleFormControlInput1" placeholder="100 ">
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