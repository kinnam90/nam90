<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id',true);
            $table->string('lastname', 255);
            $table->string('firstname', 255);
            $table->string('middlename', 255);
            $table->string('address', 120);
            $table->string('picture', 60);

            $table->integer('age')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->integer('division_id')->unsigned();

            $table->date('birthdate');
            $table->date('date_hired');
            

            $table->foreign('department_id')->references('id')->on('department');
            $table->foreign('division_id')->references('id')->on('division');

            $table->char('zip', 10);
            $table->timestamps();
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
        Schema::dropIfExists('employees');
    }
}
