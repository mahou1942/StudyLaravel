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
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id')->comment('用戶ID');
                $table->string('name', 50)->comment('用戶名稱');
                $table->string('account', 50)->unique()->comment('帳號');
                $table->string('passwd', 50)->comment('密碼');
                $table->string('address', 250)->nullable()->comment('地址');
                $table->boolean('valid')->default(true)->comment('是否有效');
                $table->timestamps($precision = 0);
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
        Schema::dropIfExists('users');
    }
};
