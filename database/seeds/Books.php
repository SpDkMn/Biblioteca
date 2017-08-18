<?php
use Illuminate\Database\Seeder;
use App\Book as Book;

class Books extends Seeder
{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      Book::create([
         'clasification'    => 'ds5.s4',
         'title'            => 'Analisis Matematico',
         'secondaryTitle'   => 'Secundario y sus propiedades',
         'summary'          => 'Libro de matematicas',
         'isbn'             =>  489213,
         'extension'        => '120 paginas',
         'physicalDetails'  => 'Sin portada',
         'dimensions'       => '35 x 24 cm',
         'accompaniment'    => 'no incluye cd',
         'relationBook'     => 1,
         'edition'          => 2,
         'libraryLocation'  => 'Stand  A2'
      ]);

      Book::create([
         'clasification'    => 'fs2.d4',
         'title'            => 'Inteligencia Artificial',
         'secondaryTitle'   => 'Cambiando el mundo',
         'summary'          => 'El libro presenta una breve razon para que los humanos cambien de forma a robots',
         'isbn'             =>  489234,
         'extension'        => '270 paginas',
         'physicalDetails'  => 'Moderna caratula',
         'dimensions'       => '35 x 24 cm',
         'accompaniment'    => 'no incluye cd',
         'relationBook'     => 2,
         'edition'          => 3,
         'libraryLocation'  => 'Stand  A3'
      ]);

      Book::create([
         'clasification'    => 'er2.d4',
         'title'            => 'Redes Neuronales',
         'secondaryTitle'   => 'Renovando la ciencia',
         'summary'          => 'El libro trata de como las redes neuronales van evolucionando',
         'isbn'             =>  482344,
         'extension'        => '240 paginas',
         'physicalDetails'  => 'Moderna caratula',
         'dimensions'       => '35 x 24 cm',
         'accompaniment'    => 'no incluye cd',
         'relationBook'     => 2,
         'edition'          => 3,
         'libraryLocation'  => 'Stand  A5'
      ]);

      DB::table('search_items')->insert([
         'item_id' => 1,
         'type' =>1,
         'content' => 'Analisis Matematico Secundario y sus propiedades Libro de matematicas numeros romanos numeros reales numeros complejos limites metodos numericos derivadas Mauricio Espinoza Vargas Santiago Moquillaza Enriquez Luis Cayo Leon Solver-Maquin',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 2,
         'type' =>1,
         'content' => 'Inteligencia Artificial Cambiando el mundo El libro presenta una breve razon para que los humanos cambien de forma a robots Nacimiento Hijo de satan Muerte de Shiro El nuevo exorcista El gato de Rin Enfrentamiento Yukio Tragado por su padre, satan Santiago Moquillaza Enriquez Luis Cayo Leon Ecoe Ediciones',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 3,
         'type' =>1,
         'content' => 'computadora',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 1,
         'type' =>1,
         'content' => 'computadora El libro ',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 2,
         'type' =>1,
         'content' => 'Cambiando el mundo El libro presenta',
         'state' => true
      ]);DB::table('search_items')->insert([
         'item_id' => 3,
         'type' =>1,
         'content' => 'numeros romanos numeros reales numeros',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 3,
         'type' =>1,
         'content' => 'Artificial Cambiando el mundo El libro',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 2,
         'type' =>1,
         'content' => 'Matematico Secundario',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 1,
         'type' =>1,
         'content' => 'Secundario y sus propiedades Libro',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 3,
         'type' =>1,
         'content' => 'robots Nacimiento Hijo',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 1,
         'type' =>1,
         'content' => 'La televisión es desde hace unos años (y cada vez más), un elemento socialindispensable en la vida de cualquier persona. Tanto es así, que más de un 90% de la población española, afirma ver, al menos una vez al día, la televisión; y esto, en uncorto plazo puede resultar preocupante, ya que son muchos menos los que afirman leer,al menos una vez al día, un libro o un periódico (no llega a un 50%)',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 1,
         'type' =>1,
         'content' => '',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 1,
         'type' =>1,
         'content' => 'Nadie dice que ver la televisión sea malo, pero sí cuando se convierte en una adicciónque ocupa todo nuestro tiempo.El mayor problema de la televisión, es que no se le da el uso que se le debería de dar, esdecir, la televisión debería de ser, fundamentalmente, para recibir información y paraentretener, y cuando digo entretener, me refiero a entretener de una manera educada ycorrecta, ya que muchos de los programas que se emiten hoy en día en muchas cadenasde televisión, se limitan a insultar, criticar, manipular al espectador, etc. y, ¿es estorealmente entretener?, no desde mi punto de vista, ya que no encuentro divertido ver cómo dos o más personas se “ponen a parir” delante de miles de espectadores y adiscutir sobre temas que carecen de importancia alguna para la sociedad, y que solosirven para llenarles los bolsillos a los “sin vergüenzas” que salen en ellos.',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 1,
         'type' =>1,
         'content' => '',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 2,
         'type' =>1,
         'content' => 'Por otro lado, está la publicidad; cada 20 o 30 minutos, las cadenas creen convenientehacernos tragar 10 minutos de publicidad; cada vez que intentas ver algo en latelevisión, bien sea porque te gusta o porque te interesa, y está a punto de terminar…¡ahí!, es justo entonces cuando aprovechan para poner incluso un cuarto de hora de publicidad, y si no fuera porque tienes un mínimo de interés por lo que estás viendo, tedarían ganas de apagar la televisión e incluso de tirarla por la ventana',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 1,
         'type' =>1,
         'content' => '',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 3,
         'type' =>1,
         'content' => 'Pero ahí no acaba la cosa; ahora en cualquier programa intentan robarnos, y digorobarnos ya que no hay día que no te intenten convencer para que llames o mandes unmensaje a tal sitio, para defender a tal, o apoyar a cual, o cualquier cosa; cualquier cosacon tal de sacarte el dinero.',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 3,
         'type' =>1,
         'content' => 'Sin embargo, en algunas ocasiones la televisión puede resultar entretenida e inclusoeducativa cuando emiten algo que te gusta. Aunque, cuando comienzas a seguir algo,como por ejemplo una serie, y te gusta, disfrutas y te entretienes viéndola, pero cuandoya comienza a resultar aburrida y parece que va a terminar, las cadenas de televisión teamenazan con otras
cien mil 
temporadas',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 1,
         'type' =>1,
         'content' => '',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 2,
         'type' =>1,
         'content' => 'En conclusión, la televisión puede ser buena en cierto modo, si se utiliza con cabeza yse ve un determinado tiempo, no cinco horas al día, pero hay que tener cierto criterio ala hora de elegir lo que vemos en ella, y por supuesto procurar que no sea una necesidadverla, sino que sea por algo que te interesa.',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 2,
         'type' =>1,
         'content' => '',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 3,
         'type' =>1,
         'content' => 'or último, la televisión, en algunos casos, influye notoriamente en la mentalidad de las personas, e incluso crea una gran adicción, lo que conlleva a distintas enfermedadescomo la obesidad o en casos muy graves, problemas psicológicos.',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 2,
         'type' =>1,
         'content' => 'El fin de este texto argumentativo es darle a entender y conocer a la comunidad los proyectosde reciclaje, la importancia de reciclar y conocer la forma de clasificar estos desechos, de estaforma contribuimos en comunidad a evitar el avanzado deterioro del medio ambiente',
         'state' => true
      ]);

