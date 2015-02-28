<?php

namespace Controllers\Site;

use \Auth;
use \Session;
use \Route;
use \View;
use \Models\Mship\Account;
use \Request;

class SiteController extends \Controllers\BaseController {

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    public function __controller() {
        parent::__controller();
    }

    public function viewMake($view) {
        $view = View::make($view);

        // Accounts!
        $view->with("_account", $this->_account);

        // Let's also display the breadcrumb
        $breadcrumb = array();
        $uri = "/";
        $bcBase = explode("\\", str_replace("Controllers\\Site\\", "", get_called_class()));

        foreach ($bcBase as $bc) {
            $uri.= "/" . strtolower($bc);
            $breadcrumb[] = [strtolower($bc), $uri, Route::has($uri)];
        }
        $view->with("_breadcrumb", $breadcrumb);

        // Page titles
        if ($this->_pageTitle == NULL) {
            $this->_pageTitle = last($breadcrumb)[0];
        }

        return $view;
    }

    public function __construct() {
        if (Auth::admin()->check()) {
            $this->_account = Auth::admin()->get();
            $this->_account->load("roles", "roles.permissions");
        } else {
            $this->_account = new Account();
        }
    }

}
