<?php
namespace App;

//grace au static on va  pouvoir ne pas instancier la class Autoloader mais tous simplement faire Autoload::fonction().
class Autoloader
{
        static function register()
         {
              spl_autoload_register([__CLASS__,'autoload']);
           }        
              
        static function autoload($class)
        {
            // On récupère dans $class la totalité du namespace de la classe concernée  
            // On retire App\....\....
             $class = str_replace(__NAMESPACE__ . '\\', '', $class);

             // On remplace les \ par des /
             $class = str_replace('\\', '/', $class);
            
              // ___class__ , __DIR__ & __NAMESPACE__ sont des constantes magiques
              $fichier = __DIR__ . '/' . $class . '.php';
               //On vérifie si le fichier existe
               if(file_exists($fichier)){
                    require_once $fichier;
               }
             
        }    
        
}
?>