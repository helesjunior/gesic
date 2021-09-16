<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_statements', function (Blueprint $table) {
            $table->id();

            $table->foreignId('rubric_id')
                ->constrained()
                ->onDelete('cascade')
                ->comment('Rubric foreign key');

            $table->foreignId('month_year_id')
                ->constrained('month_years')
                ->onDelete('cascade')
                ->comment('Month Year foreign key');

            $table->bigInteger('people_id')->nullable();

            $table->string('indicator');
            $table->decimal('amount');

            $table->timestamps();
            $table->softDeletes()->comment('Deletion date and time');

            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');

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
        Schema::dropIfExists('financial_statements');
    }
}
