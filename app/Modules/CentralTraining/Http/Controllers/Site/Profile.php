<?php namespace App\Modules\CentralTraining\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Models\Mship\Account;
use Auth;
use Redirect;

class Profile extends BaseController
{

    public function getCreate($type)
    {
        //TODO: Add policy check.
        $profile = new \App\Modules\CentralTraining\Models\Profile;
        $profile->setting_learning_style = strtoupper($type);

        \Auth::user()->centralTrainingProfile()->save($profile);

        return Redirect::route("ct.landing")->withSuccess("Your training profile has been created!");
    }
}
