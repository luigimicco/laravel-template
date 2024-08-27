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
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->after('name');
            $table->boolean('active')->default(false)->after('id');
            $table->enum('level',  ['user', 'manager', 'admin'])->after('email')->default('user')->after('password');
            $table->string('image', 50)->default("")->after('level');
            $table->timestamp('last_login')->after('updated_at')->nullable();
            $table->text('note')->nullable()->after('level');
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('active');
            $table->dropColumn('level');
            $table->dropColumn('image');
            $table->dropColumn('last_login');
            $table->dropColumn('note');
            $table->dropSoftDeletes();
        });
    }
};
