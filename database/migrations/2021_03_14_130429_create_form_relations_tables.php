<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormRelationsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_relations', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->nullableMorphs('relationable');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });

        Schema::create('form_relation_order', function (Blueprint $table) {
            $table->string('form_relation_id');
            $table->string('order_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_relations');
        Schema::dropIfExists('form_relation_order');
    }
}
