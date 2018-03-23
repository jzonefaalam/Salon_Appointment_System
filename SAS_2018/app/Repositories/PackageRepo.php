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


    public function getAllInclusions( ) {
        return DB::table('tbl_packageinclusions')
            ->select('*')
            ->where('status', 1)
            ->get();
    }

    public function createPackage( $packageName, $packageDesc, $packagePrice, $packageInclusion, $packageImage ) {
        PackageModel::insert([
            'package_name' => $packageName,
            'package_description' => $packageDesc,
            'package_price' => $packagePrice,
            'package_image' => $packageImage,
            'status' => 1
        ]);

        $lastPackageID = DB::table('tbl_packages')
        ->max('package_id');

        if( $packageInclusion != "null"){
            foreach( $packageInclusion as $services ) {
                DB::table('tbl_packageinclusions')
                    ->insert([
                        'package_id' => $lastPackageID,
                        'service_id' => $services,
                        'status' => 1
                    ]);
            }
        }
        $target_dir = "images\\";
        $target_file = $target_dir . basename($_FILES["inputPackageImage"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["inputPackageImage"]["tmp_name"], $target_file);
    }

    public function deletePackage( $package_id ) {
        return DB::table('tbl_packages')
            ->where('package_id', $package_id)
            ->update([
              'status' => 0,
            ]);
    }

    public function getSinglePackage( $package_id ) {
        return DB::table('tbl_packages')
            ->select('*')
            ->where('package_id', $package_id)
            ->get();
    }

    public function editPackage( $packageID, $packageName, $packageDesc, $packagePrice, $packageInclusion ) {
        DB::table('tbl_packages')
            ->where('package_id', $packageID)
            ->update([
                'package_name' => $packageName,
                'package_description' => $packageDesc,
                'package_price' => $packagePrice,
            ]);

        if( $packageInclusion != "null"){
            foreach( $packageInclusion as $services ) {
                DB::table('tbl_packageinclusions')
                    ->where('package_id', $packageID)
                    ->update([
                        'status' => 0
                    ]);
            }
        }

        if( $packageInclusion != "null"){
            foreach( $packageInclusion as $services ) {
                DB::table('tbl_packageinclusions')
                    ->insert([
                        'package_id' => $packageID,
                        'service_id' => $services,
                        'status' => 1
                    ]);
            }
        }
    }

}
