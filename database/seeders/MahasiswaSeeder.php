<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Flynsarmy\CsvSeeder\CsvSeeder;

class MahasiswaSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->table = 'mahasiswa';
        $this->filename = base_path().'/database/seeds/csvs/datamhs_pilketum.csv';
        $this->mapping = [
            1 => 'nim',
        ];
        $this->csv_delimiter = ';';
        $this->offset_rows = 1; 
        $this->timestamps = true;
    }

    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::disableQueryLog();

        parent::run();
    }
}
