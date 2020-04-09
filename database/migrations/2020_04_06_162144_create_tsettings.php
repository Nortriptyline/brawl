<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTsettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tsettings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tournament_id');
            $table->smallInteger('size')->nullable();
            $table->tinyInteger('team_size')->nullable();
            $table->enum('genre', ['male', 'female', 'mixed'])->nullable();
            $table->enum('field', ['indoor', 'beach', 'grass', 'snow'])->nullable();
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
        Schema::dropIfExists('tsettings');
    }
}
