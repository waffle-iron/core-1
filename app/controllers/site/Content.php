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

            // If it's NOT a page, let's go for a section OF WHICh we need the default page.
            if(!$content){
                $section = ContentData::isSection()->where("slug", "=", $slug)->first();

                if($section){
                    $content = $section->children()->isPage()->orderBy("sort_order", "ASC")->first();
                }
            }
        }

        if(!$slug OR !$content){
            $content = ContentData::isPage()->isDefault()->first();
        }

        $this->_pageTitle = $content->title;
        return $this->viewMake("layout")
                    ->with("content", $content);
    }
}
