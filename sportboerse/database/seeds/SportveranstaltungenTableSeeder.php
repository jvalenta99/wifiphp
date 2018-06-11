<?php

use Illuminate\Database\Seeder;

class SportveranstaltungenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sportveranstaltungen')->insert([
            'veranAufschrift' => 'Kleine Fussballrunde',
            'veranDetailtext' => 'Es wird super,Es wird super,Es wird super,Es wird super,',
            'veranVon' => '1963-04-20 00:00:00',
            'veranTo' => '1963-04-20 00:00:00',
            'veranLand_FK' => '1',
            'veranStadt_FK' => '1',
            'veranSportart_FK' => '1',
            'veranOrganisator_FK' => '3',
            'veranMinstaerke' => '3',
            'veranMaxstaerke' => '7',
            'veranBewerbungBis' => '1963-04-20',
            'veranAdresse' => 'Tokiostrasse 7, 1220 Wien',
        ]);

        DB::table('sportveranstaltungen')->insert([
            'veranAufschrift' => 'Kleine Fussballrunde',
            'veranDetailtext' => 'Es wird super,Es wird super,Es wird super,Es wird super,',
            'veranVon' => '1964-04-20 00:00:00',
            'veranTo' => '1964-04-20 00:00:00',
            'veranLand_FK' => '1',
            'veranStadt_FK' => '1',
            'veranSportart_FK' => '1',
            'veranOrganisator_FK' => '3',
            'veranMinstaerke' => '3',
            'veranMaxstaerke' => '7',
            'veranBewerbungBis' => '1966-04-20',
            'veranAdresse' => 'Tokiostrasse 7, 1220 Wien',
        ]);

        DB::table('sportveranstaltungen')->insert([
            'veranAufschrift' => 'Kleine Fussballrunde',
            'veranDetailtext' => 'Es wird super,Es wird super,Es wird super,Es wird super,',
            'veranVon' => '1965-04-20 00:00:00',
            'veranTo' => '1965-04-20 00:00:00',
            'veranLand_FK' => '1',
            'veranStadt_FK' => '1',
            'veranSportart_FK' => '1',
            'veranOrganisator_FK' => '3',
            'veranMinstaerke' => '3',
            'veranMaxstaerke' => '7',
            'veranBewerbungBis' => '1964-04-20',
            'veranAdresse' => 'Tokiostrasse 7, 1220 Wien',
        ]);

        DB::table('sportveranstaltungen')->insert([
            'veranAufschrift' => 'Kleine Fussballrunde',
            'veranDetailtext' => 'Es wird super,Es wird super,Es wird super,Es wird super,',
            'veranVon' => '1966-04-20 00:00:00',
            'veranTo' => '1966-04-20 00:00:00',
            'veranLand_FK' => '1',
            'veranStadt_FK' => '1',
            'veranSportart_FK' => '1',
            'veranOrganisator_FK' => '3',
            'veranMinstaerke' => '3',
            'veranMaxstaerke' => '7',
            'veranBewerbungBis' => '1966-04-20',
            'veranAdresse' => 'Tokiostrasse 7, 1220 Wien',
        ]);
    }
}
