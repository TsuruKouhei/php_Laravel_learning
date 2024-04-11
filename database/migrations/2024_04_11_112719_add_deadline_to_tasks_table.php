<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            // deadlineカラムを追加。NULLを許容するdateTime型です。
            $table->dateTime('deadline')->nullable();
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            // ロールバック時にdeadlineカラムを削除。
            $table->dropColumn('deadline');
        });
    }
};
