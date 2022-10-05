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
        Schema::create('manufactures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sales_name')->nullable();
            $table->string('sales_phone')->nullable();
            $table->string('sales_email')->nullable();
            $table->string('techsupport_name')->nullable();
            $table->string('techsupport_phone')->nullable();
            $table->string('techsupport_email')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('manufactures');
    }
};
