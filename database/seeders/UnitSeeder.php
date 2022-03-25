<?php

namespace Database\Seeders;

use App\Integrations\SiorgWS;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $higher_organ = \App\Models\HigherOrgan::create([
            'code' => '63000',
            'name' => 'Advocacia-Geral da União',
            'status' => true
        ]);

        $organ = \App\Models\Organ::create([
            'higher_organ_id' => $higher_organ->id,
            'code' => '63000',
            'code_siorg' => '46',
            'name' => 'Advocacia-Geral da União',
            'status' => true
        ]);

        \App\Models\Unit::create([
            'organ_id' => $organ->id,
            'siafi_code' => '110161',
            'siasg_code' => '110161',
            'siorg_code' => '112996',
            'description' => 'Superintendência de Administração no Distrito Federal',
            'short_name' => 'SAD/DF',
            'currency_id' => 1,
            'type_id' => \App\Models\CodeItem::TYPE_UNIT_EXECUTING_MANAGEMENT
        ]);

        \App\Models\Unit::create([
            'organ_id' => $organ->id,
            'siafi_code' => '110096',
            'siasg_code' => '110096',
            'siorg_code' => '56851',
            'description' => 'Superintendência de Administração em Pernambuco',
            'short_name' => 'SAD/PE',
            'currency_id' => 1,
            'type_id' => \App\Models\CodeItem::TYPE_UNIT_EXECUTING_MANAGEMENT
        ]);

        \App\Models\Unit::create([
            'organ_id' => $organ->id,
            'siafi_code' => '110062',
            'siasg_code' => '110062',
            'siorg_code' => '70917',
            'description' => 'Diretoria de Gestão de Pessoas',
            'short_name' => 'DGEP',
            'currency_id' => 1,
            'type_id' => \App\Models\CodeItem::TYPE_UNIT_EXECUTING_MANAGEMENT
        ]);

        $siorgws = new SiorgWS;
        $siorgws->index($organ->code_siorg, $organ->id);
    }
}
