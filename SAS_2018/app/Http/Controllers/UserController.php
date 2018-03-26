<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use Response;
use App\Repositories\UserRepo;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    protected $user = null;

    public function __construct(UserRepo $user) {
        $this->user = $user;
    }

    public function getData() {
        $package = $this->user->getAllPackages();
        $service = $this->user->getAllServices();
        $staff = $this->user->getAllStaff();
        $inclusions = $this->user->getAllInclusions();
        return view('/pages/user/index')
            ->with('package', $package)
            ->with('inclusions', $inclusions)
            ->with('staff', $staff)
            ->with('service', $service);
    }

    public function setAppointment(Request $req) {
        $appCustomerName = $req->only('inputName');
        $appTime = $req->only('inputTime');
        $appDate = $req->only('inputDate');
        $appCustomerNum = $req->only('inputContactNum');
        $appCustomerEmail = $req->only('inputEmail');
        $appServices = $req->only('inputServices');
        $appPackages = $req->only('inputPackages');
        $appStaff = $req->only('inputStaff');
        $appMessage = $req->only('inputMessage');
        $this->user->createAppointment( $appCustomerName, $appTime, $appDate, $appCustomerNum, $appCustomerEmail, $appServices, $appPackages, $appStaff, $appMessage );
        return redirect()->back();
    }
    //
    // public function deletePackage() {
    //     $packageID = $_POST['inputPackageID'];
    //     $this->package->deletePackage( $packageID );
    //     return redirect()->back();
    // }
    //
    // public function getSinglePackage(Request $req) {
    //     $packageID = $req->only('packageID');
    //     $packageData = $this->package->getSinglePackage( $packageID );
    //     return \Response::json(['packageData'=>$packageData]);
    // }
    //
    // public function editPackage() {
    //     $packageID = $_POST['inputPackageIDEdit'];
    //     $packageName = $_POST['inputPackageNameEdit'];
    //     $packageDesc = $_POST['inputPackageDescEdit'];
    //     $packagePrice = $_POST['inputPackagePriceEdit'];
    //     $packageInclusion = $_POST['inputPackageInclusionEdit'];
    //     $this->package->editPackage( $packageID, $packageName, $packageDesc, $packagePrice, $packageInclusion );
    //     return redirect()->back();
    // }

}
