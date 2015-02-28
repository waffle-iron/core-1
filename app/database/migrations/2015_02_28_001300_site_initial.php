<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiteInitial extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // Add the website permissions.
        DB::table("mship_permission")->insert(array(
            ["name" => "adm/mship/role/default", "display_name" => "Admin / Membership / Roles / Set Default", "created_at" => DB::raw("NOW()"), "updated_at" => DB::raw("NOW()")],
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        // Delete the website permissions.
        DB::table("mship_permission")
          ->where("name", "LIKE", "/adm/content/%")
          ->orWhere("name", "LIKE", "/adm/content/%")
          ->delete();
    }
}
