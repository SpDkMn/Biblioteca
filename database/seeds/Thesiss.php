<?php
use Illuminate\Database\Seeder;

use App\Thesis as Thesis;

class Thesiss extends Seeder
{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      Thesis::create([
         'type' => 'tesis',
         'clasification' => '23432r',
         'title' => 'Prototipo de una solucion de inteligencia de negocios para la informacion de las compras estatales',
         'edition' => 2013,
         'extension' => '345',
         'escuela' => 'Ingenieria de Sistemas',
         'physicalDetails' => 'Tesis de mediano tamaño',
         'dimensions' => '35 x 24',
         'accompaniment' => 'Incluye 2 cds',
         'librarylocation' => 'Stand B2',
         'publicationLocation' => 'Auditorio de la Facultad de Ingenieria de Sistemas en Informatica',
         'summary' => 'Herramientas de inteligencia de negocios es un tipo de software de aplicaciones diseñado para colaborar con la inteligencia de negocios (BI) en los procesos de las organizaciones. Específicamente se trata de herramientas que asisten el análisis y la presentación de los datos. La vida o el periodo de éxito de un software de inteligencia de negocios dependerá únicamente del éxito de su uso en beneficio de la empresa; si esta empresa es capaz de incrementar su nivel financiero-administrativo y sus decisiones mejoran la actuación de la empresa, el software de inteligencia de negocios seguirá presente mucho tiempo, en caso contrario será sustituido por otro que aporte mejores y más precisos resultados.',
         'conten' => 'magine una herramienta analítica tan intuitiva que cualquiera en su empresa pueda crear informes personalizados y cuadros dinámicos con gran facilidad para explorar amplias cantidades de datos y hallar conocimientos importantes. Eso es Qlik Sense, una aplicación revolucionaria de auto-servicio de descubrimiento y visualización de datos diseñada para individuos, grupos y empresas. Qlik Sense le permite extraer con rapidez visualizaciones. La vida o el periodo de éxito de un software de inteligencia de negocios dependerá únicamente del éxito de su uso en beneficio de la empresa; si esta empresa es capaz de incrementar su nivel financiero-administrativo y sus decisiones mejoran la actuación de la empresa, el software de inteligencia de negocios seguirá presente mucho tiempo, en caso contrario será sustituido por otro que aporte mejores y más precisos resultados.',
         'conclusions' => 'Las visualizaciones inteligentes en combinación con los datos Qlik patentados de su motor de indexación descubren todas las relaciones entre las dimensiones de datos, revelando conocimientos que habrían permanecido ocultos en los modelos tradicionales de datos basados en consultas y jerárquicos',
         'recomendacion' => 'Las visualizaciones inteligentes en combinación con los datos Qlik patentados de su motor de indexación descubren todas las relaciones entre las dimensiones de datos, revelando conocimientos que habrían permanecido ocultos en los modelos tradicionales de datos basados en consultas y jerárquicos',
         'bibliografia' => 'Laberge, Robert (2011) The Data Warehouse mentor. Practical Data Warehouse Business Intelligence Insights .Mc Graw Hill Christopher Adamson (2006) Mastering Data Warehouse Aggregates: Solutions for Star Schema Performance. Wiley. ISBN-13: 978-0471777090. Anahory S. & Murray D. (1997), Data Warehousing in the real world: A practical Guide for Building Decision Support Systems. Addison-Wesley Ed. Jill Dyché & Evan Levy (2006) Customer Data Integration: Reaching a Single Version of the Truth (SAS Institute Inc.). Wiley. ISBN-13: 978-0471916970 Franco J. M. (1997) El Data Warehouse. Ed Gestión. Han J. & Kamber M. (2001) Data Mining: Concepts and Techniques. Morgan Kaufmann.',
         'asesor' => 'Pedro Diaz'
      ]);

      Thesis::create([
         'type' => 'tesina',
         'clasification' => '35432r',
         'title' => 'Guia referencial para el plan de contingencia en un centro de computo para una entidad educativa',
         'edition' => 2015,
         'extension' => '345',
         'escuela' => 'Ingenieria de Software',
         'physicalDetails' => 'Tesis de mediano tamaño',
         'dimensions' => '32 x 24',
         'accompaniment' => 'Incluye 1 cd',
         'librarylocation' => 'Stand A 4',
         'publicationLocation' => 'Auditorio de la Facultad de Ingenieria de Sistemas en Informatica',
         'summary' => 'Herramientas de inteligencia de negocios es un tipo de software de aplicaciones diseñado para colaborar con la inteligencia de negocios (BI) en los procesos de las organizaciones. Específicamente se trata de herramientas que asisten el análisis y la presentación de los datos. La vida o el periodo de éxito de un software de inteligencia de negocios dependerá únicamente del éxito de su uso en beneficio de la empresa; si esta empresa es capaz de incrementar su nivel financiero-administrativo y sus decisiones mejoran la actuación de la empresa, el software de inteligencia de negocios seguirá presente mucho tiempo, en caso contrario será sustituido por otro que aporte mejores y más precisos resultados.',
         'conten' => 'magine una herramienta analítica tan intuitiva que cualquiera en su empresa pueda crear informes personalizados y cuadros dinámicos con gran facilidad para explorar amplias cantidades de datos y hallar conocimientos importantes. Eso es Qlik Sense, una aplicación revolucionaria de auto-servicio de descubrimiento y visualización de datos diseñada para individuos, grupos y empresas. Qlik Sense le permite extraer con rapidez visualizaciones. La vida o el periodo de éxito de un software de inteligencia de negocios dependerá únicamente del éxito de su uso en beneficio de la empresa; si esta empresa es capaz de incrementar su nivel financiero-administrativo y sus decisiones mejoran la actuación de la empresa, el software de inteligencia de negocios seguirá presente mucho tiempo, en caso contrario será sustituido por otro que aporte mejores y más precisos resultados.',
         'conclusions' => 'Las visualizaciones inteligentes en combinación con los datos Qlik patentados de su motor de indexación descubren todas las relaciones entre las dimensiones de datos, revelando conocimientos que habrían permanecido ocultos en los modelos tradicionales de datos basados en consultas y jerárquicos',
         'recomendacion' => 'Las visualizaciones inteligentes en combinación con los datos Qlik patentados de su motor de indexación descubren todas las relaciones entre las dimensiones de datos, revelando conocimientos que habrían permanecido ocultos en los modelos tradicionales de datos basados en consultas y jerárquicos',
         'bibliografia' => 'Laberge, Robert (2011) The Data Warehouse mentor. Practical Data Warehouse Business Intelligence Insights .Mc Graw Hill Christopher Adamson (2006) Mastering Data Warehouse Aggregates: Solutions for Star Schema Performance. Wiley. ISBN-13: 978-0471777090. Anahory S. & Murray D. (1997), Data Warehousing in the real world: A practical Guide for Building Decision Support Systems. Addison-Wesley Ed. Jill Dyché & Evan Levy (2006) Customer Data Integration: Reaching a Single Version of the Truth (SAS Institute Inc.). Wiley. ISBN-13: 978-0471916970 Franco J. M. (1997) El Data Warehouse. Ed Gestión. Han J. & Kamber M. (2001) Data Mining: Concepts and Techniques. Morgan Kaufmann.',
         'asesor' => 'Pedro Diaz'
      ]);
   }
}
