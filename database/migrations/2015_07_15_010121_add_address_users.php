<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address', 50)->default('');
            $table->string('number', 10)->default('');
            $table->string('neigbh', 30)->default('');
            $table->string('city', 30)->default('');
            $table->string('state', 2)->default('');
            $table->string('zip', 10)->default('');
            $table->string('phone', 15)->default('');
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
            $table->removeColumn('address');
            $table->removeColumn('number');
            $table->removeColumn('neigbh');
            $table->removeColumn('city');
            $table->removeColumn('state');
            $table->removeColumn('zip');
            $table->removeColumn('phone');
        });
    }
}
