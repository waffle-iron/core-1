<?php namespace App\Modules\CentralTraining\Http\Controllers\Admin;

use App\Http\Controllers\Adm\AdmController;
use App\Models\Mship\Account;
use Auth;

class Dashboard extends AdmController
{

    public function getDashboard()
    {
        return $this->viewMake("centraltraining::site.dashboard");
    }
}
