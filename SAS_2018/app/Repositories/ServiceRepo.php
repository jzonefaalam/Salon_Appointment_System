<?php

namespace App\Repositories;
use DB;
use App\Models\ServiceModel;

class ServiceRepo {

    public function getAll( $user_id ) {
        return DB::table('tbl_service')
            ->select('*')
            ->get();
    }

}
