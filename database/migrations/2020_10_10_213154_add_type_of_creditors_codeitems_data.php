<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeOfCreditorsCodeitemsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $code = \App\Models\Code::create([
            'description' => 'Tipo Fornecedor',
            'is_visible' => false
        ]);

        $code_items = \App\Models\CodeItem::create([
            'code_id' => $code->id,
            'short_description' => '1',
            'description' => 'Pessoa Jurídica',
            'is_visible' => true
        ]);

        $code_items = \App\Models\CodeItem::create([
            'code_id' => $code->id,
            'short_description' => '2',
            'description' => 'Pessoa Física',
            'is_visible' => true
        ]);

        $code_items = \App\Models\CodeItem::create([
            'code_id' => $code->id,
            'short_description' => '3',
            'description' => 'Id Genérico',
            'is_visible' => true
        ]);

        $code_items = \App\Models\CodeItem::create([
            'code_id' => $code->id,
            'short_description' => '4',
            'description' => 'Unidade Gestora',
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
