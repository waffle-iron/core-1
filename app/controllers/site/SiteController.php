<?php

namespace Controllers\Site;

use \Auth;
use \Session;
use \Route;
use \View;
use \Models\Mship\Account;
use \Request;

class SiteController extends \Controllers\BaseController {
    public function __construct() {
        parent::__construct();

        $this->setTheme("sitev2");
    }

}
