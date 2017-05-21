<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('people', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('surname');
          $table->string('id_no', 13);
          $table->string('mobile', 10);
          $table->date('birth_date');
          $table->string('language');
          $table->string('interest');
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
        Schema::dropIfExists('people');
    }
}
