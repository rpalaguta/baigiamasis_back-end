<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'name' => 'Slyvų užkalbėtojas',
            'description' => 'Nebevalit tavo slyvacoinas? Chabra bado pirštais ir šaukia nėra dūmų - nėra galios? Nenusimink! Męs galim tau padėt! Privairuok savo mazhutę pas mus ir kranai bus atsukti!!',
            'user_id' => '3',
            'category_id' => '1',
        ]);
        DB::table('services')->insert([
            'name' => 'Žibintų poliravimas',
            'description' => 'Faros užkerpėjo taip, kad naktį nieko nesimato? Policija grasina atimt technikinę? Atvaryk savo laužą ir nublizginsim faras kad blizgėtų kaip šunio ...dalykai!',
            'user_id' => '2',
            'category_id' => '1',
        ]);
        DB::table('services')->insert([
            'name' => 'Kompiuterių priežiūra',
            'description' => 'Virusų šalinimas, OS perrašymas, duomenų atstatymas, remontas',
            'user_id' => '5',
            'category_id' => '2',
        ]);
        DB::table('services')->insert([
            'name' => 'Pilnas IT valdymas',
            'description' => 'Jūs galite ramiai ir be streso dirbti, žinodami, kad yra tinkamai pasirūpinta visa Jūsų IT infrastruktūra. Jei iškyla problema, nesvarbu, su kuo tai susiję: negalite dirbti kompiuteriu, sulėtėjęs prisijungimas prie serverio, nėra interneto, paskambino ryšio tiekėjas ir pagrasino atjungti internetą, nes iš Jūsų įmonės tinklo plinta virusai (nenustebkite, ko gero, tai Jūsų darbuotojas atsinešė į darbą savo virusais užkrėstą išmanųjį telefoną ir prijungė prie įmonės tinklo). Jums nereikės gaišti laiko ir aiškintis, dėl ko taip yra ir kur yra tikroji problema - atsakomybę prisiimame mes už visą IT infrastruktūros priežiūrą ir tinkamą veikimą. Mes išaiškiname priežastį ir ją pašaliname kaip įmanoma greičiau. Kompiuteriai, mobilieji telefonai, serveriai, tinklo, periferinė ir kita IT įranga - viskas glaudžiai susiję, todėl, patikėję tai "vienoms rankoms", būsite užtikrinti, kad iškilusios problemos bus sprendžiamos labai greitai, o  prevenciniai veiksmai, kuriuos atliekame, užtikrins, kad kritinės reikšmės sistemos veiks be priekaištų ir  Jūsų darbas nesustos.',

            'user_id' => '4',
            'category_id' => '2',
        ]);
        DB::table('services')->insert([
            'name' => 'Šarvuotos durys',
            'description' => 'Šarvuotų durų gamyba',
            'user_id' => '2',
            'category_id' => '3',
        ]);
        DB::table('services')->insert([
            'name' => 'Metalinių konstrukcijų gamyba',
            'description' => 'Įvarių metalinių konstrukcijų gamyba pagal užsakymą',
            'user_id' => '5',
            'category_id' => '3',
        ]);

    }

}
