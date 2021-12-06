<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->string("first_team");
            $table->string("second_team");
            $table->string("prediction")->nullable();
            $table->string("date");
            $table->string("day");
            $table->string("hour");
            $table->string("minutes");
            $table->integer("published_fixtures_id");
            $table->string("first_team_odds");
            $table->string("second_team_odds");
            $table->string("draw_odds");
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
        Schema::dropIfExists('fixtures');
    }
}
