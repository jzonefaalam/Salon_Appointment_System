<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use Response;
use App\Repositories\ReservationRepo;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    protected $reservation = null;

    public function __construct(ReservationRepo $reservation) {
        $this->reservation = $reservation;
    }

    public function getData() {
        $appointmentToday = $this->reservation->getTodayAppointments();
        $appointmentPending = $this->reservation->getPendingAppointments();
        $appointmentFinished = $this->reservation->getFinishedAppointments();
        $package = $this->reservation->getAvailedPackage();
        $service = $this->reservation->getAvailedServices();
        $staff = $this->reservation->getAvailedStaff();
        return view('/pages/reservation/index')
            ->with('package', $package)
            ->with('service', $service)
            ->with('staff', $staff)
            ->with('appointmentToday', $appointmentToday)
            ->with('appointmentFinished', $appointmentFinished)
            ->with('appointmentPending', $appointmentPending);
    }

    public function getReports() {
        $appointmentFinished = $this->reservation->getFinishedAppointments();
        $package = $this->reservation->getAvailedPackage();
        $service = $this->reservation->getAvailedServices();
        $staff = $this->reservation->getAvailedStaff();
        return view('/pages/report/index')
            ->with('package', $package)
            ->with('service', $service)
            ->with('staff', $staff)
            ->with('appointmentFinished', $appointmentFinished);
    }

    public function sendReport() {
        $appointmentFinished = $this->reservation->getReports();
        $package = $this->reservation->getAvailedPackage();
        $service = $this->reservation->getAvailedServices();
        $staff = $this->reservation->getAvailedStaff();
        return \Response::json([
            'package'=>$package,
            'service'=>$service,
            'staff'=>$staff,
            'appointmentFinished'=>$appointmentFinished,
        ]);
    }

}
