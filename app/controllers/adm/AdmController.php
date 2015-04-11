<?php

namespace Controllers\Adm;

use \Auth;
use \Session;
use \Route;
use \View;
use \Models\Mship\Account;
use \Request;

class AdmController extends \Controllers\BaseController {

    protected $_pageSubTitle = NULL;

    public function __construct() {
        parent::__construct();

        if (Auth::admin()->check()) {
            $this->_account = Auth::admin()->get();
            $this->_account->load("roles", "roles.permissions");
        } else {
            $this->_account = new Account();
        }
    }

    protected function buildBreadcrumb() {
        $breadcrumb = array();
        $uri        = "/adm";
        $bcBase     = explode("\\", str_replace("Controllers\\Adm\\", "", get_called_class()));
        foreach ($bcBase as $bc) {
            $uri.= "/" . strtolower($bc);
            $breadcrumb[] = [strtolower($bc), $uri, Route::has($uri)];
        }

        return $breadcrumb;
    }

    protected function assignVariablesToView($view) {
        $view = parent::assignVariablesToView($view);

        $breadcrumb = $this->buildBreadcrumb();
        if ($this->_pageSubTitle == NULL) {
            $this->_pageSubTitle = head($breadcrumb)[0];
        }
        if ($this->_pageSubTitle == $this->_pageTitle) {
            $this->_pageSubTitle = NULL;
        }
        $view->with("_pageSubTitle", $this->_pageSubTitle);

        return $view;
    }

}
