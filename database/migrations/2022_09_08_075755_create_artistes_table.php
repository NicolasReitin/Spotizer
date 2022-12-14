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
        Schema::create('artistes', function (Blueprint $table) {
            $table->id();
            $table->string('pseudo')
                ->index()
                ->nullable();
            $table->string('name')
                ->index()
                ->nullable();
            $table->string('first_name')
                ->nullable();
            $table->date('date_naissance')
                ->nullable();
            $table->date('date_deces')
                ->nullable();
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
        Schema::dropIfExists('artistes');
    }
};
