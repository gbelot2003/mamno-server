<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contents')->delete();
        
        \DB::table('contents')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Segundo video de youtube',
                'description' => 'DESC 2 video',
                'type' => 'Video',
                'resource_link' => 'https://www.youtube.com/embed/uR6G2v_WsRA',
                'status' => 1,
                'created_at' => '2019-11-09 10:52:24',
                'updated_at' => '2019-11-10 10:44:41',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'aasd',
                'description' => 'asdadadadad',
                'type' => 'Video',
                'resource_link' => 'sdadasd',
                'status' => 0,
                'created_at' => '2019-11-09 10:52:48',
                'updated_at' => '2019-11-11 09:56:52',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'asdf',
                'description' => 'safasf',
                'type' => 'Video',
                'resource_link' => 'resourceLink',
                'status' => 0,
                'created_at' => '2019-11-09 11:08:28',
                'updated_at' => '2019-11-11 09:57:01',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Firme',
                'description' => 'Siempre firme',
                'type' => 'Video',
                'resource_link' => 'https://www.youtube.com/embed/MizPu-dTPQU',
                'status' => 1,
                'created_at' => '2019-11-09 11:08:52',
                'updated_at' => '2019-11-11 09:50:41',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Hola',
                'description' => 'Hola DESC',
                'type' => 'Video',
                'resource_link' => 'https://www.youtube.com/embed/HBv00ZBVrzo',
                'status' => 1,
                'created_at' => '2019-11-09 11:10:38',
                'updated_at' => '2019-11-09 11:10:38',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Primero con archivo',
                'description' => 'Primero con archivo desc',
                'type' => 'Manual',
                'resource_link' => '5dc64b473de165.44290852.pdf',
                'status' => 1,
                'created_at' => '2019-11-09 11:14:47',
                'updated_at' => '2019-11-09 11:14:47',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Primer imagen',
                'description' => 'Descripcion de mi primer imagen',
                'type' => 'Foto',
                'resource_link' => 'http://127.0.0.1:8000/storage/resource_files/5dd77ba52bc637.97242324.jpg',
                'status' => 1,
                'created_at' => '2019-11-09 23:10:24',
                'updated_at' => '2019-11-22 12:09:41',
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Segunda imagen',
                'description' => 'Mi segunda imagen',
                'type' => 'Foto',
                'resource_link' => 'http://127.0.0.1:8000/storage/resource_files/5dd77bb93cba40.76961263.jpg',
                'status' => 1,
                'created_at' => '2019-11-09 23:16:24',
                'updated_at' => '2019-11-22 12:10:01',
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'ada',
                'description' => 'adasdad',
                'type' => 'Foto',
                'resource_link' => 'http://127.0.0.1:8000/storage/resource_files/5dc6f59faeb285.86007109.png',
                'status' => 1,
                'created_at' => '2019-11-09 23:21:35',
                'updated_at' => '2019-11-09 23:21:35',
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'Primer documento',
                'description' => 'Mi primer documento',
                'type' => 'Documento',
                'resource_link' => 'http://127.0.0.1:8000/storage/resource_files/5dca0fdc9d3c71.45599360.pdf',
                'status' => 1,
                'created_at' => '2019-11-10 09:27:57',
                'updated_at' => '2019-11-12 07:50:20',
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'Primer enlace externo',
                'description' => 'asd',
                'type' => 'Enlace',
                'resource_link' => 'https://www.udemy.com/course/microsoft-excel-2013-from-beginner-to-advanced-and-beyond/',
                'status' => 1,
                'created_at' => '2019-11-10 09:42:52',
                'updated_at' => '2019-11-10 09:42:52',
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'Enlace',
                'description' => 'un enlace',
                'type' => 'Enlace',
                'resource_link' => 'https://www.udemy.com/course/microsoft-excel-2013-from-beginner-to-advanced-and-beyond/',
                'status' => 1,
                'created_at' => '2019-11-10 09:45:24',
                'updated_at' => '2019-11-10 09:45:24',
            ),
            12 => 
            array (
                'id' => 13,
                'title' => 'Algo nuevo',
                'description' => 'DEsc',
                'type' => 'Foto',
                'resource_link' => 'http://127.0.0.1:8000/storage/resource_files/5dc78836169ef0.98516383.jpg',
                'status' => 1,
                'created_at' => '2019-11-10 09:47:02',
                'updated_at' => '2019-11-10 09:47:02',
            ),
            13 => 
            array (
                'id' => 14,
                'title' => 'Mi primer manual siempre firme edi',
                'description' => 'Descripcion de mi primer manual siempre firme edi\\n\\nEsto solo es para visualizar una linea de texto nueva\\n\\nA ver como se mira',
                'type' => 'Manual',
                'resource_link' => 'http://127.0.0.1:8000/storage/resource_files/5dc7954b29ccd1.40617368.pdf',
                'status' => 1,
                'created_at' => '2019-11-10 09:53:25',
                'updated_at' => '2019-11-10 10:42:51',
            ),
            14 => 
            array (
                'id' => 15,
                'title' => 'Mi primer manual editado',
                'description' => 'Descripcion de mi primer manual editado\\n\\nEsto solo es para visualizar una linea de texto nueva\\n\\nA ver como se mira',
                'type' => 'Manual',
                'resource_link' => 'http://127.0.0.1:8000/storage/resource_files/5dc789b5073570.43464596.pdf',
                'status' => 1,
                'created_at' => '2019-11-10 09:58:09',
                'updated_at' => '2019-11-10 09:58:09',
            ),
            15 => 
            array (
                'id' => 16,
                'title' => 'test 1',
                'description' => 'test 1 dsc',
                'type' => 'Video',
                'resource_link' => 'https://www.youtube.com/embed/g_aMpyMvQ9k',
                'status' => 1,
                'created_at' => '2019-11-12 07:46:06',
                'updated_at' => '2019-11-12 07:46:06',
            ),
            16 => 
            array (
                'id' => 17,
                'title' => 'asda',
                'description' => 'asdad',
                'type' => 'Foto',
                'resource_link' => 'http://127.0.0.1:8000/storage/resource_files/5dd77910417891.44384816.jpg',
                'status' => 1,
                'created_at' => '2019-11-22 11:58:40',
                'updated_at' => '2019-11-22 11:58:40',
            ),
            17 => 
            array (
                'id' => 18,
                'title' => 'Primer tutorial',
                'description' => 'asd',
                'type' => 'Tutorial',
                'resource_link' => 'https://www.youtube.com/embed/mIYzp5rcTvU',
                'status' => 1,
                'created_at' => '2019-11-22 12:18:22',
                'updated_at' => '2019-11-22 12:18:22',
            ),
            18 => 
            array (
                'id' => 19,
                'title' => 'Segundo tutorial',
                'description' => 'Descripcion de mi primer tutorial editado Esto solo es para visualizar una linea de texto nueva A ver como se mira',
                'type' => 'Tutorial',
                'resource_link' => 'https://www.youtube.com/embed/Q04XE2-XhyA',
                'status' => 1,
                'created_at' => '2019-11-22 12:19:12',
                'updated_at' => '2019-11-23 19:16:25',
            ),
            19 => 
            array (
                'id' => 20,
                'title' => 'Content Test',
                'description' => 'Content Test Description',
                'type' => 'Foto',
                'resource_link' => 'http://mamnobackend.test/storage/resource_files/5ddb4df161bba7.06450533.jpeg',
                'status' => 1,
                'created_at' => '2019-11-25 09:43:45',
                'updated_at' => '2019-11-25 09:43:45',
            ),
            20 => 
            array (
                'id' => 21,
                'title' => 'Nuevo video con formulario validado',
                'description' => 'Nuevo video con formulario validado descripcion',
                'type' => 'Video',
                'resource_link' => 'https://www.youtube.com/embed/dQvaGt9B6H0',
                'status' => 1,
                'created_at' => '2019-11-27 10:43:31',
                'updated_at' => '2019-11-27 10:43:31',
            ),
            21 => 
            array (
                'id' => 22,
                'title' => 'Primer imagen con validacion',
                'description' => 'Primer imagen con validacion',
                'type' => 'Foto',
                'resource_link' => 'http://127.0.0.1:8000/storage/resource_files/5dddff26621d13.35103111.jpg',
                'status' => 1,
                'created_at' => '2019-11-27 10:44:22',
                'updated_at' => '2019-11-27 10:44:22',
            ),
            22 => 
            array (
                'id' => 23,
                'title' => 'Primer carrusel',
                'description' => 'Este es mi primer carrusel',
                'type' => 'Carrusel',
                'resource_link' => 'http://127.0.0.1:8000/storage/resource_files/5de3e861864508.40909426.jpg',
                'status' => 1,
                'created_at' => '2019-12-01 22:20:49',
                'updated_at' => '2019-12-01 22:20:49',
            ),
            23 => 
            array (
                'id' => 24,
                'title' => 'Segundo carrusel',
                'description' => 'Este es mi segundo carrusel',
                'type' => 'Carrusel',
                'resource_link' => 'http://127.0.0.1:8000/storage/resource_files/5de3e89ea20fe9.75270360.jpg',
                'status' => 1,
                'created_at' => '2019-12-01 22:21:50',
                'updated_at' => '2019-12-01 22:21:50',
            ),
        ));
        
        
    }
}