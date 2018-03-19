<?php

namespace App\Repositories;
use DB;
use App\Models\ServiceModel;
use App\Models\ServiceTypeModel;

class ServiceRepo {

    public function getAllServices( ) {
        return DB::table('tbl_service')
            ->select('tbl_service.*', 'tbl_servicetype.servicetype_name')
            ->leftJoin('tbl_servicetype', 'tbl_service.servicetype_id', 'tbl_servicetype.servicetype_id')
            ->where('tbl_service.status', 1)
            ->where('tbl_servicetype.status', 1)
            ->get();
    }
    public function getAllServiceTypes( ) {
        return DB::table('tbl_servicetype')
            ->select('*')
            ->where('status', 1)
            ->get();
    }

    public function createServiceType( $service_name ) {
        return response()->json(
            ServiceTypeModel::insert([
                'servicetype_name' => $service_name,
                'status' => 1
            ])
        );
    }

    public function createService( $service_name, $service_desc, $service_type, $service_fee ) {
        return response()->json(
            ServiceModel::insert([
                'service_name' => $service_name,
                'service_desc' => $service_desc,
                'service_price' => $service_fee,
                'servicetype_id' => $service_type,
                'status' => 1
            ])
        );
    }

    public function deleteService( $service_id ) {
        return DB::table('tbl_service')
            ->where('service_id', $service_id)
            ->update([
              'status' => 0,
            ]);
    }

    public function deleteServiceType( $servicetype_id ) {
        return DB::table('tbl_servicetype')
            ->where('servicetype_id', $servicetype_id)
            ->update([
              'status' => 0,
            ]);
    }

    public function getSingleServiceType( $servicetype_id ) {
        return DB::table('tbl_servicetype')
            ->select('*')
            ->where('servicetype_id', $servicetype_id)
            ->get();
    }

}
