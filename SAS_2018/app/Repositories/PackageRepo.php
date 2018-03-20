<?php

namespace App\Repositories;
use DB;
use App\Models\PackageModel;

class PackageRepo {

    public function getAllPackages( ) {
        return DB::table('tbl_packages')
            ->select('*')
            ->where('status', 1)
            ->get();
    }

    public function getAllServices( ) {
        return DB::table('tbl_service')
            ->select('tbl_service.*', 'tbl_servicetype.*')
            ->leftJoin('tbl_servicetype', 'tbl_servicetype.servicetype_id', 'tbl_service.servicetype_id')
            ->where('tbl_servicetype.status', 1)
            ->where('tbl_service.status', 1)
            ->get();
    }

    public function createStaff( $packageName, $packageDesc, $packagePrice, $packageInclusion ) {
        // PackageModel::insert([
        //     'package_name' => $packageName,
        //     'package_description' => $packageDesc,
        //     'package_price' => $packagePrice,
        //     'status' => 1
        // ]);
        //
        // $latestID = DB::table('tbl_packages')
        // ->orderBy('package_id','desc')
        // ->first()
        // ->id;
        //
        // if( $packageInclusion != "null"){
        //     foreach( $packageInclusion as $services ) {
        //         DB::table('tbl_packageinclusions')
        //             ->insert([
        //                 'package_id' => $latestID,
        //                 'service_id' => $services
        //             ]);
        //     }
        // }
    }
    //
    // public function deleteStaff( $staff_id ) {
    //     return DB::table('tbl_staff')
    //         ->where('staff_id', $staff_id)
    //         ->update([
    //           'status' => 0,
    //         ]);
    // }
    //
    // public function getSingleStaff( $staff_id ) {
    //     return DB::table('tbl_staff')
    //         ->select('*')
    //         ->where('staff_id', $staff_id)
    //         ->get();
    // }
    //
    // public function editStaff( $staffID, $staffFName, $staffLName, $staffMName, $staffDesc ,$staffBDate, $staffGender ) {
    //     return DB::table('tbl_staff')
    //         ->where('staff_id', $staffID)
    //         ->update([
    //             'staff_firstname' => $staffFName,
    //             'staff_middlename' => $staffMName,
    //             'staff_lastname' => $staffLName,
    //             'staff_description' => $staffDesc,
    //             'staff_gender' => $staffGender,
    //             'staff_birthdate' => date("Y-m-d", strtotime($staffBDate)),
    //             'status' => 1
    //         ]);
    // }

}
