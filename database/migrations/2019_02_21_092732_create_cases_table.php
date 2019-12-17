<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->increments('case_id');
            $table->string('case_title');
            $table->string('case_nature');
            $table->string('court_name');
            $table->string('reference');
            $table->date('previous_date');
            $table->date('next_date');
            $table->string('case_status');
            $table->integer('amount');
            $table->integer('fk_user_id');
            $table->integer('fk_client_id');
            $table->softDeletes();
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
        Schema::dropIfExists('cases');
    }
}
