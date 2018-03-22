<?php

namespace App\Repositories;
use DB;

class ReservationRepo {

    public function getAllAppointments( ) {
        return DB::table('tbl_appointment')
            ->select('tbl_appointment.*', 'tbl_customers.*')
            ->leftJoin('tbl_customers', 'tbl_customers.customer_id', 'tbl_appointment.customer_id')
            ->where('tbl_appointment.status', 1)
            ->get();
    }

    public function getAvailedPackage( ) {
        return DB::table('tbl_availedpackage')
            ->select('tbl_availedpackage.*', 'tbl_packages.*')
            ->leftJoin('tbl_packages', 'tbl_packages.package_id', 'tbl_availedpackage.package_id')
            ->where('tbl_packages.status', 1)
            ->where('tbl_availedpackage.status', 1)
            ->get();
    }

    public function getAvailedServices( ) {
        return DB::table('tbl_availedservice')
            ->select('tbl_availedservice.*', 'tbl_service.*')
            ->leftJoin('tbl_service', 'tbl_service.service_id', 'tbl_availedservice.service_id')
            ->where('tbl_service.status', 1)
            ->where('tbl_availedservice.status', 1)
            ->get();
    }

    public function getAvailedStaff( ) {
        return DB::table('tbl_availedstaff')
            ->select('tbl_availedstaff.*', 'tbl_staff.*')
            ->leftJoin('tbl_staff', 'tbl_staff.staff_id', 'tbl_availedstaff.staff_id')
            ->where('tbl_staff.status', 1)
            ->where('tbl_availedstaff.status', 1)
            ->get();
    }

}
