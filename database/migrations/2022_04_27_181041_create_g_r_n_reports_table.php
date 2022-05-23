<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGRNReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('g_r_n_reports', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('unit_id');
            $table->integer('material_id');
            $table->integer('sub_material_id');
            $table->integer('vendor_id');
            $table->integer('qty');
            $table->integer('vol_per_unit');
            $table->string('grn_date');
            $table->string('grn_note');
            $table->boolean('read_status');
            $table->boolean('edit_status');
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
        Schema::dropIfExists('g_r_n_reports');
    }
}
