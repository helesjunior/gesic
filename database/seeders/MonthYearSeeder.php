<?php

namespace Database\Seeders;

use App\Models\MonthYear;
use Illuminate\Database\Seeder;

class MonthYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $year_initial = date('Y', strtotime('-20 year'));
        $year_final = date('Y', strtotime('+50 year'));

        $months = [
            'JAN',
            'FEV',
            'MAR',
            'ABR',
            'MAI',
            'JUN',
            'JUL',
            'AGO',
            'SET',
            'OUT',
            'NOV',
            'DEZ',
        ];

        $array_month_year = [];
        for ($year_initial; $year_initial < $year_final; $year_initial++) {
            foreach ($months as $key => $value) {
                $array_month_year[] = [
                    'description' => $value . '/' . $year_initial,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
            }
        }

        MonthYear::insert($array_month_year);
    }
}
