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
        Schema::create('genre_albums', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'genre_id')->constrained(table: 'genres')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId(column: 'album_id')->constrained(table: 'albums')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('genre_albums');
    }
};
