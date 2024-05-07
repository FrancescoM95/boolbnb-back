<?php

namespace Database\Seeders;

use App\Models\Apartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apartments = [
            [
                "user_id" => 1,
                "title" => "Appartamento moderno vicino al centro",
                "slug" => '',
                "baths" => 2,
                "beds" => 3,
                "rooms" => 4,
                "square_meters" => 80,
                "address" => "Via Garibaldi 10, Milano",
                "latitude" => 45.4654219,
                "longitude" => 9.1859243,
                "cover_image" => "https://a0.muscache.com/im/pictures/miso/Hosting-882755229618149063/original/c03bcb9b-50a8-4d35-8605-d3777374dbf8.jpeg?im_w=720",
                "is_visible" => true,
                "description" => "Benvenuti nel nostro accogliente e moderno appartamento situato nel cuore della città. Con una posizione ideale a pochi passi dal centro storico, questo appartamento è la base perfetta per esplorare tutto ciò che la nostra vibrante città ha da offrire. L'appartamento è stato recentemente ristrutturato e arredato con gusto, offrendo un ambiente elegante e confortevole per il vostro soggiorno. Godetevi il comfort di un ampio soggiorno luminoso, una cucina completamente attrezzata e una camera da letto accogliente con un comodo letto matrimoniale. Grazie alla sua posizione centrale, sarete circondati da una vasta gamma di ristoranti, caffetterie e attrazioni culturali. Dopo una giornata trascorsa a esplorare la città, potrete rilassarvi sulla nostra terrazza privata con una vista mozzafiato sullo skyline urbano. Sia che siate in viaggio per affari o per piacere, il nostro appartamento è la scelta perfetta per un soggiorno indimenticabile nel cuore della città"
            ],
            [
                "user_id" => 1,
                "title" => "Stanza luminosa con vista sulla città",
                "slug" => '',
                "baths" => 1,
                "beds" => 1,
                "rooms" => 1,
                "square_meters" => 25,
                "address" => "Corso Magenta 15, Milano",
                "latitude" => 45.465421,
                "longitude" => 9.174911,
                "cover_image" => "https://a0.muscache.com/im/pictures/miso/Hosting-725302995823852226/original/bbb16708-7735-426c-bd4c-664d325764b8.jpeg?im_w=720",
                "is_visible" => true,
                "description" => "Benvenuti nella nostra affascinante stanza luminosa, immersa nel cuore pulsante della città. Con una vista mozzafiato sulla skyline urbana, questa stanza moderna e accogliente offre un'oasi di comfort e serenità. Arredata con gusto e cura per i dettagli, la stanza vanta un comodo letto matrimoniale e un ambiente spazioso e luminoso. Il bagno moderno è dotato di ogni comfort, garantendo un soggiorno piacevole e rilassante. Godetevi il risveglio con la luce del sole che filtra attraverso le finestre panoramiche e preparatevi ad esplorare le meraviglie della città. Con una posizione centrale, sarete circondati da una varietà di ristoranti, negozi e attrazioni culturali. Ritagliatevi un momento di tranquillità sulla nostra terrazza panoramica e ammirate lo spettacolo della città che si accende al tramonto. Prenotate ora per un'esperienza indimenticabile in una delle città più affascinanti del mondo."
            ],
            [
                "user_id" => 1,
                "title" => "Villa con piscina e giardino",
                "slug" => '',
                "baths" => 3,
                "beds" => 4,
                "rooms" => 5,
                "square_meters" => 200,
                "address" => "Via Roma 1, Monza",
                "latitude" => 45.5848,
                "longitude" => 9.2733,
                "cover_image" => "https://a0.muscache.com/im/pictures/prohost-api/Hosting-957819679097220222/original/53afb9d5-777e-46bf-b657-36cd979bddc8.jpeg?im_w=720",
                "is_visible" => true,
                "description" => "Benvenuti nella nostra villa esclusiva con piscina e giardino. Con ampi spazi luminosi e arredi di alta qualità, questa residenza offre un'esperienza di vacanza di lusso. Godetevi momenti di relax nella piscina privata circondata da giardini paesaggistici. Le camere da letto lussuose garantiscono il massimo comfort, mentre la cucina completamente attrezzata vi permette di preparare deliziose pietanze. Vicino a spiagge, ristoranti e attrazioni, è il luogo ideale per una vacanza indimenticabile!"
            ],
            [
                "user_id" => 1,
                "title" => "Appartamento con vista sul lago",
                "slug" => '',
                "baths" => 2,
                "beds" => 2,
                "rooms" => 3,
                "square_meters" => 70,
                "address" => "Piazza Cavour 8, Como",
                "latitude" => 45.8101,
                "longitude" => 9.0852,
                "cover_image" => "https://a0.muscache.com/im/pictures/8f960b01-d6cd-46c7-80e0-341c8c04489e.jpg?im_w=720",
                "is_visible" => true,
                "description" => "Benvenuti nel nostro incantevole appartamento con vista panoramica sul lago, un rifugio di pace e serenità immerso nella natura. Concedetevi una pausa dal caos quotidiano e immergetevi nella bellezza mozzafiato di questo angolo di paradiso. L'appartamento è luminoso e spazioso, arredato con gusto e dotato di ogni comfort per garantirvi un soggiorno indimenticabile. La vista sul lago dalle ampie finestre vi lascerà senza fiato, regalandovi un'esperienza visiva unica in ogni momento della giornata. Godetevi la colazione sulla terrazza mentre ammirate l'alba riflettersi sulle acque serene del lago, o rilassatevi sul comodo divano del soggiorno ammirando il tramonto sulle montagne circostanti. Con una posizione privilegiata vicino a sentieri panoramici, spiagge pittoresche e deliziosi ristoranti sul lungolago, questo appartamento è la scelta ideale per una vacanza all'insegna del relax e della tranquillità. Prenotate ora e preparatevi a vivere un'esperienza indimenticabile nel cuore della natura."
            ],
            [
                "user_id" => 1,
                "title" => "Loft nel cuore della città vecchia",
                "slug" => '',
                "baths" => 1,
                "beds" => 1,
                "rooms" => 2,
                "square_meters" => 50,
                "address" => "Via XX Settembre 20, Bergamo",
                "latitude" => 45.697,
                "longitude" => 9.6703,
                "cover_image" => "https://a0.muscache.com/im/pictures/miso/Hosting-891961128789448188/original/2c289ef3-b7f0-4be9-8726-62c9d0d862e1.jpeg?im_w=720",
                "is_visible" => true,
                "description" => "Benvenuti nel nostro affascinante loft nel cuore della città vecchia, un rifugio urbano che unisce lo stile contemporaneo al fascino del passato. Situato in un edificio storico restaurato con cura, questo loft vi accoglie con un mix di caratteristiche originali e design moderno. L'ampio spazio a pianta aperta è illuminato da grandi finestre che offrono una vista mozzafiato sui tetti della città e sui monumenti storici circostanti. L'arredamento minimalista e raffinato crea un'atmosfera accogliente e allo stesso tempo sofisticata. La zona giorno è il luogo ideale per rilassarsi dopo una giornata di esplorazione della città, mentre la cucina completamente attrezzata vi permette di preparare deliziose cene da gustare nella sala da pranzo adiacente. La zona notte soppalcata, con il suo letto matrimoniale e il bagno moderno, vi offre il comfort e l'intimità necessari per un soggiorno piacevole e rilassante. Con negozi, ristoranti e attrazioni a pochi passi di distanza, questo loft è la base perfetta per esplorare il cuore pulsante della città. Prenotate ora e preparatevi a vivere un'esperienza autentica nel cuore della città vecchia."
            ],
            [
                "user_id" => 1,
                "title" => "Casa vacanze con terrazza panoramica",
                "slug" => '',
                "baths" => 2,
                "beds" => 3,
                "rooms" => 4,
                "square_meters" => 90,
                "address" => "Via Torino 5, Lecco",
                "latitude" => 45.8566,
                "longitude" => 9.3882,
                "cover_image" => "https://a0.muscache.com/im/pictures/miso/Hosting-721540609203378406/original/9dfaf7d6-40f2-4673-b468-7c5ab3147f86.jpeg?im_w=720",
                "is_visible" => true,
                "description" => "Benvenuti nella nostra casa vacanze con terrazza panoramica, un'oasi di relax e comfort con una vista mozzafiato sulla città e sulle montagne circostanti. Situata in una posizione privilegiata, questa casa offre un rifugio perfetto per coloro che desiderano immergersi nella bellezza della natura e godere dei comfort della vita urbana. L'interno è luminoso e spazioso, arredato con gusto e dotato di ogni comfort per garantire un soggiorno indimenticabile. La terrazza panoramica è il luogo ideale per trascorrere momenti di relax all'aria aperta, ammirando i tramonti infuocati sulle cime delle montagne o sorseggiando un cocktail al chiaro di luna. La cucina completamente attrezzata vi permette di preparare deliziose cene da gustare all'aperto, mentre le accoglienti camere da letto garantiscono il massimo comfort durante la notte. Con una posizione centrale, sarete vicini a spiagge incantevoli, sentieri panoramici e deliziosi ristoranti locali. Prenotate ora e preparatevi a vivere un'esperienza indimenticabile di relax e avventura nella nostra casa vacanze con terrazza panoramica."
            ],
            [
                "user_id" => 2,
                "title" => "Appartamento con vista sulle montagne",
                "slug" => '',
                "baths" => 2,
                "beds" => 2,
                "rooms" => 3,
                "square_meters" => 75,
                "address" => "Piazza Vittoria 3, Varese",
                "latitude" => 45.818,
                "longitude" => 8.8232,
                "cover_image" => "https://a0.muscache.com/im/pictures/51c5973c-0021-4b75-884c-537313bf20be.jpg?im_w=720",
                "is_visible" => true,
                "description" => "Benvenuti nel nostro incantevole appartamento con vista sulle montagne, un'oasi di tranquillità e bellezza naturale nel cuore della montagna. Situato in una posizione privilegiata, questo accogliente appartamento offre una vista mozzafiato sulle maestose cime circostanti. L'interno è luminoso e spazioso, arredato con gusto e dotato di ogni comfort per garantire un soggiorno indimenticabile. Il soggiorno è il luogo ideale per rilassarsi dopo una giornata trascorsa all'aria aperta, mentre la cucina completamente attrezzata vi permette di preparare deliziose pietanze da gustare con vista sulle montagne. Le accoglienti camere da letto assicurano il massimo comfort durante la notte, mentre il bagno moderno vi permette di rinfrescarvi e rigenerarvi. Con una posizione centrale, sarete vicini a sentieri escursionistici, impianti di risalita e pittoreschi villaggi di montagna. Prenotate ora e preparatevi a vivere un'esperienza di vacanza indimenticabile tra le meraviglie della natura."
            ],
            [
                "user_id" => 1,
                "title" => "Chalet rustico immerso nel verde",
                "slug" => '',
                "baths" => 1,
                "beds" => 2,
                "rooms" => 3,
                "square_meters" => 60,
                "address" => "Via Monte Rosa 7, Sondrio",
                "latitude" => 46.1692,
                "longitude" => 9.8717,
                "cover_image" => "https://a0.muscache.com/im/pictures/7a6541b1-2f44-4287-ae6f-4d06ee3f3978.jpg?im_w=720",
                "is_visible" => true,
                "description" => "Benvenuti nel nostro accogliente chalet rustico immerso nel verde, un luogo di pace e tranquillità lontano dal trambusto della città. Circondato da boschi e prati, questo chalet offre un'esperienza autentica nella natura. L'interno è caldo e accogliente, con travi a vista e arredi rustici che creano un'atmosfera rilassante e confortevole. Il camino a legna è il cuore della casa, perfetto per serate accoglienti davanti al fuoco. La cucina completamente attrezzata vi permette di preparare deliziose pietanze da gustare nella sala da pranzo con vista sulla foresta. Le accoglienti camere da letto vi assicurano un sonno riposante, mentre la veranda esterna è il luogo ideale per godere della vista e del canto degli uccelli. Con sentieri escursionistici nelle vicinanze e la possibilità di avvistare la fauna selvatica, questo chalet è la scelta ideale per chi ama la natura. Prenotate ora e preparatevi a vivere un'esperienza autentica nella tranquillità della campagna."
            ],
            [
                "user_id" => 2,
                "title" => "Appartamento elegante nel quartiere storico",
                "slug" => '',
                "baths" => 1,
                "beds" => 2,
                "rooms" => 3,
                "square_meters" => 70,
                "address" => "Corso Italia 12, Cremona",
                "latitude" => 45.1342,
                "longitude" => 10.0186,
                "cover_image" => "https://a0.muscache.com/im/pictures/2b0b9566-af73-4640-adff-30601aae97a1.jpg?im_w=720",
                "is_visible" => true,
                "description" => "Benvenuti nel nostro elegante appartamento nel quartiere storico, un luogo incantevole dove la storia si fonde con il comfort moderno. Situato in un edificio storico nel cuore della città, questo appartamento è stato recentemente ristrutturato per offrire un'esperienza di soggiorno indimenticabile. L'interno è luminoso e raffinato, con pavimenti in parquet, soffitti alti e dettagli d'epoca che aggiungono charme e carattere. Il soggiorno è elegante e confortevole, con arredi di design e una vista affascinante sul quartiere storico. La cucina completamente attrezzata vi permette di preparare deliziose pietanze da gustare nella sala da pranzo, mentre le accoglienti camere da letto garantiscono il massimo comfort durante la notte. Con musei, monumenti storici e ristoranti di alto livello a pochi passi di distanza, questo appartamento è la scelta perfetta per chi desidera vivere appieno l'atmosfera unica del quartiere storico. Prenotate ora e preparatevi a immergervi nella storia e nel fascino di questa affascinante città."
            ],
            [
                "user_id" => 3,
                "title" => "Monolocale con terrazza privata",
                "slug" => '',
                "baths" => 1,
                "beds" => 1,
                "rooms" => 1,
                "square_meters" => 35,
                "address" => "Via Po 20, Pavia",
                "latitude" => 45.1865,
                "longitude" => 9.1562,
                "cover_image" => "https://a0.muscache.com/im/pictures/hosting/Hosting-U3RheVN1cHBseUxpc3Rpbmc6NjgyNDc0NzIxNDE2NTI5NTIy/original/c329a04a-51b7-477d-9fc7-7aa4a3a998e7.jpeg?im_w=720",
                "is_visible" => true,
                "description" => "Benvenuti nel nostro intimo monolocale con terrazza privata, un'oasi di tranquillità nel cuore della città. Situato in una tranquilla strada laterale, questo monolocale è l'ideale per chi cerca privacy e comfort. L'interno è luminoso e accogliente, con un design moderno e minimalista che crea un'atmosfera rilassante e confortevole. Il soggiorno è dotato di un comodo divano e di una TV a schermo piatto, mentre la cucina completamente attrezzata vi permette di preparare deliziose pietanze da gustare nella zona pranzo adiacente. La vera gemma di questo monolocale è la terrazza privata, dove potrete rilassarvi all'aperto e godere della tranquillità e della vista panoramica sulla città. Con negozi, ristoranti e attrazioni nelle vicinanze, questo monolocale è la scelta perfetta per esplorare la città e ritirarsi in un'oasi di pace alla fine della giornata. Prenotate ora e preparatevi a vivere un soggiorno indimenticabile nel nostro monolocale con terrazza privata."
            ],
            // Nuovi appartamenti
            [
                "user_id" => 1,
                "title" => "Appartamento ristrutturato vicino al centro della città",
                "slug" => '',
                "baths" => 2,
                "beds" => 3,
                "rooms" => 4,
                "square_meters" => 80,
                "address" => "Via Paolo Sarpi 9, Milano",
                "latitude" => 45.478496,
                "longitude" => 9.179155,
                "cover_image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/359235827.jpg?k=8ddcc4a4c39390155b7da47d7806d254878a68a7374875417745086044866654&o=&hp=1",
                "is_visible" => true,
                "description" => "Benvenuti nel nostro accogliente e moderno appartamento situato nel cuore della città. Con una posizione ideale a pochi passi dal centro storico, questo appartamento è la base perfetta per esplorare tutto ciò che la nostra vibrante città ha da offrire. L'appartamento è stato recentemente ristrutturato e arredato con gusto, offrendo un ambiente elegante e confortevole per il vostro soggiorno. Godetevi il comfort di un ampio soggiorno luminoso, una cucina completamente attrezzata e una camera da letto accogliente con un comodo letto matrimoniale. Grazie alla sua posizione centrale, sarete circondati da una vasta gamma di ristoranti, caffetterie e attrazioni culturali. Dopo una giornata trascorsa a esplorare la città, potrete rilassarvi sulla nostra terrazza privata con una vista mozzafiato sullo skyline urbano. Sia che siate in viaggio per affari o per piacere, il nostro appartamento è la scelta perfetta per un soggiorno indimenticabile nel cuore della città"
            ],
            [
                "user_id" => 1,
                "title" => "Appartamento con balcone nel cuore della città",
                "slug" => '',
                "baths" => 1,
                "beds" => 2,
                "rooms" => 3,
                "square_meters" => 65,
                "address" => "Via della Moscova 28, Milano",
                "latitude" => 45.475674,
                "longitude" => 9.186342,
                "cover_image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/492738358.jpg?k=af1d4982cc0b8e9992d191e4ee8ec841d2973d1c9982d9f2e178c4b804ed8eee&o=&hp=1",
                "is_visible" => true,
                "description" => "Benvenuti nel nostro moderno appartamento con balcone, situato nel cuore pulsante della città. Con una posizione centrale e comoda, questo appartamento offre tutto il necessario per un soggiorno indimenticabile. L'interno è luminoso e spazioso, arredato con gusto e dotato di ogni comfort moderno. Godetevi il comfort del soggiorno open space, la cucina completamente attrezzata e le accoglienti camere da letto con vista sulla città. Il balcone è il luogo ideale per gustare la prima colazione al sole del mattino o sorseggiare un aperitivo al tramonto. Con negozi, ristoranti e attrazioni nelle vicinanze, sarete circondati dalle meraviglie di Milano. Prenotate ora e preparatevi a vivere un soggiorno indimenticabile nel cuore della città."
            ],
            [
                "user_id" => 1,
                "title" => "Appartamento elegante in zona Brera",
                "slug" => '',
                "baths" => 2,
                "beds" => 2,
                "rooms" => 3,
                "square_meters" => 75,
                "address" => "Via Solferino 11, Milano",
                "latitude" => 45.475111,
                "longitude" => 9.187409,
                "cover_image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/445521184.jpg?k=29829564aab0f48d9c6f2a5fe2735ab395a77cc231a44769e16b867a37ab4432&o=&hp=1",
                "is_visible" => true,
                "description" => "Benvenuti nel nostro elegante appartamento situato nel cuore del quartiere di Brera, uno dei quartieri più vivaci e affascinanti di Milano. Con una posizione centrale e comoda, questo appartamento offre un'oasi di comfort e tranquillità nel cuore pulsante della città. L'interno è luminoso e spazioso, arredato con gusto e dotato di ogni comfort moderno. Godetevi il comfort del soggiorno open space, la cucina completamente attrezzata e le accoglienti camere da letto con vista sulla città. Con una vasta gamma di negozi, ristoranti e attrazioni culturali nelle vicinanze, sarete circondati dalla bellezza e dalla vivacità di Milano. Prenotate ora e preparatevi a vivere un soggiorno indimenticabile nel cuore della città."
            ],
            [
                "user_id" => 1,
                "title" => "Appartamento di design in zona Navigli",
                "slug" => '',
                "baths" => 1,
                "beds" => 1,
                "rooms" => 2,
                "square_meters" => 50,
                "address" => "Via Casale 3, Milano",
                "latitude" => 45.450208,
                "longitude" => 9.170565,
                "cover_image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/437724110.jpg?k=d3cbc7d9b38892f6dbac4abaebed3644ecdf396ac3890d788c21c52a4a85b5e6&o=&hp=1",
                "is_visible" => true,
                "description" => "Benvenuti nel nostro appartamento di design situato nel vivace quartiere dei Navigli, uno dei quartieri più trendy e alla moda di Milano. Con una posizione centrale e comoda, questo appartamento offre un'oasi di comfort e tranquillità nel cuore pulsante della città. L'interno è luminoso e spazioso, arredato con gusto e dotato di ogni comfort moderno. Godetevi il comfort del soggiorno open space, la cucina completamente attrezzata e le accoglienti camere da letto con vista sulla città. Con una vasta gamma di negozi, ristoranti e attrazioni culturali nelle vicinanze, sarete circondati dalla bellezza e dalla vivacità di Milano. Prenotate ora e preparatevi a vivere un soggiorno indimenticabile nel cuore della città."
            ],
            [
                "user_id" => 1,
                "title" => "Appartamento moderno con vista sul Naviglio Grande",
                "slug" => '',
                "baths" => 2,
                "beds" => 3,
                "rooms" => 4,
                "square_meters" => 90,
                "address" => "Via Valenza 8, Milano",
                "latitude" => 45.455809,
                "longitude" => 9.177234,
                "cover_image" => "https://a0.muscache.com/im/pictures/prohost-api/Hosting-963518376561662200/original/764c9bc8-e41f-4919-a162-4243ba5c8381.jpeg?im_w=720",
                "is_visible" => true,
                "description" => "Benvenuti nel nostro appartamento moderno con vista panoramica sul Naviglio Grande, un'oasi di comfort e stile nel cuore della città. Situato in una posizione privilegiata, questo appartamento offre una vista mozzafiato sul famoso canale e un facile accesso alle principali attrazioni di Milano. L'interno è luminoso e spazioso, arredato con gusto e dotato di ogni comfort moderno. Godetevi il comfort del soggiorno open space, la cucina completamente attrezzata e le accoglienti camere da letto con vista sul canale. La terrazza è il luogo ideale per gustare una colazione al sole del mattino o sorseggiare un aperitivo al tramonto. Con una vasta gamma di negozi, ristoranti e attrazioni nelle vicinanze, sarete circondati dalla bellezza e dalla vivacità di Milano. Prenotate ora e preparatevi a vivere un soggiorno indimenticabile nel cuore della città."
            ],
            [
                "user_id" => 2,
                "title" => "Appartamento di lusso con vista sui tetti di Milano",
                "slug" => '',
                "baths" => 2,
                "beds" => 2,
                "rooms" => 3,
                "square_meters" => 80,
                "address" => "Via San Marco 12, Milano",
                "latitude" => 45.463862,
                "longitude" => 9.185081,
                "cover_image" => "https://a0.muscache.com/im/pictures/prohost-api/Hosting-841340614090022921/original/d40af825-1f14-4b7e-8398-8463962b954c.jpeg?im_w=720",
                "is_visible" => true,
                "description" => "Benvenuti nel nostro appartamento di lusso con vista panoramica sui tetti di Milano, un rifugio urbano che unisce comfort e stile in un ambiente raffinato. Situato in una posizione privilegiata nel cuore della città, questo appartamento offre una vista spettacolare e un facile accesso alle principali attrazioni di Milano. L'interno è luminoso e spazioso, arredato con gusto e dotato di ogni comfort moderno. Godetevi il comfort del soggiorno open space, la cucina completamente attrezzata e le accoglienti camere da letto con vista sui tetti della città. Con una vasta gamma di negozi, ristoranti e attrazioni nelle vicinanze, sarete circondati dalla bellezza e dalla vivacità di Milano. Prenotate ora e preparatevi a vivere un soggiorno indimenticabile nel cuore della città."
            ],
            [
                "user_id" => 3,
                "title" => "Appartamento accogliente con vista sul Castello Sforzesco",
                "slug" => '',
                "baths" => 1,
                "beds" => 1,
                "rooms" => 2,
                "square_meters" => 60,
                "address" => "Via Beltrami 3, Milano",
                "latitude" => 45.469514,
                "longitude" => 9.180625,
                "cover_image" => "https://a0.muscache.com/im/pictures/miso/Hosting-12271518/original/c639dd92-1e78-4078-9469-dd182f4e1c63.jpeg?im_w=720",
                "is_visible" => true,
                "description" => "Benvenuti nel nostro appartamento accogliente con vista mozzafiato sul Castello Sforzesco, un'oasi di comfort nel cuore storico di Milano. Situato in una posizione privilegiata, questo appartamento offre una vista spettacolare e un facile accesso alle principali attrazioni di Milano. L'interno è luminoso e spazioso, arredato con gusto e dotato di ogni comfort per garantire un soggiorno indimenticabile. Godetevi il comfort del soggiorno open space, la cucina completamente attrezzata e le accoglienti camere da letto con vista sul castello. Con una vasta gamma di negozi, ristoranti e attrazioni nelle vicinanze, sarete circondati dalla bellezza e dalla vivacità di Milano. Prenotate ora e preparatevi a vivere un soggiorno indimenticabile nel cuore della città."
            ],
            [
                "user_id" => 2,
                "title" => "Appartamento vista mare a Monterosso al Mare",
                "slug" => '',
                "baths" => 1,
                "beds" => 2,
                "rooms" => 3,
                "square_meters" => 60,
                "address" => "Via Roma 20, Monterosso al Mare",
                "latitude" => 44.1453,
                "longitude" => 9.6544,
                "cover_image" => "https://a0.muscache.com/im/pictures/4eb1c740-34a5-4da8-8a71-baf56f2577ba.jpg?im_w=720",
                "is_visible" => true,
                "description" => "Goditi una vacanza unica in questo incantevole appartamento con vista sul mare a Monterosso al Mare. Situato in una posizione privilegiata, questo appartamento offre una vista mozzafiato sullo splendido litorale delle Cinque Terre. L'interno è luminoso e spazioso, arredato con gusto e dotato di ogni comfort per garantire un soggiorno indimenticabile. Il soggiorno è il luogo ideale per rilassarsi dopo una giornata trascorsa a esplorare i pittoreschi villaggi circostanti, mentre la cucina completamente attrezzata vi permette di preparare deliziose pietanze con vista sul mare. Le accoglienti camere da letto garantiscono il massimo comfort durante la notte, mentre il balcone è il luogo perfetto per ammirare il tramonto sul mare. Con una posizione centrale, sarete vicini a spiagge, sentieri escursionistici e deliziosi ristoranti locali. Prenotate ora e preparatevi a vivere un'esperienza indimenticabile nel cuore delle Cinque Terre."
            ],
            [
                "user_id" => 3,
                "title" => "Casa vacanze con terrazza panoramica a Vernazza",
                "slug" => '',
                "baths" => 2,
                "beds" => 3,
                "rooms" => 4,
                "square_meters" => 80,
                "address" => "Via Roma 5, Vernazza",
                "latitude" => 44.1342,
                "longitude" => 9.6847,
                "cover_image" => "https://a0.muscache.com/im/pictures/hosting/Hosting-1150117416627372116/original/122e8cd0-d210-42d2-bc85-cf0dcfd1cfe0.jpeg?im_w=720",
                "is_visible" => true,
                "description" => "Benvenuti nella nostra casa vacanze con terrazza panoramica a Vernazza, uno dei gioielli delle Cinque Terre. Situata in posizione elevata, questa casa offre una vista mozzafiato sul pittoresco paesaggio marino. L'interno è luminoso e spazioso, arredato con gusto e dotato di ogni comfort per garantire un soggiorno indimenticabile. Il soggiorno è il luogo ideale per rilassarsi dopo una giornata trascorsa a esplorare le strade lastricate del villaggio, mentre la cucina completamente attrezzata vi permette di preparare deliziose pietanze con vista sul mare. Le accoglienti camere da letto garantiscono il massimo comfort durante la notte, mentre la terrazza panoramica è il luogo perfetto per godere della tranquillità e della bellezza delle Cinque Terre. Con una posizione centrale, sarete vicini a spiagge pittoresche, sentieri escursionistici e deliziosi ristoranti locali. Prenotate ora e preparatevi a vivere un'esperienza indimenticabile tra le meraviglie delle Cinque Terre."
            ],
            [
                "user_id" => 1,
                "title" => "Villetta panoramica con giardino a Riomaggiore",
                "slug" => '',
                "baths" => 2,
                "beds" => 4,
                "rooms" => 5,
                "square_meters" => 120,
                "address" => "Via dell'Amore 15, Riomaggiore",
                "latitude" => 44.098,
                "longitude" => 9.7371,
                "cover_image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/433948180.jpg?k=189525bd11e43fd6225c88d5612132d23c9a6cf9d75671fc34446edd8d8883fa&o=&hp=1",
                "is_visible" => true,
                "description" => "Benvenuti nella nostra villetta panoramica con giardino a Riomaggiore, il cuore delle Cinque Terre. Situata in una posizione elevata, questa villetta offre una vista mozzafiato sulle acque cristalline del Mar Ligure. L'interno è luminoso e spazioso, arredato con gusto e dotato di ogni comfort per garantire un soggiorno indimenticabile. Il soggiorno è il luogo ideale per rilassarsi dopo una giornata trascorsa a esplorare i caratteristici vicoli del villaggio, mentre la cucina completamente attrezzata vi permette di preparare deliziose pietanze con vista sul mare. Le accoglienti camere da letto garantiscono il massimo comfort durante la notte, mentre il giardino è il luogo perfetto per godere della tranquillità e della bellezza delle Cinque Terre. Con una posizione centrale, sarete vicini a spiagge, sentieri escursionistici e deliziosi ristoranti locali. Prenotate ora e preparatevi a vivere un'esperienza indimenticabile tra le meraviglie delle Cinque Terre."
            ], [
                "user_id" => 2,
                "title" => "Monolocale con vista sul porto a Portovenere",
                "slug" => '',
                "baths" => 1,
                "beds" => 1,
                "rooms" => 1,
                "square_meters" => 40,
                "address" => "Via Capellini 10, Portovenere",
                "latitude" => 44.0491,
                "longitude" => 9.8371,
                "cover_image" => "https://a0.muscache.com/im/pictures/miso/Hosting-51010243/original/dc2f499a-a2da-4189-bfc6-ff74253c9c37.jpeg?im_w=720",
                "is_visible" => true,
                "description" => "Benvenuti nel nostro accogliente monolocale con vista sul porto a Portovenere, un luogo incantevole dove la bellezza del mare si fonde con l'atmosfera vibrante del villaggio. Situato in una posizione privilegiata, questo monolocale offre una vista mozzafiato sul pittoresco porto e sulle acque cristalline del Mar Ligure. L'interno è luminoso e spazioso, arredato con gusto e dotato di ogni comfort per garantire un soggiorno indimenticabile. Il soggiorno è il luogo ideale per rilassarsi dopo una giornata trascorsa a esplorare i tesori nascosti del villaggio, mentre la cucina completamente attrezzata vi permette di preparare deliziose pietanze con vista sul porto. Il balcone è il luogo perfetto per godere della brezza marina e osservare le barche che entrano ed escono dal porto. Con una posizione centrale, sarete vicini a spiagge, sentieri escursionistici e deliziosi ristoranti locali. Prenotate ora e preparatevi a vivere un'esperienza indimenticabile a Portovenere."
            ],
            [
                "user_id" => 3,
                "title" => "Appartamento sul lungomare a Manarola",
                "slug" => '',
                "baths" => 1,
                "beds" => 2,
                "rooms" => 2,
                "square_meters" => 50,
                "address" => "Via Rollandi 5, Manarola",
                "latitude" => 44.1119,
                "longitude" => 9.7337,
                "cover_image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/349155453.jpg?k=8aab6369ebee284340a6bab4bee2a72f4040d613de80e12935acc4b30801ba79&o=&hp=1",
                "is_visible" => true,
                "description" => "Benvenuti nel nostro confortevole appartamento sul lungomare a Manarola, uno dei gioielli delle Cinque Terre. Situato lungo il pittoresco lungomare, questo appartamento offre una vista spettacolare sul mare e sul villaggio circostante. L'interno è luminoso e spazioso, arredato con gusto e dotato di ogni comfort per garantire un soggiorno indimenticabile. Il soggiorno è il luogo ideale per rilassarsi dopo una giornata trascorsa a esplorare le stradine colorate del villaggio, mentre la cucina completamente attrezzata vi permette di preparare deliziose pietanze con vista sul mare. Le accoglienti camere da letto garantiscono il massimo comfort durante la notte, mentre il balcone è il luogo perfetto per ammirare il tramonto sul mare. Con una posizione centrale, sarete vicini a spiagge, sentieri escursionistici e deliziosi ristoranti locali. Prenotate ora e preparatevi a vivere un'esperienza indimenticabile a Manarola."
            ],
            [
                "user_id" => 1,
                "title" => "Casa vacanze con terrazza panoramica a Corniglia",
                "slug" => '',
                "baths" => 2,
                "beds" => 3,
                "rooms" => 4,
                "square_meters" => 70,
                "address" => "Via Fieschi 8, Corniglia",
                "latitude" => 44.1201,
                "longitude" => 9.7081,
                "cover_image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/309626136.jpg?k=ae187f2ea10622223221a3ee5341f5aa79134aa69715ebcdb71ef29f644d5f00&o=&hp=1",
                "is_visible" => true,
                "description" => "Benvenuti nella nostra casa vacanze con terrazza panoramica a Corniglia, uno dei villaggi più suggestivi delle Cinque Terre. Situata in posizione elevata, questa casa offre una vista spettacolare sul mare e sulle scogliere circostanti. L'interno è luminoso e spazioso, arredato con gusto e dotato di ogni comfort per garantire un soggiorno indimenticabile. Il soggiorno è il luogo ideale per rilassarsi dopo una giornata trascorsa a esplorare le strette vie del villaggio, mentre la cucina completamente attrezzata vi permette di preparare deliziose pietanze con vista sul mare. Le accoglienti camere da letto garantiscono il massimo comfort durante la notte, mentre la terrazza panoramica è il luogo perfetto per godere della tranquillità e della bellezza delle Cinque Terre. Con una posizione centrale, sarete vicini a spiagge, sentieri escursionistici e deliziosi ristoranti locali. Prenotate ora e preparatevi a vivere un'esperienza indimenticabile a Corniglia."
            ], [
                "user_id" => 1,
                "title" => "Villetta con giardino panoramico a Riomaggiore",
                "slug" => '',
                "baths" => 2,
                "beds" => 4,
                "rooms" => 5,
                "square_meters" => 120,
                "address" => "Via Colombo 15, Riomaggiore",
                "latitude" => 44.0985,
                "longitude" => 9.7335,
                "cover_image" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/353400393.jpg?k=326ac38b1e7499ea334ed25cf52d7b71b5f689573035a076a39600ce2af5a940&o=&hp=1",
                "is_visible" => true,
                "description" => "Benvenuti nella nostra incantevole villetta con giardino panoramico a Riomaggiore, uno dei tesori nascosti delle Cinque Terre. Situata su una collina con vista sul mare, questa villetta offre una vista mozzafiato sul Golfo di Genova. L'interno è luminoso e spazioso, arredato con gusto e dotato di ogni comfort per garantire un soggiorno indimenticabile. Il soggiorno è il luogo ideale per rilassarsi dopo una giornata trascorsa a esplorare i vicoli del villaggio, mentre la cucina completamente attrezzata vi permette di preparare deliziose pietanze con vista sul mare. Il giardino panoramico è il luogo perfetto per godere della tranquillità e della bellezza delle Cinque Terre, con viste spettacolari sulle scogliere e sulle barche che solcano il mare. Le accoglienti camere da letto garantiscono il massimo comfort durante la notte, mentre le terrazze offrono spazi ideali per prendere il sole e ammirare il tramonto. Con una posizione centrale, sarete vicini a spiagge, sentieri escursionistici e deliziosi ristoranti locali. Prenotate ora e preparatevi a vivere un'esperienza indimenticabile a Riomaggiore."
            ]
        ];

        foreach ($apartments as $apartment) {
            $new_apartment = new Apartment();
            $new_apartment->fill($apartment);
            $new_apartment['slug'] = Str::slug($apartment['title']);
            $new_apartment->save();
        }
    }
}
