<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('title',150);
            $table->string('title_en',150);
            $table->string('sous_title', 150)->nullable();
            $table->string('sous_title_en', 150)->nullable();
            $table->string('paragraphe', 250)->nullable();
            $table->string('paragraphe_en', 250)->nullable();
            $table->string('lien', 255)->nullable();
            $table->string('bg', 20);
            $table->string('image', 250);
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
        Schema::dropIfExists('sliders');
    }
}
