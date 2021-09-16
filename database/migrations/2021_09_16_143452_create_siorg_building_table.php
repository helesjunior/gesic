<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiorgBuildingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siorg_building', function (Blueprint $table) {
            $table->id();

            $table->foreignId('siorg_id')
                ->constrained()
                ->onDelete('cascade')
                ->comment('Siorg foreign key');

            $table->foreignId('building_id')
                ->constrained()
                ->onDelete('cascade')
                ->comment('Building foreign key');

            $table->foreignId('month_year_id')
                ->constrained('month_years')
                ->onDelete('cascade')
                ->comment('Month Year foreign key');

            $table->decimal('occupation_footage');
            $table->integer('number_employees');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siorg_building');
    }
}
