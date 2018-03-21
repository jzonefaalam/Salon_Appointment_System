<!-- Note: seperate modals in a seperate file. -->
<div class="modal fade" tabindex="-1" role="dialog" id="new-package-modal" style="width: 100%;">
    <div class="modal-dialog" style="width: 50%;">
        <div class="modal-content">
            <div class="modal-header">
              <h4 id="titleModal" class="modal-title" style="text-align: center">New Package</h4>
            </div>
            <form action="/API/maintenance/addNewPackage" method="POST">
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
								<select name="inputPackageInclusion[]" required style="width: 100%;" data-placeholder="Select Inclusions" id="inputPackageInclusion" class="form-control select2" multiple="multiple">
		                            @foreach($service as $serviceData)
                                        <option value="{{ $serviceData->service_id }}">{{ $serviceData->service_name }}</option>
                                    @endforeach
								</select>
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

<div class="modal fade" tabindex="-1" role="dialog" id="delete-package-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 id="titleModal" class="modal-title" style="text-align: center">Delete Package</h4>
            </div>
            <form action="/API/maintenance/deletePackage" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="box-body">
                        <input hidden type="text" name="inputPackageID" id="inputPackageID">
                        <h4>Are you sure you want to delete this package?</h4>
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

<div class="modal fade" tabindex="-1" role="dialog" id="edit-package-modal" style="width: 100%;">
    <div class="modal-dialog" style="width: 50%;">
        <div class="modal-content">
            <div class="modal-header">
              <h4 id="titleModal" class="modal-title" style="text-align: center">Edit Package</h4>
            </div>
            <form action="/API/maintenance/editPackage" method="POST">
                {{ csrf_field() }}
                <div class="modal-body" style="width: 100%;">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Package Name</label>
                            <div class="col-sm-9">
                                <input type="text" style="display: none;" class="form-control" name="inputPackageIDEdit" id="inputPackageIDEdit" placeholder="Enter Package Name...">
                                <input type="text" class="form-control" name="inputPackageNameEdit" id="inputPackageNameEdit" placeholder="Enter Package Name...">
                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Package Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inputPackageDescEdit" id="inputPackageDescEdit" placeholder="Enter Package Description...">
                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Package Price</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inputPackagePriceEdit" id="inputPackagePriceEdit" placeholder="Enter Package Price...">
                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Package Inclusion</label>
                            <div class="col-sm-9">
								<select name="inputPackageInclusionEdit[]" required style="width: 100%;" data-placeholder="Select Inclusions" id="inputPackageInclusion" class="form-control select2" multiple="multiple">
		                            @foreach($service as $serviceData)
                                        <option value="{{ $serviceData->service_id }}">{{ $serviceData->service_name }}</option>
                                    @endforeach
								</select>
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
