<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use Response;
use App\Models\ServiceModel;
use App\Repositories\ServiceRepo;
use Illuminate\Support\Facades\Auth;

/**
*   Author: Shiela Mae Pornea
*/

class ServiceController extends Controller
{

    protected $service = null;

    public function __construct(ServiceRepo $service) {
        $this->service = $service;
    }

    public function viewAll() {
        $service = $this->service->getAll( Auth::user()->user_id );
        return view('/pages/maintenance/services/index')
            ->with('serviceData', $service);
    }

}
