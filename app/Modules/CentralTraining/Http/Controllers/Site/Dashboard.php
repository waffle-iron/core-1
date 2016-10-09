<?php namespace App\Modules\CentralTraining\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Models\Mship\Account;
use Auth;

class Dashboard extends BaseController
{

    public function getDashboard()
    {
        return $this->viewMake("centraltraining::site.dashboard");
    }

    public function getStart()
    {
        return $this->viewMake("centraltraining::site.start");
    }
}
