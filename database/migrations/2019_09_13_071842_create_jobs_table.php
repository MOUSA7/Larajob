<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('company_id');
            $table->integer('category_id');
            $table->string('position');
            $table->string('address');
            $table->string('slug');
            $table->string('type');
            $table->integer('status');
            $table->date('last_date');
            $table->string('title');
            $table->string('content');
            $table->integer('price');
            $table->string('description');
            $table->text('roles');

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
        Schema::dropIfExists('jobs');
    }
}