      DB::table('search_items')->insert([
         'item_id' => 2,
         'type' =>1,
         'content' => '',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 1,
         'type' =>1,
         'content' => 'Sabemos que la basura es la unión de dos o más desperdicios que provocan contaminación,así que se tomó como solución no revolver los desperdicios que generamos en nuestrasactividades diarias. Quizá es difícil pensar que el ser humano deje de generar basura, pero se hacreado una cultura de protección a nuestro medio ambiente conocido como la separación de losdesperdicios. Debido a la gran cantidad y los tipos de desperdicios, se han optado algunasclasificaciones; la más sencilla y fácil de llevar es la de desechos orgánicos e inorgánicos. En losorgánicos se encuentran los desechos animales, vegetales, restos de comida, telas de fibrasnaturales como el algodón, etc. Entre las inorgánicas encontramos a los metales, vidrio, plásticosy materiales de origen sintético. Hay otro tipo de desechos como el cartón y el papel, quetambién son orgánicos pero que manteniendo limpios y separados a parte, pueden reciclarse.',
         'state' => true
      ]);

      DB::table('search_items')->insert([
         'item_id' => 2,
         'type' =>1,
         'content' => 'os gobiernos nacionales, departamentales y municipales llevan programas de difusiónambiental para hacer campañas publicitarias permanentes y de esta manera dar a conocer a lacomunidad la importancia de clasificar residuos, enseñar a la separación de residuos, larecolección de los residuos sólidos urbanos, y la reutilización que cada desecho pueda tene',
         'state' => true
      ]);
      DB::table('search_items')->insert([
         'item_id' => 3,
         'type' =>1,
         'content' => 'Estos proyectos se elaboran con el fin de concientizar a la ciudadanía, a conocer la verdaderaimportancia del reciclaje, que aunque sea algo de cuidado y atención es un proyecto que beneficiara los hogares en el que se realice y también es una ayuda al medio ambiente y evitar elcrecimiento de la contaminación y calentamiento global',
         'state' => true
      ]);
   }
}
