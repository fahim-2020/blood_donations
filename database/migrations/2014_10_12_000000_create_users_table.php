<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile');
            $table->string('age');
            $table->string('weight');
            $table->date('dob');
            $table->bigInteger('gender_id')->nullable()->unsigned();
            $table->bigInteger('city_id')->nullable()->unsigned();
            $table->bigInteger('addicted_id')->nullable()->unsigned();
            $table->bigInteger('smoking_id')->nullable()->unsigned();
            $table->bigInteger('group_id')->nullable()->unsigned();
            $table->date('last_don')->nullable();
            $table->string('image');
            $table->tinyinteger('user_type')->default(0)->comments('0=user, 1=admin');
            $table->tinyinteger('status')->default(1)->comments('1= active, 0=inactive');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
         Schema::table('users', function (Blueprint $table){
            $table->dropColumn(['gender_id','city_id','addicted_id','smoking_id','group_id']);
            $table->dropForeign(['gender_id','city_id','addicted_id','smoking_id','group_id']);
        });
    }
}
