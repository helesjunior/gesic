<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUorgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uorgs', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('siorg_id')->nullable();
            $table->bigInteger('unit_id')->nullable();
            $table->bigInteger('father_id')->nullable();
            $table->string('code')->unique();
            $table->string('short_description')->nullable();
            $table->string('description')->nullable();
            $table->boolean('status')->default(true);

            $table->timestamps();
            $table->softDeletes()->comment('Deletion date and time');

            $table->foreign('father_id')->references('id')->on('uorgs')->onDelete('cascade');
            $table->foreign('siorg_id')->references('id')->on('siorgs')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uorgs');
    }
}
