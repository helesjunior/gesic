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

            $table->foreignId('siorg_id')
                ->constrained()
                ->onDelete('cascade')
                ->comment('Siorg foreign key');

            $table->foreignId('unit_id')
                ->constrained()
                ->onDelete('cascade')
                ->comment('Unit foreign key');

            $table->bigInteger('father_id')->nullable();
            $table->string('code')->unique();
            $table->string('short_description');
            $table->string('description');
            $table->boolean('status')->default(true);

            $table->timestamps();
            $table->softDeletes()->comment('Deletion date and time');

            $table->foreign('father_id')->references('id')->on('uorgs')->onDelete('cascade');
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
