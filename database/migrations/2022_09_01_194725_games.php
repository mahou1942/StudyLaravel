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
        if (!Schema::hasTable('games')) {
            Schema::create('games', function (Blueprint $table) {
                $table->increments('id')->comment('遊戲ID');
                $table->string('game_name', 100)->comment('遊戲名稱');
                $table->unsignedInteger('price')->comment('遊戲價格')->default(0);
                $table->boolean('valid')->default(true)->comment('是否有效');
                $table->timestamps($precision = 0);
                // 建立索引
                $table->index('game_name');
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
        Schema::dropIfExists('games');
    }
};
