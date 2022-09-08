<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contient_morceaus', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'playlist_id')->constrained(table: 'playlists')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId(column: 'version_morceau_id')->constrained(table: 'version_morceaus')->onUpdate('cascade')->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contient_morceaus');
    }
};
