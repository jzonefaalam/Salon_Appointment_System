<!-- Note: seperate modals in a seperate file. -->
<div class="modal fade" tabindex="-1" role="dialog" id="new-staff-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 id="titleModal" class="modal-title" style="text-align: center">New Staff</h4>
            </div>
            <form action="/API/maintenance/addNewService" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Service Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inputServiceName" placeholder="Enter Service Name...">
                            </div>
                        </div><br><br>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Service Type</label>
                            <div class="col-sm-9">
								<select name="inputServiceType" class="form-control">
                                    @foreach($serviceType as $dataDropdown)
			                           <option value="{{ $dataDropdown->servicetype_id }}">{{ $dataDropdown->servicetype_name }}</option>
                                    @endforeach
								</select>
							</div>
                        </div><br><br>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Service Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inputServiceDesc" placeholder="Enter Service Description...">
                            </div>
                        </div><br><br>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Service Fee</label>
                            <div class="col-sm-9">
                                <input type="number" min="0" class="form-control" name="inputServiceFee" placeholder="Enter Service Fee...">
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

<div class="modal fade" tabindex="-1" role="dialog" id="delete-service-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 id="titleModal" class="modal-title" style="text-align: center">Delete Service</h4>
            </div>
            <form action="/API/maintenance/deleteService" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="box-body">
                        <input hidden type="text" name="inputServiceID" id="inputServiceID">
                        <h4>Are you sure you want to delete this service?</h4>
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

<div class="modal fade" tabindex="-1" role="dialog" id="delete-service-type-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 id="titleModal" class="modal-title" style="text-align: center">Delete Service Type</h4>
            </div>
            <form action="/API/maintenance/deleteServiceType" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="box-body">
                        <input hidden type="text" name="inputServiceTypeID" id="inputServiceTypeID">
                        <h4>Are you sure you want to delete this service?</h4>
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

<div class="modal fade" tabindex="-1" role="dialog" id="edit-service-type-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 id="titleModal" class="modal-title" style="text-align: center">Edit Service Type</h4>
            </div>
            <form action="/API/maintenance/editServiceType" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <input style="display:none;" type="text" class="form-control" id="inputServiceTypeIDEdit" name="inputServiceTypeIDEdit">
                            <label class="col-md-3 control-label">Service Type Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputServiceTypeNameEdit" name="inputServiceTypeNameEdit">
                            </div>
                        </div><br>
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
