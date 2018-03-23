<!-- Note: seperate modals in a seperate file. -->
<div class="modal fade" tabindex="-1" role="dialog" id="new-staff-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 id="titleModal" class="modal-title" style="text-align: center">New Staff</h4>
            </div>
            <form action="/API/maintenance/addNewStaff" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Staff First Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inputStaffFName" id="inputStaffFName" placeholder="Enter First Name...">
                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Staff Middle Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inputStaffMname" id="inputStaffMname" placeholder="Enter Middle Name...">
                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Staff Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inputStaffLName" id="inputStaffLName" placeholder="Enter Last Name...">
                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Staff Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inputStaffDesc" id="inputStaffDesc" placeholder="Enter Description...">
                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Staff Gender</label>
                            <div class="col-sm-9">
								<select name="inputStaffGender" id="inputStaffGender" class="form-control">
		                           <option value="Male">Male</option>
   		                           <option value="Female">Female</option>
								</select>
							</div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Staff Birth Date</label>
                            <div class="col-sm-9 date">
                                <input type="text" class="form-control" name="inputStaffBDate" id="inputStaffBDate" placeholder="Enter Birth Date...">
                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Staff Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="inputStaffImage" id="inputStaffImage">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn">
                        <i class="fa fa-check"></i> Submit
                    </button>
                    <button class="btn" data-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="delete-staff-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 id="titleModal" class="modal-title" style="text-align: center">Delete Staff</h4>
            </div>
            <form action="/API/maintenance/deleteStaff" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="box-body">
                        <input hidden type="text" name="inputStaffID" id="inputStaffID">
                        <h4>Are you sure you want to delete this staff?</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn">
                        <i class="fa fa-check"></i> Submit
                    </button>
                    <button class="btn" data-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="edit-staff-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 id="titleModal" class="modal-title" style="text-align: center">Edit Staff</h4>
            </div>
            <form action="/API/maintenance/editStaff" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="box-body">

                        <input hidden type="text" name="inputStaffIDEdit" id="inputStaffIDEdit">

                        <div class="form-group">
                            <label class="col-md-3 control-label">Staff First Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inputStaffFNameEdit" id="inputStaffFNameEdit" placeholder="Enter First Name...">
                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Staff Middle Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inputStaffMnameEdit" id="inputStaffMnameEdit" placeholder="Enter Middle Name...">
                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Staff Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inputStaffLNameEdit" id="inputStaffLNameEdit" placeholder="Enter Last Name...">
                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Staff Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inputStaffDescEdit" id="inputStaffDescEdit" placeholder="Enter Description...">
                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Staff Gender</label>
                            <div class="col-sm-9">
								<select name="inputStaffGenderEdit" id="inputStaffGenderEdit" class="form-control">
		                           <option value="Male">Male</option>
   		                           <option value="Female">Female</option>
								</select>
							</div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Staff Birth Date</label>
                            <div class="col-sm-9 date">
                                <input type="text" class="form-control" name="inputStaffBDateEdit" id="inputStaffBDateEdit" placeholder="Enter Birth Date...">
                            </div>
                        </div><br><br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn">
                        <i class="fa fa-check"></i> Submit
                    </button>
                    <button class="btn" data-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
