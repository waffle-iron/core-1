<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triage_article', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("category_id")->nullable();
            $table->string("title", 100);
            $table->text("content");
            $table->boolean("is_visible")->default(1);
            $table->boolean("is_public")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('triage_article');
    }
}
