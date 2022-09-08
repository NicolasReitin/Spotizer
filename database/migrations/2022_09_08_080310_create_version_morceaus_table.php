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
        Schema::create('version_morceaus', function (Blueprint $table) {
            $table->id();
            $table->string('titre')
                ->index();
            $table->integer('duree_secondes')
                ->index();
            $table->string('filepath');
            $table->string('extension');
            $table->foreignId(column: 'morceau_id')->constrained(table: 'morceaus')->onUpdate('cascade')->onDelete('cascade');           
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
        Schema::dropIfExists('version_morceaus');
    }
};
