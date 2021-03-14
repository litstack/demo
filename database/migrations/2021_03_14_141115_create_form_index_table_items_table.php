<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormIndexTableItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_index_table_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('state');
            $table->text('html_text');
            $table->integer('money');
            $table->boolean('active');
            $table->integer('progress');
            $table->string('user_id');
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
        Schema::dropIfExists('form_index_table_items');
    }
}
