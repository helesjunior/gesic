<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiorgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siorgs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organ_id')
                ->constrained()
                ->onDelete('cascade')
                ->comment('Organ foreign key');
            $table->bigInteger('father_id')->nullable();
            $table->string('code')->unique();
            $table->string('short_description');
            $table->string('description');
            $table->boolean('status')->default(true);

            $table->timestamps();
            $table->softDeletes()->comment('Deletion date and time');

            $table->foreign('father_id')->references('id')->on('siorgs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siorgs');
    }
}
