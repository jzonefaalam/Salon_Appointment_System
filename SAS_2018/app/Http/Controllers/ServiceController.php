<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use Response;
use App\Models\ServiceModel;
use App\Repositories\ServiceRepo;
use Illuminate\Support\Facades\Auth;

/**
*   Author: Shiela Mae Pornea
*/

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

    public function addNewService() {
        $serviceName = $_POST['inputServiceName'];
        $serviceDesc = $_POST['inputServiceDesc'];
        $serviceType = $_POST['inputServiceType'];
        $serviceFee = $_POST['inputServiceFee'];
        $this->service->createService( $serviceName, $serviceDesc, $serviceType, $serviceFee );
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


}
