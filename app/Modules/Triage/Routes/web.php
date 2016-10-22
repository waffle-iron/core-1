<?php

Route::group([
    "as"         => "triage.",
    "namespace"  => "Site",
    "domain"     => "hd." . config("app.url"),
], function () {
    Route::get("/", [
        "as" => "landing",
        "uses" => "Concierge@getLanding",
    ]);

    Route::any("/search", [
        "as" => "search",
        "uses" => "Concierge@anySearch",
    ]);

    Route::get("/article/{article}", [
        "as" => "article",
        "uses" => "Concierge@getArticle",
    ]);

    Route::get("/article/{article}/helpful", [
        "as" => "article.helpful",
        "uses" => "Concierge@getArticleHelpful",
    ]);

    Route::get("/article/{article}/unhelpful", [
        "as" => "article.unhelpful",
        "uses" => "Concierge@getArticleUnhelpful",
    ]);

    Route::get("/start", [
        "as" => "start",
        "uses" => "Concierge@getStart",
    ]);
});
