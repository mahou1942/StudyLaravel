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
        if (!schema::hasTable('game_shop_list')) {
            schema::create('game_shop_list', function (Blueprint $table) {
                $table->increments('id')->comment('購買編號');
                $table->unsignedBigInteger('order_id')->comment('訂單編號');
                // $table->string('game_name', 100)->comment('遊戲名稱');
                $table->unsignedInteger('game_id')->comment('遊戲ID');
                $table->unsignedInteger('user_id')->comment('用戶ID');
                $table->timestamps($precision = 0);

                // 建立索引
                $table->index(['order_id', 'game_id', 'user_id']);

                // 建立外來鍵
                $table->foreign('game_id')->references('id')->on('games')->onUpdate('cascade')->onDelete('restrict');
                $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_shop_list');
    }
};
