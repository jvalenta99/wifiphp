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
            'veranAufschrift' => 'Fussballrunde 2 Stunden bis zum unfallen',
            'veranDetailtext' => 'Wer treffen uns bei der Pizzeria "Bei der scharfzüngingen Schwiegermutter"',
            'veranVon' => '1963-04-20 12:00:00',
            'veranBis' => '1963-04-20 14:00:00',
            'veranLand_FK' => '1',
            'veranStadt_FK' => '1',
            'veranSportart_FK' => '1',
            'veranOrganisator_FK' => '3',
            'veranMinstaerke' => '3',
            'veranMaxstaerke' => '7',
            'veranBewerbungBis' => '1963-04-20',
            'veranAdresse' => 'Tokiostrasse 7, 1220 Wien',
            'veranMaxTeilnehmer' => '10',
        ]);

        DB::table('sportveranstaltungen')->insert([
            'veranAufschrift' => 'Schachturnier 8 Runden',
            'veranDetailtext' => 'Es wird 8 Runden gespielt, Schweizersystem, Elo 1900 bis 2100',
            'veranVon' => '1964-04-20 17:00:00',
            'veranBis' => '1964-04-20 18:00:00',
            'veranLand_FK' => '1',
            'veranStadt_FK' => '2',
            'veranSportart_FK' => '2',
            'veranOrganisator_FK' => '3',
            'veranMinstaerke' => '3',
            'veranMaxstaerke' => '7',
            'veranBewerbungBis' => '1966-04-20',
            'veranAdresse' => 'Tokiostrasse 12, 1220 Wien',
            'veranMaxTeilnehmer' => '10',
        ]);

        DB::table('sportveranstaltungen')->insert([
            'veranAufschrift' => 'Eine kleine Fussballrunde',
            'veranDetailtext' => 'Maximal 20 Teilnehmer, 2x 20 min, bitte vorsichtig spielen!',
            'veranVon' => '1965-04-20 19:00:00',
            'veranBis' => '1965-04-20 20:00:00',
            'veranLand_FK' => '1',
            'veranStadt_FK' => '1',
            'veranSportart_FK' => '1',
            'veranOrganisator_FK' => '6',
            'veranMinstaerke' => '3',
            'veranMaxstaerke' => '7',
            'veranBewerbungBis' => '1964-04-20',
            'veranAdresse' => 'Tokiostrasse 7, 1220 Wien',
            'veranMaxTeilnehmer' => '10',
        ]);

        DB::table('sportveranstaltungen')->insert([
            'veranAufschrift' => 'Grosse Fussballrunde',
            'veranDetailtext' => 'Kleine Tore, max. 4 gegen 4 mit Auswechslung',
            'veranVon' => '1966-04-20 20:00:00',
            'veranBis' => '1966-04-20 21:00:00',
            'veranLand_FK' => '1',
            'veranStadt_FK' => '1',
            'veranSportart_FK' => '1',
            'veranOrganisator_FK' => '6',
            'veranMinstaerke' => '3',
            'veranMaxstaerke' => '7',
            'veranBewerbungBis' => '1966-04-20',
            'veranAdresse' => 'Tokiostrasse 7, 1220 Wien',
            'veranMaxTeilnehmer' => '10',
        ]);

        DB::table('sportveranstaltungen')->insert([
            'veranAufschrift' => 'Fussbal Jugendturnier',
            'veranDetailtext' => '3er Teams gegeneinander',
            'veranVon' => '2020-04-20 20:00:00',
            'veranBis' => '2021-04-20 21:00:00',
            'veranLand_FK' => '1',
            'veranStadt_FK' => '1',
            'veranSportart_FK' => '1',
            'veranOrganisator_FK' => '6',
            'veranMinstaerke' => '3',
            'veranMaxstaerke' => '7',
            'veranBewerbungBis' => '1966-04-20',
            'veranAdresse' => 'Tokiostrasse 7, 1220 Wien',
            'veranMaxTeilnehmer' => '30',
        ]);

        DB::table('sportveranstaltungen')->insert([
            'veranAufschrift' => 'Alt gegen jung',
            'veranDetailtext' => 'Erfahrung gegen Kondition, wir wollen es wissen!',
            'veranVon' => '2022-04-20 20:00:00',
            'veranBis' => '2023-04-20 21:00:00',
            'veranLand_FK' => '1',
            'veranStadt_FK' => '1',
            'veranSportart_FK' => '1',
            'veranOrganisator_FK' => '5',
            'veranMinstaerke' => '3',
            'veranMaxstaerke' => '7',
            'veranBewerbungBis' => '1966-04-20',
            'veranAdresse' => 'Tokiostrasse 7, 1220 Wien',
            'veranMaxTeilnehmer' => '20',
        ]);
    }
}
