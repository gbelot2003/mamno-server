<?php

use App\Municipios;
use Illuminate\Database\Seeder;

class MunicipiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipios')->delete();
        Municipios::create([
            'departamento_id' => 1,
            'municipio' => 'La Ceiba'
        ]);
        Municipios::create([
            'departamento_id' => 1,
            'municipio' => 'El Porvenir'
        ]);
        Municipios::create([
            'departamento_id' => 1,
            'municipio' => 'Tela'
        ]);
        Municipios::create([
            'departamento_id' => 1,
            'municipio' => 'Jutiapa'
        ]);
        Municipios::create([
            'departamento_id' => 1,
            'municipio' => 'La Masica'
        ]);
        Municipios::create([
            'departamento_id' => 1,
            'municipio' => 'San Francisco'
        ]);
        Municipios::create([
            'departamento_id' => 1,
            'municipio' => 'Arizona'
        ]);
        Municipios::create([
            'departamento_id' => 1,
            'municipio' => 'Esparta'
        ]);
        Municipios::create([
            'departamento_id' => 2,
            'municipio' => 'Trujillo'
        ]);
        Municipios::create([
            'departamento_id' => 2,
            'municipio' => 'Balfante'
        ]);
        Municipios::create([
            'departamento_id' => 2,
            'municipio' => 'Iriona'
        ]);
        Municipios::create([
            'departamento_id' => 2,
            'municipio' => 'Limón'
        ]);
        Municipios::create([
            'departamento_id' => 2,
            'municipio' => 'Sabá'
        ]);
        Municipios::create([
            'departamento_id' => 2,
            'municipio' => 'Santa Fe'
        ]);
        Municipios::create([
            'departamento_id' => 2,
            'municipio' => 'Santa Rosa de Aguán'
        ]);
        Municipios::create([
            'departamento_id' => 2,
            'municipio' => 'Sonaguera'
        ]);
        Municipios::create([
            'departamento_id' => 2,
            'municipio' => 'Tocoa'
        ]);
        Municipios::create([
            'departamento_id' => 2,
            'municipio' => 'Bonito Orienta'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'Comayagua'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'Ajuterique'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'El Rosario'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'Esquías'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'Humuya'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'La Libertad'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'Lamaní'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'La Trinidad'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'Lejamani'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'Meambar'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'Minas de Oro'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'Ojo de Agua'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'San Jerónimo'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'San José de Comayagua'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'San José de Potrero'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'San Luis'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'San Sebastian'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'Siguatepeque'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'Villa de San Antonio'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'Las Lajas'
        ]);
        Municipios::create([
            'departamento_id' => 3,
            'municipio' => 'Taulabé'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'Santa Rosa de Copán'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'Cabañas'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'Concepción'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'Copán Ruinas'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'Corquín'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'Cucuyagua'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'Dolores'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'Dulce Nombre'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'El Paraíso'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'Florida'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'La Jigua'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'La Unión'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'Nueva Arcadia'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'San Agustin'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'San Antonio'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'San Jerónimo'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'San José'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'San Juan de Opoa'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'San Nicolás'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'San Pedro'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'Santa Rita'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'Trinidad de Copán'
        ]);
        Municipios::create([
            'departamento_id' => 4,
            'municipio' => 'Veracruz'
        ]);
        Municipios::create([
            'departamento_id' => 5,
            'municipio' => 'San Pedro Sula'
        ]);
        Municipios::create([
            'departamento_id' => 5,
            'municipio' => 'Choloma'
        ]);
        Municipios::create([
            'departamento_id' => 5,
            'municipio' => 'Omoa'
        ]);
        Municipios::create([
            'departamento_id' => 5,
            'municipio' => 'Pimienta'
        ]);
        Municipios::create([
            'departamento_id' => 5,
            'municipio' => 'Potrerillos'
        ]);
        Municipios::create([
            'departamento_id' => 5,
            'municipio' => 'Puerto Cortéz'
        ]);
        Municipios::create([
            'departamento_id' => 5,
            'municipio' => 'San Antonio de Cortéz'
        ]);
        Municipios::create([
            'departamento_id' => 5,
            'municipio' => 'San Francisco de Yojoa'
        ]);
        Municipios::create([
            'departamento_id' => 5,
            'municipio' => 'San Manuel'
        ]);
        Municipios::create([
            'departamento_id' => 5,
            'municipio' => 'Santa Cruz de Yojoa'
        ]);
        Municipios::create([
            'departamento_id' => 5,
            'municipio' => 'Villanueva'
        ]);
        Municipios::create([
            'departamento_id' => 5,
            'municipio' => 'La Lima'
        ]);
        Municipios::create([
            'departamento_id' => 6,
            'municipio' => 'Choluteca'
        ]);
        Municipios::create([
            'departamento_id' => 6,
            'municipio' => 'Apacilagua'
        ]);
        Municipios::create([
            'departamento_id' => 6,
            'municipio' => 'Concepción de Maria'
        ]);
        Municipios::create([
            'departamento_id' => 6,
            'municipio' => 'Duyere'
        ]);
        Municipios::create([
            'departamento_id' => 6,
            'municipio' => 'El Corpus'
        ]);
        Municipios::create([
            'departamento_id' => 6,
            'municipio' => 'El Triunfo'
        ]);
        Municipios::create([
            'departamento_id' => 6,
            'municipio' => 'Marcovia'
        ]);
        Municipios::create([
            'departamento_id' => 6,
            'municipio' => 'Morolica'
        ]);
        Municipios::create([
            'departamento_id' => 6,
            'municipio' => 'Namasigue'
        ]);
        Municipios::create([
            'departamento_id' => 6,
            'municipio' => 'Orocuina'
        ]);
        Municipios::create([
            'departamento_id' => 6,
            'municipio' => 'Pespire'
        ]);
        Municipios::create([
            'departamento_id' => 6,
            'municipio' => 'San Antonio de Flores'
        ]);
        Municipios::create([
            'departamento_id' => 6,
            'municipio' => 'San Isidro'
        ]);
        Municipios::create([
            'departamento_id' => 6,
            'municipio' => 'San José'
        ]);
        Municipios::create([
            'departamento_id' => 6,
            'municipio' => 'San Marcos de Colón'
        ]);
        Municipios::create([
            'departamento_id' => 6,
            'municipio' => 'Santa Ana de Yusguare'
        ]);
        Municipios::create([
            'departamento_id' => 7,
            'municipio' => 'Yuscarán'
        ]);
        Municipios::create([
            'departamento_id' => 7,
            'municipio' => 'Alauca'
        ]);
        Municipios::create([
            'departamento_id' => 7,
            'municipio' => 'Danlí'
        ]);
        Municipios::create([
            'departamento_id' => 7,
            'municipio' => 'El Paraíso'
        ]);
        Municipios::create([
            'departamento_id' => 7,
            'municipio' => 'Guinope'
        ]);
        Municipios::create([
            'departamento_id' => 7,
            'municipio' => 'Jacaleapa'
        ]);
        Municipios::create([
            'departamento_id' => 7,
            'municipio' => 'Liure'
        ]);
        Municipios::create([
            'departamento_id' => 7,
            'municipio' => 'Morocelí'
        ]);
        Municipios::create([
            'departamento_id' => 7,
            'municipio' => 'Oropolí'
        ]);
        Municipios::create([
            'departamento_id' => 7,
            'municipio' => 'Potrerillos'
        ]);
        Municipios::create([
            'departamento_id' => 7,
            'municipio' => 'San Antonio de Flores'
        ]);
        Municipios::create([
            'departamento_id' => 7,
            'municipio' => 'San Lucas'
        ]);
        Municipios::create([
            'departamento_id' => 7,
            'municipio' => 'San Matías'
        ]);
        Municipios::create([
            'departamento_id' => 7,
            'municipio' => 'Soledad'
        ]);
        Municipios::create([
            'departamento_id' => 7,
            'municipio' => 'Teupacenti'
        ]);
        Municipios::create([
            'departamento_id' => 7,
            'municipio' => 'Texiguat'
        ]);
        Municipios::create([
            'departamento_id' => 7,
            'municipio' => 'Vado Ancho'
        ]);
        Municipios::create([
            'departamento_id' => 7,
            'municipio' => 'Yauyupe'
        ]);
        Municipios::create([
            'departamento_id' => 7,
            'municipio' => 'Trojes'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Tegucigalpa'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Alubarén'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Cedros'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Curarén'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'El Porvenir'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Guaimaca'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'La Libertad'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'La Venta'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Lepaterique'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Maraita'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Marale'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Nueva Armenia'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Ojojona'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Orica'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Reitoca'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Sabanagrande'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'San Antonio de Oriente'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'San Buenaventura'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'San Ignacio'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'San Juan de Flores'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'San Miguelito'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Santa Ana'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Santa Lucia'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Talanga'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Tatumbla'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Valle de Angeles'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Villa de San Francisco'
        ]);
        Municipios::create([
            'departamento_id' => 8,
            'municipio' => 'Vallecillo'
        ]);
        Municipios::create([
            'departamento_id' => 9,
            'municipio' => 'Puerto Lempira'
        ]);
        Municipios::create([
            'departamento_id' => 9,
            'municipio' => 'Brus Laguna'
        ]);
        Municipios::create([
            'departamento_id' => 9,
            'municipio' => 'Ahuas'
        ]);
        Municipios::create([
            'departamento_id' => 9,
            'municipio' => 'Juan Francisco Bulnes'
        ]);
        Municipios::create([
            'departamento_id' => 9,
            'municipio' => 'Ramón Villeda Morales'
        ]);
        Municipios::create([
            'departamento_id' => 9,
            'municipio' => 'Wampusirpe'
        ]);
        Municipios::create([
            'departamento_id' => 10,
            'municipio' => 'La Esperanza'
        ]);
        Municipios::create([
            'departamento_id' => 10,
            'municipio' => 'Camsca'
        ]);
        Municipios::create([
            'departamento_id' => 10,
            'municipio' => 'Colomoncagua'
        ]);
        Municipios::create([
            'departamento_id' => 10,
            'municipio' => 'Concepción'
        ]);
        Municipios::create([
            'departamento_id' => 10,
            'municipio' => 'Dolores'
        ]);
        Municipios::create([
            'departamento_id' => 10,
            'municipio' => 'Intibucá'
        ]);
        Municipios::create([
            'departamento_id' => 10,
            'municipio' => 'Jesús de Otoro'
        ]);
        Municipios::create([
            'departamento_id' => 10,
            'municipio' => 'Magdalena'
        ]);
        Municipios::create([
            'departamento_id' => 10,
            'municipio' => 'Masaguara'
        ]);
        Municipios::create([
            'departamento_id' => 10,
            'municipio' => 'San Antonio'
        ]);
        Municipios::create([
            'departamento_id' => 10,
            'municipio' => 'San Isidro'
        ]);
        Municipios::create([
            'departamento_id' => 10,
            'municipio' => 'San Juan'
        ]);
        Municipios::create([
            'departamento_id' => 10,
            'municipio' => 'San Marcos de la Sierra'
        ]);
        Municipios::create([
            'departamento_id' => 10,
            'municipio' => 'San Miguel Guancapla'
        ]);
        Municipios::create([
            'departamento_id' => 10,
            'municipio' => 'Santa Lucía'
        ]);
        Municipios::create([
            'departamento_id' => 10,
            'municipio' => 'Yamaranguila'
        ]);
        Municipios::create([
            'departamento_id' => 10,
            'municipio' => 'San Francisco de Opalaca'
        ]);
        Municipios::create([
            'departamento_id' => 11,
            'municipio' => 'Roatán'
        ]);
        Municipios::create([
            'departamento_id' => 11,
            'municipio' => 'Guanaja'
        ]);
        Municipios::create([
            'departamento_id' => 11,
            'municipio' => 'José Santos Guardiola'
        ]);
        Municipios::create([
            'departamento_id' => 11,
            'municipio' => 'Utila'
        ]);
        Municipios::create([
            'departamento_id' => 12,
            'municipio' => 'La Paz'
        ]);
        Municipios::create([
            'departamento_id' => 12,
            'municipio' => 'Aguanqueterque'
        ]);
        Municipios::create([
            'departamento_id' => 12,
            'municipio' => 'Cabañas'
        ]);
        Municipios::create([
            'departamento_id' => 12,
            'municipio' => 'Cane'
        ]);
        Municipios::create([
            'departamento_id' => 12,
            'municipio' => 'Chinacla'
        ]);
        Municipios::create([
            'departamento_id' => 12,
            'municipio' => 'Guajiquiro'
        ]);
        Municipios::create([
            'departamento_id' => 12,
            'municipio' => 'Lauterique'
        ]);
        Municipios::create([
            'departamento_id' => 12,
            'municipio' => 'Marcala'
        ]);
        Municipios::create([
            'departamento_id' => 12,
            'municipio' => 'Mercedes de Oriente'
        ]);
        Municipios::create([
            'departamento_id' => 12,
            'municipio' => 'Opatoro'
        ]);
        Municipios::create([
            'departamento_id' => 12,
            'municipio' => 'San Antonio del Norte'
        ]);
        Municipios::create([
            'departamento_id' => 12,
            'municipio' => 'San José'
        ]);
        Municipios::create([
            'departamento_id' => 12,
            'municipio' => 'San Juan'
        ]);
        Municipios::create([
            'departamento_id' => 12,
            'municipio' => 'San Pedro de Tutule'
        ]);
        Municipios::create([
            'departamento_id' => 12,
            'municipio' => 'Santa Ana'
        ]);
        Municipios::create([
            'departamento_id' => 12,
            'municipio' => 'Santa Elena'
        ]);
        Municipios::create([
            'departamento_id' => 12,
            'municipio' => 'Santa María'
        ]);
        Municipios::create([
            'departamento_id' => 12,
            'municipio' => 'Santiago de Puringla'
        ]);
        Municipios::create([
            'departamento_id' => 12,
            'municipio' => 'Yarula'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'Gracias'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'Belén'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'Candelaria'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'Cololaca'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'Erandique'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'Gualcince'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'Guarita'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'La Campa'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'La Iguala'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'Las Flores'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'La Union'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'La Virtud'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'Lepaera'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'Mapulaca'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'Piraera'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'San Andrés'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'San Francisco'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'San Juan Guarita'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'San Manuel Colohente'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'San Rafael'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'San Sebastián'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'Santa Cruz'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'Talgua'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'Tambla'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'Tomalá'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'Valladolid'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'Virginia'
        ]);
        Municipios::create([
            'departamento_id' => 13,
            'municipio' => 'San Marcos de Coiquín'
        ]);
        Municipios::create([
            'departamento_id' => 14,
            'municipio' => 'Ocotepeque'
        ]);
        Municipios::create([
            'departamento_id' => 14,
            'municipio' => 'Belén Gualcho'
        ]);
        Municipios::create([
            'departamento_id' => 14,
            'municipio' => 'Concepción'
        ]);
        Municipios::create([
            'departamento_id' => 14,
            'municipio' => 'Dolores Merendón'
        ]);
        Municipios::create([
            'departamento_id' => 14,
            'municipio' => 'Fraternidad'
        ]);
        Municipios::create([
            'departamento_id' => 14,
            'municipio' => 'La Encarnación'
        ]);
        Municipios::create([
            'departamento_id' => 14,
            'municipio' => 'La Labor'
        ]);
        Municipios::create([
            'departamento_id' => 14,
            'municipio' => 'Lucerna'
        ]);
        Municipios::create([
            'departamento_id' => 14,
            'municipio' => 'Mercedes'
        ]);
        Municipios::create([
            'departamento_id' => 14,
            'municipio' => 'San Fernando'
        ]);
        Municipios::create([
            'departamento_id' => 14,
            'municipio' => 'San Francisco del Valle'
        ]);
        Municipios::create([
            'departamento_id' => 14,
            'municipio' => 'San Jorge'
        ]);
        Municipios::create([
            'departamento_id' => 14,
            'municipio' => 'San Marcos'
        ]);
        Municipios::create([
            'departamento_id' => 14,
            'municipio' => 'Santa Fé'
        ]);
        Municipios::create([
            'departamento_id' => 14,
            'municipio' => 'Sensenti'
        ]);
        Municipios::create([
            'departamento_id' => 14,
            'municipio' => 'Sinuapa'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'Juticalpa'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'Campamento'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'Catacamas'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'Concordia'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'Dulce Nombre de Culmin'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'El Rosario'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'Esquipulas del Norte'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'Gualaco'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'Guarizama'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'Guata'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'Jano'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'La Unión'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'Manguelile'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'Manto'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'Salamá'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'San Esteban'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'San Francisco de Becerra'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'San Francisco de la paz'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'Santa María del Real'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'Silca'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'Yocón'
        ]);
        Municipios::create([
            'departamento_id' => 15,
            'municipio' => 'Patuca'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'Santa Bárbara'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'Arada'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'Atima'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'Azacualpa'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'Ceguaca'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'Consepción del Norte'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'Consepción del Sur'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'Chinda'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'El Nispero'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'Gualala'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'LLama'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'Las Vegas'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'Macuelizo'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'Naranjito'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'Nuevo Celilac'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'Nueva Frontera'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'Petoa'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'Protección'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'Quimistán'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'San Fransisco de Ojuera'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'San José de las Colinas'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'San Luis'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'San Marcos'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'San Nicolás'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'San Pedro de Zacapa'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'San Vicente Centenario'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'Santa Rita'
        ]);
        Municipios::create([
            'departamento_id' => 16,
            'municipio' => 'Trinidad'
        ]);
        Municipios::create([
            'departamento_id' => 17,
            'municipio' => 'Nacaome'
        ]);
        Municipios::create([
            'departamento_id' => 17,
            'municipio' => 'Alianza'
        ]);
        Municipios::create([
            'departamento_id' => 17,
            'municipio' => 'Amapala'
        ]);
        Municipios::create([
            'departamento_id' => 17,
            'municipio' => 'Aramecina'
        ]);
        Municipios::create([
            'departamento_id' => 17,
            'municipio' => 'Caridad'
        ]);
        Municipios::create([
            'departamento_id' => 17,
            'municipio' => 'Goascorán'
        ]);
        Municipios::create([
            'departamento_id' => 17,
            'municipio' => 'Langue'
        ]);
        Municipios::create([
            'departamento_id' => 17,
            'municipio' => 'San Francisco de Coray'
        ]);
        Municipios::create([
            'departamento_id' => 17,
            'municipio' => 'San Lorenzo'
        ]);
        Municipios::create([
            'departamento_id' => 18,
            'municipio' => 'Yoro'
        ]);
        Municipios::create([
            'departamento_id' => 18,
            'municipio' => 'Arenal'
        ]);
        Municipios::create([
            'departamento_id' => 18,
            'municipio' => 'El Negrito'
        ]);
        Municipios::create([
            'departamento_id' => 18,
            'municipio' => 'EL Progreso'
        ]);
        Municipios::create([
            'departamento_id' => 18,
            'municipio' => 'Jocón'
        ]);
        Municipios::create([
            'departamento_id' => 18,
            'municipio' => 'Morazán'
        ]);
        Municipios::create([
            'departamento_id' => 18,
            'municipio' => 'Olanchito'
        ]);
        Municipios::create([
            'departamento_id' => 18,
            'municipio' => 'Santa Rita'
        ]);
        Municipios::create([
            'departamento_id' => 18,
            'municipio' => 'Sulaco'
        ]);
        Municipios::create([
            'departamento_id' => 18,
            'municipio' => 'Victoria'
        ]);
        Municipios::create([
            'departamento_id' => 18,
            'municipio' => 'Yorito'
        ]);
    }
}
