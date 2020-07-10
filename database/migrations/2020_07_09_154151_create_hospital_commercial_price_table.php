<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalCommercialPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_commercial_price', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('insurance_id')->constrained();
            $table->foreignId('procedure_code_id')->contstrained();
            $table->foreignId('hospital_id')->constrained();
            $table->decimal('price',10,2);
            $table->decimal('network_price',10,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospital_commercial_price');
    }
}
