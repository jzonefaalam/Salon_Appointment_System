<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use Response;
use App\Models\StaffModel;
use App\Repositories\StaffRepo;
use Illuminate\Support\Facades\Auth;

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

    public function addNewStaff() {
        $staffFName = $_POST['inputStaffFName'];
        $staffLName = $_POST['inputStaffLName'];
        $staffMName = $_POST['inputStaffMname'];
        $staffDesc = $_POST['inputStaffDesc'];
        $staffBDate = $_POST['inputStaffBDate'];
        $staffGender = $_POST['inputStaffGender'];
        $staffImage = ($_FILES["inputStaffImage"]["name"]);
        $this->staff->createStaff( $staffFName, $staffLName, $staffMName, $staffDesc ,$staffBDate, $staffGender, $staffImage );
        return redirect()->back();
    }

    public function deleteStaff() {
        $staffID = $_POST['inputStaffID'];
        $this->staff->deleteStaff( $staffID );
        return redirect()->back();
    }

    public function getSingleStaff(Request $req) {
        $staffID = $req->only('staffID');
        $staffData = $this->staff->getSingleStaff( $staffID );
        return \Response::json(['staffData'=>$staffData]);
    }

    public function editStaff() {
        $staffID = $_POST['inputStaffIDEdit'];
        $staffFName = $_POST['inputStaffFNameEdit'];
        $staffLName = $_POST['inputStaffLNameEdit'];
        $staffMName = $_POST['inputStaffMnameEdit'];
        $staffDesc = $_POST['inputStaffDescEdit'];
        $staffBDate = $_POST['inputStaffBDateEdit'];
        $staffGender = $_POST['inputStaffGenderEdit'];
        $staffImage = ($_FILES["inputStaffImageEdit"]["name"]);
        $this->staff->editStaff( $staffID, $staffFName, $staffLName, $staffMName, $staffDesc ,$staffBDate, $staffGender, $staffImage );
        return redirect()->back();
    }

}
