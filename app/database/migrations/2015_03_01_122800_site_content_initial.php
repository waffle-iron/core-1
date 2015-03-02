<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class SiteContentInitial extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create("site_content", function ($table) {
            $table->bigIncrements("content_id")
                  ->unsigned();
            $table->tinyInteger("type");
            $table->string("title", 65);
            $table->string("slug", 65);
            $table->text("content");
            $table->smallInteger("status");
            $table->boolean("is_default")->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create("site_content_section_page", function ($table) {
            $table->bigIncrements("content_section_page_id")
                  ->unsigned();
            $table->bigInteger("section_id")
                  ->unsigned();
            $table->bigInteger("page_id")
                  ->unsigned();
            $table->smallInteger("sort_order")
                  ->default("0")
                  ->signed();
            $table->boolean("important")
                  ->default(false);
            $table->timestamps();
        });

        DB::table("site_content")
          ->insert(
              [
                  [
                      "type"       => \Models\Site\Content::TYPE_SECTION,
                      "title"      => "Default",
                      "slug"       => "default-section",
                      "status"     => \Models\Site\Content::STATUS_PUBLIC,
                      "is_default" => 1,
                      "created_at" => DB::raw("NOW()"),
                      "updated_at" => DB::raw("NOW()")
                  ],
                  [
                      "type"       => \Models\Site\Content::TYPE_PAGE,
                      "title"      => "Welcome",
                      "slug"       => "default-page",
                      "status"     => \Models\Site\Content::STATUS_PUBLIC,
                      "is_default" => 1,
                      "created_at" => DB::raw("NOW()"),
                      "updated_at" => DB::raw("NOW()")
                  ],
              ]
          );

        DB::table("site_content_section_page")
          ->insert(
              [
                  [
                      "section_id" => 1,
                      "page_id"    => 2,
                      "sort_order" => 0,
                      "important"  => 0,
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
        Schema::dropIfExists("site_content");
        Schema::dropIfExists("site_content_section_page");
    }

}
