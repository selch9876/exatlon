<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contestants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('1on1win');
            $table->integer('1on1lost');
            $table->integer('group1win');
            $table->integer('group1lost');
            $table->integer('group05win');
            $table->integer('group05lost');
            $table->integer('personalwin');
            $table->integer('personallost');
            $table->integer('symbolwin');
            $table->integer('symbollost');
            $table->integer('nationalwin');
            $table->integer('nationallost');
            $table->integer('played');
            $table->integer('win');
            $table->integer('lost');
            $table->integer('percentage');
            $table->string('country');
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
        Schema::dropIfExists('contestants');
    }
}
