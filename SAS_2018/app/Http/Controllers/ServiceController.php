<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use Response;
use App\Models\ServiceModel;
use App\Repositories\ServiceRepo;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{

    protected $service = null;

    public function __construct(ServiceRepo $service) {
        $this->service = $service;
    }

    public function viewAll() {
        $service = $this->service->getAllServices();
        $serviceType = $this->service->getAllServiceTypes();
        return view('/pages/maintenance/services/index')
            ->with('service', $service)
            ->with('serviceType', $serviceType);
    }

    public function addNewServiceType() {
        $serviceName = $_POST['inputServiceName'];
        $this->service->createServiceType( $serviceName );
        return redirect()->back();
    }

    public function addNewService(Request $req) {
        $serviceName = $_POST['inputServiceName'];
        $serviceDesc = $_POST['inputServiceDesc'];
        $serviceType = $_POST['inputServiceType'];
        $serviceFee = $_POST['inputServiceFee'];
        $serviceImage = ($_FILES["inputServiceImage"]["name"]);
        $target_dir = "images\\";
        $target_file = $target_dir . basename($_FILES["inputServiceImage"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["inputServiceImage"]["tmp_name"], $target_file);
        $this->service->createService( $serviceName, $serviceDesc, $serviceType, $serviceFee, $serviceImage);
        return redirect()->back();
    }

    public function deleteService() {
        $serviceID = $_POST['inputServiceID'];
        $this->service->deleteService( $serviceID );
        return redirect()->back();
    }

    public function deleteServiceType() {
        $serviceTypeID = $_POST['inputServiceTypeID'];
        $this->service->deleteServiceType( $serviceTypeID );
        return redirect()->back();
    }

    public function getSingleServiceType(Request $req) {
        $serviceTypeID = $req->only('serviceTypeID');
        $serviceTypeData = $this->service->getSingleServiceType( $serviceTypeID );
        return \Response::json(['serviceTypeData'=>$serviceTypeData]);
    }

    public function editServiceType() {
        $serviceTypeID = $_POST['inputServiceTypeIDEdit'];
        $serviceTypeName = $_POST['inputServiceTypeNameEdit'];
        $this->service->editServiceType( $serviceTypeID, $serviceTypeName);
        return redirect()->back();
    }

    public function getSingleService(Request $req) {
        $serviceID = $req->only('serviceID');
        $serviceData = $this->service->getSingleService( $serviceID );
        return \Response::json(['serviceData'=>$serviceData]);
    }

    public function editService() {
        $serviceID = $_POST['inputServiceIDEdit'];
        $serviceName = $_POST['inputServiceNameEdit'];
        $serviceDesc = $_POST['inputServiceDescEdit'];
        $serviceFee = $_POST['inputServiceFeeEdit'];
        $serviceType = $_POST['inputServiceTypeEdit'];
        $this->service->editService( $serviceID, $serviceName, $serviceDesc, $serviceFee, $serviceType);
        return redirect()->back();
    }


}
