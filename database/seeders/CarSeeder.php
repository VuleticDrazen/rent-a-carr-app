<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $cars =[
            ['marka'=>'Ford', 'model'=>'Focus', 'kategorija_id'=>'4', 'godina_proizvodnje'=>'2009', 'registarski_broj'=>'PG-GK-568', 'broj_sjedista'=>'5', 'cijena_po_danu'=>'17', 'dodatne_napomene'=>'1.6 Dizel', 'fotografija'=>'https://th.bing.com/th/id/R96f767c8b38c37c8b46a47b1862973f2?rik=lMtsdYqzozn2Zw&pid=ImgRaw'],
            ['marka'=>'Toyota', 'model'=>'Rav4', 'kategorija_id'=>'2', 'godina_proizvodnje'=>'2014', 'registarski_broj'=>'PG-GK-025', 'broj_sjedista'=>'5', 'cijena_po_danu'=>'28', 'dodatne_napomene'=>'2.0 Hybrid 4WD', 'fotografija'=>'https://th.bing.com/th/id/Rc2ed9e010f2bb0df910ea18d272d48bb?rik=QCm2kgF5wRND1A&riu=http%3a%2f%2fwww.cleanfleetreport.com%2fwp-content%2fuploads%2f2019%2f05%2fRAV4-7.jpg&ehk=grrRkc7PeFr%2b3%2ftlAM97WsZIHDfCYfp0FHWDh7lCJE4%3d&risl=&pid=ImgRaw'],
            ['marka'=>'Mercedes-Benz', 'model'=>'C220', 'kategorija_id'=>'1', 'godina_proizvodnje'=>'2019', 'registarski_broj'=>'PG-GK-217', 'broj_sjedista'=>'5', 'cijena_po_danu'=>'24', 'dodatne_napomene'=>'AMG', 'fotografija'=>'https://cdn.motor1.com/images/mgl/7mNVA/s1/2014-497702-2014-mercedes-benz-c220-bluetec-by-schmidt-revolution1.jpg'],
            ['marka'=>'Hyundai', 'model'=>'i30', 'kategorija_id'=>'3', 'godina_proizvodnje'=>'2012', 'registarski_broj'=>'PG-GK-335', 'broj_sjedista'=>'5', 'cijena_po_danu'=>'19', 'dodatne_napomene'=>'1.0 GDI Benzin', 'fotografija'=>'https://th.bing.com/th/id/OIP.a0HvWbljmTfftim7eZQi0QHaFj?pid=ImgDet&rs=1'],


        ];

        foreach ($cars as $car) {
            Car::query()->create($car);

        }
    }
}
