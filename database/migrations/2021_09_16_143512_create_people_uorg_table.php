<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleUorgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_uorg', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('people_id')->nullable();

            $table->foreignId('uorg_id')
                ->constrained()
                ->onDelete('cascade')
                ->comment('Uorg foreign key');

            $table->foreignId('month_year_id')
                ->constrained('month_years')
                ->onDelete('cascade')
                ->comment('Month Year foreign key');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people_uorg');
    }
}
