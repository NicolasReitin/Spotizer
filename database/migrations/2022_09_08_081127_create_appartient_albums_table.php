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
        Schema::create('appartient_albums', function (Blueprint $table) {
            $table->id();
            $table->string('numero_piste')
                ->nullable();
            $table->foreignId(column: 'album_id')->constrained(table: 'album')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId(column: 'version_morceau_id')->constrained(table: 'version_morceau')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('appartient_albums');
    }
};
