<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')
                ->constrained()
                ->onDelete('cascade')
                ->comment('Organ foreign key');

            $table->foreignId('country_id')
                ->constrained()
                ->onDelete('cascade')
                ->comment('Country foreign key');

            $table->foreignId('state_id')
                ->constrained()
                ->onDelete('cascade')
                ->comment('State foreign key');

            $table->foreignId('city_id')
                ->constrained()
                ->onDelete('cascade')
                ->comment('City foreign key');

            $table->string('code')->unique();
            $table->string('short_description');
            $table->string('description');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('address');
            $table->string('zipcode');
            $table->decimal('meters_size');
            $table->boolean('status')->default(true);

            $table->timestamps();
            $table->softDeletes()->comment('Deletion date and time');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buildings');
    }
}
