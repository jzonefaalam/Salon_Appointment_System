<section id="appointment">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">Set an Appointment</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form id="ismForm" onsubmit="return validateMyForm();" action="/API/setAppointment" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-control" id="inputName" name="inputName" type="text" placeholder="Your Name" required>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="inputContactNum" name="inputContactNum" type="tel" placeholder="Your Phone" required>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputDate" name="inputDate" placeholder="Appointment Date">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <select name="inputPackages[]" required style="width: 100%;" data-placeholder="Select Package(s)" id="inputPackages[]" class="form-control select2" multiple="multiple">
		                            @foreach($package as $packageData)
                                        <option value="{{ $packageData->package_id }}">{{ $packageData->package_name }}</option>
                                    @endforeach
								</select>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="inputEmail" name="inputEmail" type="email" placeholder="Your Email" required>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="inputTime" name="inputTime" type="text" hidden placeholder="Your Phone">
                                <input type="text" class="form-control timepicker" id="inputTimeDisplay" name="inputTimeDisplay" placeholder="Appointment Time">
                            </div>
                            <div class="form-group">
                                <select name="inputServices[]" required style="width: 100%;" data-placeholder="Select Service(s)" id="inputServices[]" class="form-control select2" multiple="multiple">
		                            @foreach($service as $serviceData)
                                        <option value="{{ $serviceData->service_id }}">{{ $serviceData->service_name }}</option>
                                    @endforeach
								</select>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="inputStaff[]" required style="width: 100%;" data-placeholder="Select Staff" id="inputStaff[]" class="form-control select2" multiple="multiple">
                                    @foreach($staff as $staffData)
                                        <option value="{{ $staffData->staff_id }}">{{ $staffData->staff_firstname }} {{ $staffData->staff_lastname }}</option>
                                    @endforeach
                                </select>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" id="inputMessage" name="inputMessage" rows="4" cols="80" placeholder="Personal Message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button class="btn btn-primary btn-xl text-uppercase" type="submit">Set Appointment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" tabindex="-1" role="dialog" id="new-package-modal" style="width: 100%;">
    <div class="modal-dialog" style="width: 50%;">
        <div class="modal-content">
            <div class="modal-header">
              <h4 id="titleModal" class="modal-title" style="text-align: center">New Package</h4>
            </div>
            <input hidden type="text" name="sendBool" id="sendBool" value="true">
            <button class="btn btn-primary btn-xl text-uppercase" onclick="superSubmit();" id="superSubmit" type="submit">confirm</button>
        </div>
    </div>
</div>
