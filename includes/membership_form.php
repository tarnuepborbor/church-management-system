




<!-- add member form model -->
<div class="modal fade" id="membership_model">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header text-center bg-primary">
        <h4 class="modal-title text-white">Membership Registration Form</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="POST" action="includes/save_member.php" enctype="multipart/form-data">
          <div class="row">
            <div class="card-body m-2">
              <div class="row">
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-header text-center">
                      <h3 class="">Member's Photo</h3>
                    </div>
                    <div class="card-body">
                      <center>
                        <img src="imgs/1.jpg" class="rounded-circle img-fluid w-100 img-thumbnail" style="max-width:200px" id="imgOutput">
                      </center>
                      <input type="file" name="mImage" class="form-control form-control-lg m-2" required onchange="document.getElementById('imgOutput').src = window.URL.createObjectURL(this.files[0])">
                      <p class="lead text-danger"><small>The image of the ember should be square of this dimemsion 240 X 280 px</small> </p>
                    </div>
                    <div class="card-footer">
                      <input type="button" class="btn btn-outline-primary btn-block" value="Help on pic resize" style="border-radius: 25px">
                    </div>
                  </div>
                </div>

                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-12 p-2 mt-2 ">
                      <p class="lead">First Name</p>
                      <input type="text" name="fName" class="form-control form-control-lg"required>
                    </div>
                    <div class="col-md-12 p-2 mt-2  ">
                     <p class="lead">Middle Name</p>
                     <input type="text" name="mName" class="form-control form-control-lg"  >
                   </div>
                   <div class="col-md-12 p-2 mt-2 ">
                    <p class="lead">Last Name</p>
                    <input type="text" name="lName" class="form-control form-control-lg" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6  p-2 mt-2 ">
                   <p class="lead">Sex</p>
                   <select name="sex" required="" class="form-control form-control-lg" required>
                    <option value="">.. choose</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                  </select>
                </div>
                <div class="col-md-6 p-2 mt-2 ">
                 <p class="lead">Date of birth</p>
                 <input type="date" name="dob" required class="form-control-lg form-control" required>
               </div>
             </div>
             <div class="row">
              <div class="col-md-6  p-2 mt-2 ">
                <p class="lead">Occupation</p>
                <input type="text" name="occupation" class="form-control-lg form-control" required>
              </div>
              <div class="col-md-6 p-2 mt-2">
                <p class="lead">Entity</p>
                <input type="text" name="entity" class="form-control-lg form-control">
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="card-body " style="margin-top: -20px">
      <div class="row">
        <div class="col-md-12">
          <input type="text" name="nationality" class="form-control form-control-lg" placeholder="nationality">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6  p-2 mt-2 ">
          <p class="lead">Country of origin </p>
          <input type="text" name="country" class="form-control-lg form-control" required>
        </div>
        <div class="col-md-6 p-2 mt-2 ">
          <p class="lead">County</p>
          <input type="text" name="county" class="form-control-lg form-control">
        </div>
      </div>

      <div class="row">
        <div class="col-md-6  p-2 mt-2 ">
          <p class="lead">Provence  </p>
          <input type="text" name="provence" class="form-control-lg form-control">
        </div>
        <div class="col-md-6 p-2 mt-2 ">
          <p class="lead">Hometown/City</p>
          <input type="text" name="region_county" class="form-control-lg form-control" required>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4  p-2 mt-2 ">
          <p class="lead">Email Address  </p>
          <input type="email" name="email" class="form-control-lg form-control">
        </div>
        <div class="col-md-4 p-2 mt-2 ">
          <p class="lead">Current Address</p>
          <input type="text" name="address" class="form-control-lg form-control" required>
        </div>

        <div class="col-md-4 p-2 mt-2 ">
          <p class="lead">Marital Status</p>
          <select name="mariTlStatus" class="form-control form-control-lg" required>
            <option value="">choose...</option>
            <option value="married">Married</option>
            <option value="single">Single</option>
            <option value="divorce">Divorced</option>
            <option value="engage">Engaged</option>
            <option value="window">Widow</option>
            <option value="widower">widower</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 p-2 mt-2">
          <p class="lead">Baptistmisal Status</p>
          <select required name="btsmStatus" class="form-control form-control-lg"  required>
            <option value="">choose...</option>
            <option value="baptised">Baptised</option>
            <option value="unbaptised">Unbaptised</option>
          </select>
        </div>
        <div class="col-md-4 p-2 mt-2">
          <p class="lead">Former Religion</p>
          <select name="formerRelig" class="form-control form-control-lg" required>
            <option value="">choose...</option>
            <option value="christainity">Christainity</option>
            <option value="Muslim">Muslim</option>
            <option value="pagan">Pagan</option>
            <option value="traditional">Traditional</option>
            <option value="undicided">Undecided</option>
          </select>
        </div>    
        <div class="col-md-4 p-2 mt-2 ">
          <p class="lead">Previous Church</p>
          <input type="text" name="previous_church" class="form-control form-control-lg" required>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 p-2 mt-2">
          <p class="lead">Contact</p>
          <input type="number" name="contact" class="form-control form-control-lg" required>
        </div>
        <div class="col-md-4 p-2 mt-2">
          <p class="lead">Department</p>
          <select required name="department" class="form-control form-control-lg" required>
            <option value="">choose...</option>
            <option value="men">Men Department</option>
            <option value="women">Women Department</option>
            <option value="youth">Youth Department</option>
            <option value="media">Media Department</option>
            <option value="usher">Usher Department</option>
            <option value="praise">Praise Team</option>
            <option value="clergy">Clergy Department</option>
            <option value="affiliating">Affiliating</option>
            <option value="children">Children Department</option>
            <option value="not_decided">Ordernary/Undecided</option>
          </select>
        </div>    
        <div class="col-md-4 p-2 mt-2 ">
          <p class="lead">Physical Status</p>
          <select name="physical_status" class="form-control form-control-lg" required>
            <option value="">choose...</option>
            <option value="physically_fit">Physically fit</option>
            <option value="blind">Blind</option>
            <option value="cripple">Cripplee</option>
            <option value="ill">Ill</option>
            <option value="spiritual">Spiritual Problem</option>
          </select>
        </div>
      </div>
      <div class="row bg-light p-2 border m-2">
        <div class="col-6">
          <p>User ID</p>
        </div>
        <div class="col-md-6">
          <center>
          <input type="text" name="member_id" id="show_id" placeholder="Member Id" class="form-control" disabled>
        </center>
        </div>
      </div>
      <button class="btn btn-primary" name="save_member">Save Member Info In Database</button>
    </div>
    
  </form>
</div>

<!-- Modal footer -->
<div class="modal-footer">
  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>

</div>
</div>
</div>



