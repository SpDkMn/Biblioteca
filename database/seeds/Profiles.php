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
         'JSON' => '{"perfiles": [{"crear":true},{"ver":true},{"editar":true},{"eliminar":true}],"solicitudes": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"prestamos": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"empleados": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"castigos": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"items": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"ejemplares": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"lugares": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"categorias": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"estados": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"editoriales": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"usuarios": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"devoluciones": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"escuelas": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]}'
      ]);
      Profile::create([
         'name' => 'administrador',
         'JSON' => '{"perfiles": [{"crear":false},{"ver":false},{"editar":false},{"eliminar":false}],"solicitudes": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"prestamos": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"empleados": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"castigos": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"items": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"ejemplares": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"lugares": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"categorias": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"estados": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"editoriales": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"usuarios": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"devoluciones": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"castigados": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}],"escuelas": [{"ver":true},{"crear":true},{"editar":true},{"eliminar":true}]}'
      ]);
   }
}
