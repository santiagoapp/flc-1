<?php

use Illuminate\Database\Seeder;

class ZonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$zonas = [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            'CORTE Y PREP. DE MANGERAS',
            '11',
            '12',
            '13',
            '14',
            '15',
            '16',
            '17',
            '18',
            '19',
            '20',
            '21',
            '22',
            '23',
            '24',
            '25',
            '26',
            '27',
            '28',
            '29',
            '30',
            '31',
            '32',
            '33',
            'PUESTO DE SOLDADURA TIG 1',
            'PUESTO DE SOLDADURA TIG 2',
            'PUESTO DE SOLDADURA TIG 3',
            'PUESTO DE SOLDADURA MIG 1',
            'PUESTO DE SOLDADURA MIG 2',
            'PRUEBAS',
            'PINTURA',
            'FELPA Y BRILLADO',
            'TALADRADO 1',
            'PULIDO',
            'OXICORTE',
            'ALMACEN 1',
            'ZONA DE INTERCAMBIO 1',
            'ZONA DE INTERCAMBIO 2',
            'ALMACEN 2',
            'TALADRADO 2',
            'ROLADORA',
            'PULIDO Y PINTURA',
            'SOLDADURA',
            'PREPARACION',
            'ENRROLLADO DE EMPAQUES',
            'TROQUELADORA',
            'ESPARRAGOS',
            'TORNOS'
        ];
        $nomenclatura = [
          'MMF',
          'ST1',
          'ST2',
          'ST3',
          'SM1',
          'SM2',
          'PRU',
          'PIN',
          'FEL',
          'TA1',
          'PU1',
          'OXI',
          'ALM',
          'ZIC',
          'ZI2',
          'AL1',
          'TA2',
          'ROL',
          'PU2',
          'SOL',
          'PRE',
          'ENE',
          'TRO',
          'ESP',
          'TOR'
      ];
      $planta = [
          1,
          1,
          1,
          1,
          1,
          2,
          1,
          2,
          2,
          2,
          2,
          2,
          2,
          1,
          3,
          3,
          3,
          3,
          3,
          3,
          3,
          3,
          3,
          3,
          3
      ];

      foreach ($zonas as $key => $zona) {
          factory(App\Zona::class)->create([
             'planta_id' => $planta[$key],
             'nombre' => $zona,
             'nomenclatura' => $nomenclatura[$key]
         ]);
      }
  }
}
