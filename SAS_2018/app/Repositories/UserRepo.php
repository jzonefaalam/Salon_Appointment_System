<?php

namespace App\Repositories;
use DB;
use App\Models\PackageModel;
use App\Models\ServiceModel;
use App\Models\StaffModel;

class UserRepo {

    public function getAllPackages() {
        return DB::table('tbl_packages')
            ->select('*')
            ->where('status', 1)
            ->get();
    }

    public function getAllServices() {
        return DB::table('tbl_service')
            ->select('tbl_service.*', 'tbl_servicetype.*')
            ->leftJoin('tbl_servicetype', 'tbl_servicetype.servicetype_id', 'tbl_service.servicetype_id')
            ->where('tbl_servicetype.status', 1)
            ->where('tbl_service.status', 1)
            ->get();
    }


    public function getAllInclusions() {
        return DB::table('tbl_packageinclusions')
            ->select('*')
            ->where('status', 1)
            ->get();
    }

    public function getAllStaff(){
        return DB::table('tbl_staff')
            ->select('*')
            ->where('status', 1)
            ->get();
    }

    public function createAppointment( $appCustomerName, $appTime, $appDate, $appCustomerNum, $appCustomerEmail, $appServices, $appPackages, $appStaff, $appMessage ) {
        DB::table('tbl_customers')
            ->insert([
                'customer_name' => $appCustomerName,
                'customer_email' => $appCustomerEmail,
                'customer_contactnumber' => $appCustomerNum,
                'status' => 1
            ]);

        $customerID = DB::table('tbl_customers')
            ->max('customer_id');

        DB::table('tbl_appointment')
            ->insert([
                'appointment_time' => $appTime,
                'appointment_date' => $appDate,
                'appointment_message' => $appMessage,
                'customer_id' => $customerID,
                'status' => 1
            ]);

        $appID = DB::table('tbl_appointment')
            ->max('appointment_id');

        if( $appServices != "null"){
            foreach( $appServices as $service ) {
                DB::table('tbl_availedservice')
                    ->insert([
                        'service_id' => $service,
                        'appointment_id' => $appID,
                        'status' => 1
                    ]);
            }
        }

        if( $appPackages != "null"){
            foreach( $appPackages as $package ) {
                DB::table('tbl_availedpackage')
                    ->insert([
                        'package_id' => $package,
                        'appointment_id' => $appID,
                        'status' => 1
                    ]);
            }
        }

        if( $appStaff != "null"){
            foreach( $appStaff as $staff ) {
                DB::table('tbl_availedstaff')
                    ->insert([
                        'staff_id' => $staff,
                        'appointment_id' => $appID,
                        'status' => 1
                    ]);
            }
        }
    }
    //
    // public function deletePackage( $package_id ) {
    //     return DB::table('tbl_packages')
    //         ->where('package_id', $package_id)
    //         ->update([
    //           'status' => 0,
    //         ]);
    // }
    //
    // public function getSinglePackage( $package_id ) {
    //     return DB::table('tbl_packages')
    //         ->select('*')
    //         ->where('package_id', $package_id)
    //         ->get();
    // }
    //
    // public function editPackage( $packageID, $packageName, $packageDesc, $packagePrice, $packageInclusion ) {
    //     DB::table('tbl_packages')
    //         ->where('package_id', $packageID)
    //         ->update([
    //             'package_name' => $packageName,
    //             'package_description' => $packageDesc,
    //             'package_price' => $packagePrice,
    //         ]);
    //
    //     if( $packageInclusion != "null"){
    //         foreach( $packageInclusion as $services ) {
    //             DB::table('tbl_packageinclusions')
    //                 ->where('package_id', $packageID)
    //                 ->update([
    //                     'status' => 0
    //                 ]);
    //         }
    //     }
    //
    //     if( $packageInclusion != "null"){
    //         foreach( $packageInclusion as $services ) {
    //             DB::table('tbl_packageinclusions')
    //                 ->insert([
    //                     'package_id' => $packageID,
    //                     'service_id' => $services,
    //                     'status' => 1
    //                 ]);
    //         }
    //     }
    // }

}
