<?php

namespace Controllers;

use \Auth;
use \View;
use \Session;
use \Request;
use \Models\Mship\Account;

class BaseController extends \Controller {

    protected $_account;
    protected $_pageTitle;
    private $_theme = null;

    public function __construct() {
        if (Auth::user()->check()) {
            $this->_account = Auth::user()->get();
            $this->_account->load("roles", "roles.permissions");
        } else {
            $this->_account = new Account();
        }
    }

    protected function setTitle($title) {
        $this->pageTitle = $title;
    }

    protected function setTheme($theme) {
        $this->_theme = $theme;
    }

    protected function buildBreadcrumb() {
        // Let's also display the breadcrumb
        $breadcrumb = array();
        $uri = "/";
        for ($i = 1; $i <= 10; $i++) {
            if (Request::segment($i) != NULL) {
                $uri.= Request::segment($i);
                $b = [Request::segment($i)];
                $b[1] = rtrim($uri, "/");
                $breadcrumb[] = $b;
            }
        }

        return $breadcrumb;
    }

    protected function assignVariablesToView($view) {
        // Accounts!
        $view->with("_account", $this->_account);

        $breadcrumb = $this->buildBreadcrumb();
        $view->with("_breadcrumb", $breadcrumb);

        // Page titles
        if ($this->_pageTitle == NULL) {
            $this->_pageTitle = last($breadcrumb)[0];
        }
        $view->with("_pageTitle", ucfirst($this->_pageTitle));

        return $view;
    }

    protected function viewMake($view = null) {
        if ($this->_theme) {
            $view = $this->_theme . "." . $view;
        }
        $view = View::make($view);

        return $this->assignVariablesToView($view);
    }

}
