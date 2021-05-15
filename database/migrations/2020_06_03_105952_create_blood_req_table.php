<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodReqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_req', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('age');
            $table->string('your_name');
            $table->string('unit');
            $table->date('date');
            $table->string('hospital');
            $table->string('disease');
            $table->bigInteger('gender')->nullable()->unsigned();
            $table->bigInteger('city')->nullable()->unsigned();
            $table->bigInteger('group')->nullable()->unsigned();
            $table->tinyinteger('status')->default(1)->comments('1= active, 0=inactive');
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
        Schema::dropIfExists('blood_req');
        Schema::table('blood_req', function (Blueprint $table){
            $table->dropColumn(['gender','city','group']);
            $table->dropForeign(['gender','city','group']);
        });
    }
}
