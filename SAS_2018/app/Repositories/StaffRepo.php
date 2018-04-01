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

    public function createStaff( $staffFName, $staffLName, $staffMName, $staffDesc ,$staffBDate, $staffGender, $staffImage ) {
        StaffModel::insert([
            'staff_firstname' => $staffFName,
            'staff_middlename' => $staffMName,
            'staff_lastname' => $staffLName,
            'staff_description' => $staffDesc,
            'staff_gender' => $staffGender,
            'staff_birthdate' => date("Y-m-d", strtotime($staffBDate)),
            'staff_image' => $staffImage,
            'status' => 1
        ]);
        $target_dir = "images\\";
        $target_file = $target_dir . basename($_FILES["inputStaffImage"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["inputStaffImage"]["tmp_name"], $target_file);

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

    public function editStaff( $staffID, $staffFName, $staffLName, $staffMName, $staffDesc ,$staffBDate, $staffGender, $staffImage ) {
        DB::table('tbl_staff')
            ->where('staff_id', $staffID)
            ->update([
                'staff_firstname' => $staffFName,
                'staff_middlename' => $staffMName,
                'staff_lastname' => $staffLName,
                'staff_description' => $staffDesc,
                'staff_gender' => $staffGender,
                'staff_birthdate' => date("Y-m-d", strtotime($staffBDate)),
                'staff_image' => $staffImage,
                'status' => 1
        ]);

        $target_dir = "images\\";
        $target_file = $target_dir . basename($_FILES["inputStaffImageEdit"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["inputStaffImageEdit"]["tmp_name"], $target_file);
    }

}
