<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HatoslottoSeeder extends Seeder
{
    public function run()
    {
        // A fájlok a storage/app mappában vannak
        $this->loadFileToTable(storage_path('app/huzas.txt'), 'huzas', ['id', 'ev', 'het']);
        $this->loadFileToTable(storage_path('app/huzott.txt'), 'huzott', ['id', 'huzasid', 'szam']);
        $this->loadFileToTable(storage_path('app/nyeremeny.txt'), 'nyeremeny', ['id', 'huzasid', 'talalat', 'darab', 'ertek']);
    }

    private function loadFileToTable($filename, $table, $columns)
    {
        if (!file_exists($filename)) {
            $this->command->error("❌ A fájl nem található: $filename");
            return;
        }

        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        array_shift($lines); // első sor fejléc, kihagyjuk

        foreach ($lines as $line) {
            $data = explode("\t", trim($line)); // TAB szeparált adat
            if (count($data) === count($columns)) {
                $record = array_combine($columns, $data);
                DB::table($table)->insert($record);
            } else {
                $this->command->warn("⚠️ Hibás sor kihagyva a(z) $table táblában: $line");
            }
        }

        $this->command->info("✅ Sikeresen feltöltve: $table (" . count($lines) . " sor)");
    }
}
