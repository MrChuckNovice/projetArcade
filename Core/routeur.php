<?php

namespace App\Core

class Main 
{
    public function start()
    {
        //On récupère l'adresse 
        $uri = $_SERVER['REQUEST_URI'];

        // On vérifie si c'est pas vide et si l'URL se termine par un /
        if(!empty(^$uri) && $uri != '/' && $uri[-1] === '/'){
            // Dans ce cas on enlève le /
            $uri = substr($uri, 0, -1,);

            // On envoie une redirection permanente
            http_response_code(301);

            // On redirige vers l'URL dans / 
            header('Location: '.$uri);
            exit;
        }
    }
}
?>