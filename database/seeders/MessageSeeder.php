<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Stringable;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'name' => 'Mario',
                'surname' => 'Rossi',
                'email' => 'mariorossi@gmail.com',
                'text' => 'Buongiorno, il vostro appartamento accetta i cani?',
                'apartment_id' => '1'
            ],
            [
                'name' => 'Luca',
                'surname' => 'Bianchi',
                'email' => 'lucabianchi@libero.it',
                'text' => 'Salve, quanto dista la vostra struttura dal centro?',
                'apartment_id' => '2'
            ],
            [
                'name' => 'Francesco',
                'surname' => 'Verdi',
                'email' => 'francescoverdi@yahoo.it',
                'text' => 'Buongiorno, quanto è grande la piscina?',
                'apartment_id' => '3'
            ],
            [
                'name' => 'Alice',
                'surname' => 'Neri',
                'email' => 'aliceneri@gmail.com',
                'text' => 'Salve, avete disponibilità per il prossimo weekend?',
                'apartment_id' => '4'
            ],
            [
                'name' => 'Giorgio',
                'surname' => 'Russo',
                'email' => 'giorgiorusso@gmail.com',
                'text' => 'Buongiorno, qual è il prezzo per una settimana a luglio?',
                'apartment_id' => '5'
            ],
            [
                'name' => 'Anna',
                'surname' => 'Ferrari',
                'email' => 'annaferrari@gmail.com',
                'text' => 'Ciao, c\'è il parcheggio incluso?',
                'apartment_id' => '6'
            ],
            [
                'name' => 'Luigi',
                'surname' => 'Bianco',
                'email' => 'luigibianco@libero.it',
                'text' => 'Buonasera, accettate prenotazioni last-minute?',
                'apartment_id' => '7'
            ],
            [
                'name' => 'Martina',
                'surname' => 'Gallo',
                'email' => 'martinagallo@libero.it',
                'text' => 'Salve, avete uno sconto per soggiorni lunghi?',
                'apartment_id' => '8'
            ],
            [
                'name' => 'Sara',
                'surname' => 'Rizzo',
                'email' => 'sararizzo@yahoo.it',
                'text' => 'Salve, avete un ristorante in loco?',
                'apartment_id' => '9'
            ],
            [
                'name' => 'Marco',
                'surname' => 'Romano',
                'email' => 'marcoromano@yahoo.it',
                'text' => 'Buongiorno, quali sono i servizi inclusi?',
                'apartment_id' => '10'
            ],
            [
                'name' => 'Giulia',
                'surname' => 'Costa',
                'email' => 'giuliacosta@yahoo.it',
                'text' => 'Ciao, c\'è una lavanderia self-service nelle vicinanze?',
                'apartment_id' => '11'
            ],
            [
                'name' => 'Antonio',
                'surname' => 'Greco',
                'email' => 'antoniogreco@yahoo.it',
                'text' => 'Buonasera, qual è la politica riguardo agli animali domestici?',
                'apartment_id' => '12'
            ],
            [
                'name' => 'Chiara',
                'surname' => 'Galli',
                'email' => 'chiaragalli@yahoo.it',
                'text' => 'Salve, avete uno sconto per gli ospiti frequenti?',
                'apartment_id' => '13'
            ],
            [
                'name' => 'Paola',
                'surname' => 'Moretti',
                'email' => 'paolamoretti@gmail.com',
                'text' => 'Salve, c\'è un parcheggio disponibile?',
                'apartment_id' => '14'
            ],
            [
                'name' => 'Luigi',
                'surname' => 'Conti',
                'email' => 'luigiconti@gmail.com',
                'text' => 'Buongiorno, quali attrazioni turistiche sono nelle vicinanze?',
                'apartment_id' => '15'
            ],
            [
                'name' => 'Maria',
                'surname' => 'Ferrari',
                'email' => 'mariaferrari@gmail.com',
                'text' => 'Salve, ci sono supermercati o negozi nelle vicinanze?',
                'apartment_id' => '16'
            ],
            [
                'name' => 'Andrea',
                'surname' => 'Barbieri',
                'email' => 'andreabarbieri@gmail.com',
                'text' => 'Buongiorno, accettate prenotazioni last-minute?',
                'apartment_id' => '17'
            ],
            [
                'name' => 'Laura',
                'surname' => 'Gentile',
                'email' => 'lauragentile@gmail.com',
                'text' => 'Ciao, avete uno spazio dedicato per lavorare?',
                'apartment_id' => '18'
            ],
            [
                'name' => 'Davide',
                'surname' => 'Marini',
                'email' => 'davidemarini@gmail.com',
                'text' => 'Salve, quali sono i servizi extra disponibili?',
                'apartment_id' => '19'
            ],
            [
                'name' => 'Valentina',
                'surname' => 'Russo',
                'email' => 'valentinarusso@gmail.com',
                'text' => 'Buongiorno, è possibile aggiungere un letto extra?',
                'apartment_id' => '20'
            ],
            [
                'name' => 'Roberto',
                'surname' => 'Mancini',
                'email' => 'robertomancini@gmail.com',
                'text' => 'Salve, accettate animali?',
                'apartment_id' => '21'
            ],
            [
                'name' => 'Martina',
                'surname' => 'Lombardi',
                'email' => 'martinalombardi@gmail.com',
                'text' => 'Buongiorno, qual è la politica di cancellazione?',
                'apartment_id' => '22'
            ],
            [
                'name' => 'Giovanni',
                'surname' => 'Costantini',
                'email' => 'giovannicostantini@gmail.com',
                'text' => 'Salve, è possibile avere la colazione inclusa?',
                'apartment_id' => '23'
            ],
            [
                'name' => 'Anna',
                'surname' => 'Pellegrini',
                'email' => 'annapellegrini@gmail.com',
                'text' => 'Buongiorno, avete uno spazio giochi per bambini?',
                'apartment_id' => '24'
            ],
            [
                'name' => 'Giuseppe',
                'surname' => 'Ricci',
                'email' => 'giuseppericci@libero.it',
                'text' => 'Buongiorno, c\'è un ferro da stiro?',
                'apartment_id' => '1'
            ],
            [
                'name' => 'Federica',
                'surname' => 'Galli',
                'email' => 'federicagalli@libero.it',
                'text' => 'Salve, avete una lavatrice disponibile?',
                'apartment_id' => '1'
            ],
            [
                'name' => 'Marco',
                'surname' => 'Lombardo',
                'email' => 'marcolombardo@libero.it',
                'text' => 'Buongiorno, il Wi-Fi è incluso?',
                'apartment_id' => '3'
            ],
            [
                'name' => 'Chiara',
                'surname' => 'De Luca',
                'email' => 'chiaradeluca@libero.it',
                'text' => 'Salve, qual è la politica sugli animali domestici?',
                'apartment_id' => '4'
            ],
            [
                'name' => 'Simone',
                'surname' => 'Fontana',
                'email' => 'simonefontana@yahoo.it',
                'text' => 'Buongiorno, c\'è un parcheggio custodito?',
                'apartment_id' => '2'
            ],
            [
                'name' => 'Alessia',
                'surname' => 'Riva',
                'email' => 'alessiariva@yahoo.it',
                'text' => 'Salve, è possibile effettuare il check-in anticipato?',
                'apartment_id' => '6'
            ],
            [
                'name' => 'Elena',
                'surname' => 'Mazza',
                'email' => 'elenamazza@yahoo.it',
                'text' => 'Buongiorno, ci sono ristoranti nelle vicinanze?',
                'apartment_id' => '5'
            ],
            [
                'name' => 'Daniele',
                'surname' => 'Ferraro',
                'email' => 'danieleferraro@yahoo.it',
                'text' => 'Salve, come posso raggiungere l\'appartamento dalla stazione ferroviaria?',
                'apartment_id' => '8'
            ],
            [
                'name' => 'Sara',
                'surname' => 'Caruso',
                'email' => 'saracaruso@yahoo.it',
                'text' => 'Buongiorno, accettate carte di credito per il pagamento?',
                'apartment_id' => '9'
            ],
            [
                'name' => 'Roberto',
                'surname' => 'Gentile',
                'email' => 'robertogentile@yahoo.it',
                'text' => 'Salve, è possibile fumare in casa?',
                'apartment_id' => '10'
            ],
            [
                'name' => 'Giulia',
                'surname' => 'Palmieri',
                'email' => 'giuliapalmieri@yahoo.it',
                'text' => 'Buongiorno, qual è la durata minima del soggiorno?',
                'apartment_id' => '11'
            ],
            [
                'name' => 'Antonio',
                'surname' => 'Russo',
                'email' => 'antoniorusso@yahoo.it',
                'text' => 'Salve, l\'appartamento dispone di aria condizionata?',
                'apartment_id' => '1'
            ],
            [
                'name' => 'Elisa',
                'surname' => 'Martini',
                'email' => 'elisamartini@yahoo.it',
                'text' => 'Buongiorno, è possibile avere un late check-out?',
                'apartment_id' => '13'
            ],
        ];
        foreach ($messages as $message) {
            $new_message = new Message();
            $new_message->fill($message);
            // $new_message['slug'] = Str::slug($message['title']);
            $new_message->save();
        }
    }
}
