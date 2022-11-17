<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHomepagesTables extends Migration
{
    public function up()
    {
        Schema::create('homepages', function (Blueprint $table) {
            createDefaultTableFields($table);
        });

        Schema::create('homepage_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'homepage');

            $table->string('title', 200)->nullable();

            $table->text('description')->nullable();

            $table->string('seo_title')->nullable();

            $table->string('seo_description')->nullable();
        });

        Schema::create('homepage_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'homepage');
        });

        Schema::create('homepage_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'homepage');
        });
    }

    public function down()
    {
        Schema::dropIfExists('homepage_revisions');
        Schema::dropIfExists('homepage_translations');
        Schema::dropIfExists('homepage_slugs');
        Schema::dropIfExists('homepages');
    }
}
