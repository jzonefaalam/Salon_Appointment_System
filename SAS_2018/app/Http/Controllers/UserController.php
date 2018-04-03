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

    public function setAppointment() {
        $appCustomerName = $_POST['inputName'];
        $appTime = $_POST['inputTime'];
        $appDate = $_POST['inputDate'];
        $appCustomerNum = $_POST['inputContactNum'];
        $appCustomerEmail = $_POST['inputEmail'];
        $appServices = $_POST['inputServices'];
        if( isset($_POST['inputPackages']) )
        { 
            $appPackages = $_POST['inputPackages'];
        }
        else{
            $appPackages = 0;
        }
        $appStaff = $_POST['inputStaff'];
        $appMessage = $_POST['inputMessage'];
        $this->user->createAppointment( $appCustomerName, $appTime, $appDate, $appCustomerNum, $appCustomerEmail, $appServices, $appPackages, $appStaff, $appMessage );
        return redirect()->back();
    }
}
