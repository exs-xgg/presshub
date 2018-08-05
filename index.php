
<?php
// Grabs the URI and breaks it apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
// echo $request_uri[0] . "\n";
$uri = explode("/", $request_uri[0]);

include '/database/config.php';


// var_dump($uri);
//API CONTROLLER ROUTES
if (strpos($uri[1], 'api') !== false) {
   $uri = explode("/", $request_uri[0]);
     switch ($uri[2]) {
    
        case 'home':
            require 'class/home.php';
            break;
        // About page
        case 'about':
            require 'class/about.php';
            break;
        case 'login':
            require 'class/login.php';
            break;
        // Everything else
        default:
            header('HTTP/1.0 404 Not Found');
            require 'class/404.php';
            break;
    }  
}else{



//PAGE VIEW CONTROLLERS
switch ($request_uri[0]) {
    // Home page
    case '/':
        require 'blades/home.php';
        break;
    // Home page
    case '/home':
        require 'blades/home.php';
        break;
    // About page
    case '/about':
        require 'blades/about.php';
        break;
    case '/login':
        require 'class/security.php';
    	require 'blades/login.php';
        break;
    // Everything else
    default:
        header('HTTP/1.0 404 Not Found');
        require 'blades/404.html';
        break;
}
}