<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use Response;
use App\Models\PackageModel;
use App\Repositories\PackageRepo;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{

    protected $package = null;

    public function __construct(PackageRepo $package) {
        $this->package = $package;
    }

    public function viewAll() {
        $package = $this->package->getAllPackages();
        $service = $this->package->getAllServices();
        $inclusions = $this->package->getAllInclusions();
        return view('/pages/maintenance/packages/index')
            ->with('package', $package)
            ->with('inclusions', $inclusions)
            ->with('service', $service);
    }

    public function addNewPackage() {
        $packageName = $_POST['inputPackageName'];
        $packageDesc = $_POST['inputPackageDesc'];
        $packagePrice = $_POST['inputPackagePrice'];
        $packageInclusion = $_POST['inputPackageInclusion'];
        $packageImage = ($_FILES["inputPackageImage"]["name"]);
        $this->package->createPackage( $packageName, $packageDesc, $packagePrice, $packageInclusion, $packageImage );
        return redirect()->back();
    }

    public function deletePackage() {
        $packageID = $_POST['inputPackageID'];
        $this->package->deletePackage( $packageID );
        return redirect()->back();
    }

    public function getSinglePackage(Request $req) {
        $packageID = $req->only('packageID');
        $packageData = $this->package->getSinglePackage( $packageID );
        return \Response::json(['packageData'=>$packageData]);
    }

    public function editPackage() {
        $packageID = $_POST['inputPackageIDEdit'];
        $packageName = $_POST['inputPackageNameEdit'];
        $packageDesc = $_POST['inputPackageDescEdit'];
        $packagePrice = $_POST['inputPackagePriceEdit'];
        $packageInclusion = $_POST['inputPackageInclusionEdit'];
        $packageImage = ($_FILES["inputPackageImageEdit"]["name"]);
        $this->package->editPackage( $packageID, $packageName, $packageDesc, $packagePrice, $packageInclusion, $packageImage );
        return redirect()->back();
    }

}
