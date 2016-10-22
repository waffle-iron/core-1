<?php namespace App\Modules\Triage\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Models\Mship\Account;
use App\Modules\Triage\Models\Article;
use App\Modules\Triage\Models\Question;
use Auth;
use Input;

class Concierge extends BaseController
{

    public function getLanding()
    {
        return $this->viewMake("triage::site.landing");
    }

    public function anySearch()
    {
        $results = Article::search(Input::get("query"))->get()->reject(function($value, $key) {
            return (!$value->is_public || !$value->is_visible);
        });

        return $this->viewMake("triage::site.search")
                    ->with("results", $results);
    }

    public function getArticle(Article $article)
    {
        $excludeId = $article->id;

        $alternatives = Article::search(Input::get("query"))->get()->reject(function($value, $key) use($excludeId) {
            return ($value->id == $excludeId || !$value->is_public);
        });

        return $this->viewMake("triage::site.article")
                    ->with("article", $article)
                    ->with("alternatives", $alternatives);
    }
}
