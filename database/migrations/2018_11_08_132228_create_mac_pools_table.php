<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMacPoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('macpool', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('自增id');
            $table->string('mac_id', 40)->default('')->comment('mac_id');
            $table->integer('pid')->default(0)->comment('生产商ID');
            $table->integer('status')->default(1)->comment('设备状态：1.未测试，2.已测试，3.已激活，4.已使用，5.已禁用，6.已销毁');
            $table->string('sn',40)->default('')->comment('sn');
            $table->string('imei',40)->default('')->comment('imei');
            $table->string('mini_app_code',100)->default('')->comment('mini_app_code');
            $table->string('iccid',100)->default('')->comment('iccid');
            $table->string('remarks',255)->default('')->comment('备注');
            $table->timestamps();
            $table->softDeletes();
            $table->index('mac_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mac_pools');
    }
}
