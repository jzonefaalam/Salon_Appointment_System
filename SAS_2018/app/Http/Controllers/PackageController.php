<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use Response;
use App\Models\PackageModel;
use App\Repositories\PackageRepo;
use Illuminate\Support\Facades\Auth;

/**
*   Author: Shiela Mae Pornea
*/

class PackageController extends Controller
{

    protected $package = null;

    public function __construct(PackageRepo $package) {
        $this->package = $package;
    }

    public function viewAll() {
        $package = $this->package->getAllPackages();
        $service = $this->package->getAllServices();
        return view('/pages/maintenance/packages/index')
            ->with('package', $package)
            ->with('service', $service);
    }

    public function addNewPackage() {
        $packageName = $_POST['inputPackageName'];
        $packageDesc = $_POST['inputPackageDesc'];
        $packagePrice = $_POST['inputPackagePrice'];
        $packageInclusion = $_POST['inputPackageInclusion'];
        $this->package->createPackage( $packageName, $packageDesc, $packagePrice, $packageInclusion );
        return redirect()->back();
    }
    //
    // public function deleteStaff() {
    //     $staffID = $_POST['inputStaffID'];
    //     $this->staff->deleteStaff( $staffID );
    //     return redirect()->back();
    // }
    //
    // public function getSingleStaff(Request $req) {
    //     $staffID = $req->only('staffID');
    //     $staffData = $this->staff->getSingleStaff( $staffID );
    //     return \Response::json(['staffData'=>$staffData]);
    // }
    //
    // public function editStaff() {
    //     $staffID = $_POST['inputStaffIDEdit'];
    //     $staffFName = $_POST['inputStaffFNameEdit'];
    //     $staffLName = $_POST['inputStaffLNameEdit'];
    //     $staffMName = $_POST['inputStaffMnameEdit'];
    //     $staffDesc = $_POST['inputStaffDescEdit'];
    //     $staffBDate = $_POST['inputStaffBDateEdit'];
    //     $staffGender = $_POST['inputStaffGenderEdit'];
    //     $this->staff->editStaff( $staffID, $staffFName, $staffLName, $staffMName, $staffDesc ,$staffBDate, $staffGender );
    //     return redirect()->back();
    // }

}
