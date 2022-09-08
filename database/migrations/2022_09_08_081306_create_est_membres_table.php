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
        Schema::create('est_membres', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'artiste_id')->constrained(table: 'artiste')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId(column: 'groupe_id')->constrained(table: 'groupe')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('est_membres');
    }
};
