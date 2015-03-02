<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpgradeV13V20 extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        DB::table("sys_timeline_action")
          ->insert(
              [
                  [
                      "section"    => "mship",
                      "area"       => "account",
                      "action"     => "impersonate",
                      "version"    => 1,
                      "entry"      => "{owner} impersonated {extra} and logged into their basic user account.  A reason was given.",
                      "created_at" => DB::raw("NOW()"),
                      "updated_at" => DB::raw("NOW()")
                  ],
              ]
          );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        DB::table("sys_timeline_action")
          ->where(DB::raw("CONCAT(`section`, '_', `area`, '_', `action`)"), "=", "mship_account_impersonate")
          ->delete();
    }
}
