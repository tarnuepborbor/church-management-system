
<!-- Generate financial report form -->
<div class="modal fade" id="financial_report_form" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center text-white" id="staticBackdropLabel">Generate financial Report</h5>
        <button type="button" class="close my-btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-light">
       <form action="report.php" method="POST">

        <div class="row">
          <div class="col-12">
            <p class=" lead">What kind of financial report do you want</p>
            <select class="form-control" name="report_type" required >
              <option value="">choose...</option>
              <option value="*">All</option>
              <option value="tithe">Tithe</option>
              <option value="offering">Offerings</option>
              <option value="appreciation">Appreciation</option>
              <option value="seed">Seed</option>
            </select>
          </div>
          <div class="col-12">
            <p>From</p>
            <input type="date" name="start_date" class="form-control mt-2" required>
          </div>
          <div class="col-12">
            <p>To</p>
            <input type="date" name="end_date"  class="form-control mt-2" required>
          </div>
          <button class="btn  btn-block mt-2 btn-outline-secondary rounded-0" name="gen_financial_report">Generate Report
          </button>
          <button type="button" class="btn btn-secondary mt-2" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>