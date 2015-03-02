<?php

namespace Controllers\Site;

use \Auth;
use \Session;
use \Route;
use \View;
use \Models\Mship\Account;
use \Request;
use \Models\Site\Content as ContentData;

class Content extends \Controllers\Site\SiteController {
    public function runSlug($slug=null){
        // Do we just require default?
        if($slug){
            $content = ContentData::isPage()->where("slug", "=", $slug)->first();
        } else {
            $content = ContentData::isPage()->isDefault()->first();
        }

        $this->_pageTitle = $content->title;
        return $this->viewMake("layout")
                    ->with("content", $content);
    }
}
