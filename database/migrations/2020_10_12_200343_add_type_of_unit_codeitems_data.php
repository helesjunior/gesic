<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeOfUnitCodeitemsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $code = \App\Models\Code::create([
            'description' => 'Tipo Unidades',
            'is_visible' => false
        ]);

        $code_items = \App\Models\CodeItem::create([
            'code_id' => $code->id,
            'short_description' => 'E',
            'description' => 'Gestora Executora',
            'is_visible' => true
        ]);

        $code_items = \App\Models\CodeItem::create([
            'code_id' => $code->id,
            'short_description' => 'C',
            'description' => 'Controle',
            'is_visible' => true
        ]);

        $code_items = \App\Models\CodeItem::create([
            'code_id' => $code->id,
            'short_description' => 'S',
            'description' => 'Setorial Contábil',
            'is_visible' => true
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \App\Models\Code::where([
            'description' => 'Type of creditors',
            'is_visible' => false
        ])->forceDelete();
    }
}
