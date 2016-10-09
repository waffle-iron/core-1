<?php

Route::get("/central-training", function () {
    return Redirect::route("ct.landing");
});

Route::group([
    "as"         => "ct.admin.",
    "prefix"     => "adm/central-training",
    "namespace"  => "Admin",
    "domain"     => config("app.url"),
    "middleware" => ["auth.admin"]
], function () {
    Route::get("/", [
        "as"   => "dashboard",
        "uses" => "Dashboard@getDashboard",
    ]);
});

Route::group([
    "as"         => "ct.",
    "namespace"  => "Site",
    "domain"     => "ct." . config("app.url"),
    'middleware' => ['auth.user.full', 'user.must.read.notifications']
], function () {
    Route::get("/", [
        "as"   => "landing",
        "uses" => "Dashboard@getDashboard"
    ]);

    Route::get("/start", [
        "as"   => "start",
        "uses" => "Dashboard@getStart",
    ]);

    Route::group(["as" => "profile.", "prefix" => "profile"], function () {
        Route::get("/create/{type}", [
            "as"   => "create",
            "uses" => "Profile@getCreate"
        ]);
    });
});
