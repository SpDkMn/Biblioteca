<?php
use Illuminate\Database\Seeder;

use App\Profile as Profile;

class Profiles extends Seeder
{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      Profile::create([
         'name' => 'admin',
         'JSON' => '{"libros": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"tesis": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"revistas": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"compendios": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"noticias": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]                    
                    ,"castigos": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"perfiles": [{"crear":true},{"ver":true},{"editar":true},{"eliminar":true}]
                    ,"usuarios": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"empleados": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"prestamos": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"devoluciones": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"solicitudes": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"autores": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"editoriales": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"noticias": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"configuraciones": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]}'
      ]);
      Profile::create([
         'name' => 'administrador',
         'JSON' => '{"libros": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"tesis": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"revistas": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"compendios": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"noticias": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]                    
                    ,"castigos": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"perfiles": [{"crear":true},{"ver":true},{"editar":true},{"eliminar":true}]
                    ,"usuarios": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"empleados": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"prestamos": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"devoluciones": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"solicitudes": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"autores": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"editoriales": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"noticias": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]
                    ,"configuraciones": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]}'
      ]);
   }
}
