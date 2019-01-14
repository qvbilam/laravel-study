<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHighSpeedMacPoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('high_speed_mac_pools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mac_id', 40)->default('')->comment('mac_id');
            $table->string('sn',40)->default('')->comment('sn');
            $table->string('car_number',20)->default('')->comment('车次');
            $table->string('car_riage',20)->default('')->comment('车厢');
            $table->string('position',10)->default('')->comment('位置');
            $table->integer('status')->default(0)->comment('设备是否在线:0不在,1在线');
            $table->string('remarks',255)->default('')->comment('备注');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('high_speed_mac_pools');
    }
}
