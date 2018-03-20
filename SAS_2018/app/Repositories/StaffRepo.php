<?php

namespace App\Repositories;
use DB;
use App\Models\StaffModel;

class StaffRepo {

    public function getAllStaff( ) {
        return DB::table('tbl_staff')
            ->select('*')
            ->where('status', 1)
            ->get();
    }

    public function createStaff( $staffFName, $staffLName, $staffMName, $staffDesc ,$staffBDate, $staffGender ) {

        return response()->json(
            StaffModel::insert([
                'staff_firstname' => $staffFName,
                'staff_middlename' => $staffMName,
                'staff_lastname' => $staffLName,
                'staff_description' => $staffDesc,
                'staff_gender' => $staffGender,
                'staff_birthdate' => date("Y-m-d", strtotime($staffBDate)),
                'status' => 1
            ])
        );
    }

    public function deleteStaff( $staff_id ) {
        return DB::table('tbl_staff')
            ->where('staff_id', $staff_id)
            ->update([
              'status' => 0,
            ]);
    }

    public function getSingleStaff( $staff_id ) {
        return DB::table('tbl_staff')
            ->select('*')
            ->where('staff_id', $staff_id)
            ->get();
    }

    public function editStaff( $staffID, $staffFName, $staffLName, $staffMName, $staffDesc ,$staffBDate, $staffGender ) {
        return DB::table('tbl_staff')
            ->where('staff_id', $staffID)
            ->update([
                'staff_firstname' => $staffFName,
                'staff_middlename' => $staffMName,
                'staff_lastname' => $staffLName,
                'staff_description' => $staffDesc,
                'staff_gender' => $staffGender,
                'staff_birthdate' => date("Y-m-d", strtotime($staffBDate)),
                'status' => 1
            ]);
    }

}
