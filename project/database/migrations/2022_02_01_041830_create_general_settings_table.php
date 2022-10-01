<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->decimal('deposit_max_amount');
            $table->decimal('deposit_min_amount');
            $table->decimal('transfer_max_amount');
            $table->decimal('transfer_min_amount');
            $table->decimal('withdraw_max_amount');
            $table->decimal('withdraw_min_amount');
            $table->decimal('deposit_charge');
            $table->decimal('transfer_charge');
            $table->decimal('withdraw_charge');
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
        Schema::dropIfExists('general_settings');
    }
}
