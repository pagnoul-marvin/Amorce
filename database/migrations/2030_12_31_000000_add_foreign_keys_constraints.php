<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('task_users', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
        });

        Schema::table('donations', function (Blueprint $table) {
            $table->foreign('fund_id')->references('id')->on('funds')->onDelete('cascade');
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('from_fund_id')->references('id')->on('funds')->onDelete('cascade');
            $table->foreign('to_fund_id')->references('id')->on('funds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('user_id');
        });

        Schema::table('task_users', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('task_id');
        });

        Schema::table('donations', function (Blueprint $table) {
            $table->dropForeign('fund_id');
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign('from_fund_id');
            $table->dropForeign('to_fund_id');
        });
    }
};

