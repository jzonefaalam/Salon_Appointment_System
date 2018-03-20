<!-- Note: seperate modals in a seperate file. -->
<div class="modal fade" tabindex="-1" role="dialog" id="new-package-modal" style="width: 100%;">
    <div class="modal-dialog" style="width: 50%;">
        <div class="modal-content">
            <div class="modal-header">
              <h4 id="titleModal" class="modal-title" style="text-align: center">New Package</h4>
            </div>
            <!-- <form action="/API/maintenance/addNewPackage" method="POST"> -->
                {{ csrf_field() }}
                <div class="modal-body" style="width: 100%;">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Package Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inputPackageName" id="inputPackageName" placeholder="Enter Package Name...">
                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Package Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inputPackageDesc" id="inputPackageDesc" placeholder="Enter Package Description...">
                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Package Price</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inputPackagePrice" id="inputPackagePrice" placeholder="Enter Package Price...">
                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Package Inclusion</label>
                            <div class="col-sm-9">
								<select name="inputPackageInclusion" style="width: 100%;" data-placeholder="Select Inclusions" id="inputPackageInclusion" class="form-control select2" multiple="multiple">
		                            @foreach($service as $serviceData)
                                        <option value="{{ $serviceData->service_id }}">{{ $serviceData->service_name }}</option>
                                    @endforeach
								</select>
							</div>
                        </div><br><br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="submitNewPackage();" class="btn">
                        <i class="fa fa-check"></i> Submit
                    </button>
                    <button class="btn" data-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </button>
                </div>
            <!-- </form> -->
        </div>
    </div>
</div>

<!-- <div class="modal fade" tabindex="-1" role="dialog" id="delete-staff-modal">
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
</div> -->
