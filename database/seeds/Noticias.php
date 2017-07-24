<?php

use Illuminate\Database\Seeder;
use App\Noticia as Noticia;
class Noticias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Noticia::Create(['titulo'=>'BIBLIOTECA FISI','contenido'=>'<p>Contribuimos al desarrollo academico e intelectual y a la generacion del conocimiento. La biblioteca virtual de la FISI como instrumento de información y desarrollo educativo, se enuncia como la unidad encargada del alineamiento, administrativo, procesamiento técnico, ejecución de actividades y prestación de servicios para facilitar y proveer el uso del material documental en soporte impreso y digital, tiene como propósito formar profesionales capaces de planear, asesorar y dirigir proyectos de desarrollo tecnológico relacionados con la implementación de sistemas informáticos en procesos socioeconómicos de producción.</p>','palabra_clave'=>'sin_especificar','urlImg'=>null,'localizacion'=>null]);
    }
}
