<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use Response;
use App\Models\StaffModel;
use App\Repositories\StaffRepo;
use Illuminate\Support\Facades\Auth;

/**
*   Author: Shiela Mae Pornea
*/

class StaffController extends Controller
{

    protected $staff = null;

    public function __construct(StaffRepo $staff) {
        $this->staff = $staff;
    }

    public function viewAll() {
        $staff = $this->staff->getAllStaff();
        return view('/pages/maintenance/staff/index')
            ->with('staff', $staff);
    }

    // public function addNewServiceType() {
    //     $serviceName = $_POST['inputServiceName'];
    //     $this->service->createServiceType( $serviceName );
    //     return redirect()->back();
    // }
    //
    // public function addNewService() {
    //     $serviceName = $_POST['inputServiceName'];
    //     $serviceDesc = $_POST['inputServiceDesc'];
    //     $serviceType = $_POST['inputServiceType'];
    //     $serviceFee = $_POST['inputServiceFee'];
    //     $this->service->createService( $serviceName, $serviceDesc, $serviceType, $serviceFee );
    //     return redirect()->back();
    // }
    //
    // public function deleteService() {
    //     $serviceID = $_POST['inputServiceID'];
    //     $this->service->deleteService( $serviceID );
    //     return redirect()->back();
    // }
    //
    // public function deleteServiceType() {
    //     $serviceTypeID = $_POST['inputServiceTypeID'];
    //     $this->service->deleteServiceType( $serviceTypeID );
    //     return redirect()->back();
    // }
    //
    // public function getSingleServiceType(Request $req) {
    //     $serviceTypeID = $req->only('serviceTypeID');
    //     $serviceTypeData = $this->service->getSingleServiceType( $serviceTypeID );
    //     return \Response::json(['serviceTypeData'=>$serviceTypeData]);
    // }
    //
    // public function editServiceType() {
    //     $serviceTypeID = $_POST['inputServiceTypeIDEdit'];
    //     $serviceTypeName = $_POST['inputServiceTypeNameEdit'];
    //     $this->service->editServiceType( $serviceTypeID, $serviceTypeName);
    //     return redirect()->back();
    // }
    //
    // public function getSingleService(Request $req) {
    //     $serviceID = $req->only('serviceID');
    //     $serviceData = $this->service->getSingleService( $serviceID );
    //     return \Response::json(['serviceData'=>$serviceData]);
    // }
    //
    // public function editService() {
    //     $serviceID = $_POST['inputServiceIDEdit'];
    //     $serviceName = $_POST['inputServiceNameEdit'];
    //     $serviceDesc = $_POST['inputServiceDescEdit'];
    //     $serviceFee = $_POST['inputServiceFeeEdit'];
    //     $serviceType = $_POST['inputServiceTypeEdit'];
    //     $this->service->editService( $serviceID, $serviceName, $serviceDesc, $serviceFee, $serviceType);
    //     return redirect()->back();
    // }


}
