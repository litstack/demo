<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id')->from(100000);

            $table->unsignedBigInteger('user_id')->index();

            $table->string('provider');
            $table->float('subtotal');
            $table->float('amount');
            $table->float('shipping_price');
            $table->string('state');

            $table->string('billing_address_first_name')->nullable();
            $table->string('billing_address_last_name')->nullable();
            $table->string('billing_address_company')->nullable();
            $table->string('billing_address_street')->nullable();
            $table->string('billing_address_zip')->nullable();
            $table->string('billing_address_state')->nullable();
            $table->string('billing_address_city')->nullable();
            $table->string('billing_address_country')->nullable();

            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
