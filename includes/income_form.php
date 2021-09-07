<div class="row">
  <div class="col-12 text-center pb-4">
    <h3 class=" text-primary font-width-bold">Log a an income or tranaction for the church</h3>
  </div>
  <div class="col-md-4">
    <div class="col-md-12 mb-4 pt-4 pb-4" >
      <div class="card-body shadow " style="border: 3px blue; border-radius: 20px">
        <center>
          <img src="imgs/logo.jpg" class="img img-fluid img-responsive" style="max-width: 100px">
          <p class="lead">Finance save here is not made for a member but as extra income for the church </p>
        </center>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card shadow-lg">
      <div class="card-body pt-4">
        <form method="POST" action="includes/save_payment.php">
          <div class="row">
             <div class="col-12">
              <p class="mb-0 mt-2">Transaction type</p>
              <select class="form-control mt-0 mb-2" name="payment_for" required>
                <option value="">Choose...</option>
                <option value="Income">Income</option>
                <option value="Expenidture">Expenditure</option>
              </select>
            </div>
            <div class="col-12">
              <p class="mb-0 mt-2">Description of income/expenditure</p>
              <textarea class="form-control pt-4 mt-0 mb-2" name="description" required></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <p class="mb-0 mt-2">Amount To Record</p>
              <input type="number" name="amount" class="mt-0 mb-2 form-control" required>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <p class="mb-0 mt-2">Currency:</p>
              <select class="form-control mt-0 mb-2" name="currency" required>
                <option value="">Choose...</option>
                <option value="USD">USD</option>
                <option value="LRD">LRD</option>
              </select>
            </div>
            <div class="col-12 mt-2 mb-4">
              <p class="mb-0 mt-2">Payment Date</p>
              <input type="date" name="paymentDate" class="form-control mt-0 mb-2" required>
            </div>
            <div class="col-12 mt-2 mb-4">
              <input type="hidden" name="member_id" value="1000001" class="form-control mt-0 mb-2">
            </div>

          </div>
          <button name='save_payment_in_db' class="btn btn-block btn-lg btn-outline-info" style="border-radius: 20px">Save Payment</button>
        </form>
      </div>
    </div>
  </div>
</div>

