
<?php
// Grabs the URI and breaks it apart in case we have querystring stuff

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
// echo $request_uri[0] . "\n";
$uri = explode("/", $request_uri[0]);

include '/database/config.php';

error_reporting(E_ERROR | E_WARNING | E_PARSE);
// var_dump($uri);
//API CONTROLLER ROUTES
if (strpos($uri[1], 'api') !== false) {
   $uri = explode("/", $request_uri[0]);
     switch ($uri[2]) {
        
        case 'user':
            require 'class/UserController.php';
            break;
        // About page
        case 'about':
            require 'class/about.php';
            break;
        case 'login':
            require 'class/login.php';
            break;
        case 'role':
            require 'class/RoleController.php';
            break;
        case 'issue':
            require 'class/IssueController.php';
            break;
        case 'announcement':
            require 'class/CarouselController.php';
            break;
        case 'carouselActive':
            require 'class/CarouselActiveController.php';
            break;
        // Everything else
        default:
            header('HTTP/1.0 404 Not Found');
            require 'class/404.php';
            break;
    }  
}else{



//PAGE VIEW CONTROLLERS
    session_start();
switch ($uri[1]) {
    // Home page
    case '':
        require 'blades/home.php';
        break;
    // Home page
    case 'home':
        require 'blades/home.php';
        break;
    // About page
    case 'about':
        require 'blades/about.php';
        break;
    case 'user':
        require 'class/security.php';
        require 'blades/user.php';
        break;
    case 'login':
        require 'class/security.php';
    	require 'blades/login.php';
        break;
    case 'userstatus':
        require 'class/UserStatusController.php';
        break;
    case 'admin':
        require 'blades/admin.php';
        break;
    case 'dashboard':
        require 'blades/dashboard.php';
        break;
    // Everything else
    case '500':
         header('HTTP/1.0 500');
         require 'blades/500.php';
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        require 'blades/404.php';
        break;
}
}