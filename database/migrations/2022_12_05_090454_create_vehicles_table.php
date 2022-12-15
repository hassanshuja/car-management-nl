<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('plate_no');
            $table->string('brand');
            $table->string('type');
            $table->string('apk');
            $table->string('first_registeration');
            $table->string('last_ascription');
            $table->string('engine_capacity');
            $table->string('fuel');
            $table->string('bought_from');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('whatsapp');
            $table->string('purchase_amount');
            $table->string('remainder_amount');
            $table->string('remainder_instrument');
            $table->string('vehicle_status');
            $table->string('payment_status');
            $table->string('comment');
            $table->string('sold_name')->nullable();;
            $table->string('sold_amount')->nullable();;
            $table->string('sold_payment_status')->nullable();;
            $table->string('sold_comment')->nullable();;
            $table->string('sold_status')->nullable();;
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
