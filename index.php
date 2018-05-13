<?php
/**
 * User: Erik Wilson
 * Date: 12-May-18
 * Time: 18:44
 */


// Define a couple of simple actions
class Home {
    public function GET() { include 'home.php'; }
}

class Concerts {
    public function GET() { include 'concerts.php'; }
}

class Artists {
    public function GET() { include 'artists.php'; }
}

class Import {
    public function GET() { include 'import.php'; }
}

class Export {
    public function GET() { include 'export.php'; }
}

class Profile {
    public function GET() { include 'profile.php'; }
}

class Login {
    public function GET() { include 'login.php'; }
}

class Register {
    public function GET() { include 'register.php'; }
}

class Logout {
    public function GET() { include 'logout.php'; }
}

class Install {
    public function GET() { include 'install.php'; }
}

// Mapping of request pattern (URL) to action classes (above)
$routes = array(
    '/' => 'Home',
    '/login' => 'Login',
    '/register' => 'Register',
    '/concerts' => 'Concerts',
    '/artists' => 'Artists',
    '/install' => 'Install',
    '/profile/edit' => 'Profile',
    '/profile/logout' => 'Logout',
    '/data/import' => 'Import',
    '/data/export' => 'Export',
);

// Match the request to a route (find the first matching URL in routes)
$request = '/' . trim($_SERVER['REQUEST_URI'], '/');
$route = null;
foreach ($routes as $pattern => $class) {
    if ($pattern == $request) {
        $route = $class;
        break;
    }
}

// If no route matched, or class for route not found (404)
if (is_null($route) || !class_exists($route)) {
    header('HTTP/1.1 404 Not Found');
    echo 'Page not found';
    exit(1);
}

// If method not found in action class, send a 405 (e.g. Home::POST())
if (!method_exists($route, $_SERVER["REQUEST_METHOD"])) {
    header('HTTP/1.1 405 Method not allowed');
    echo 'Method not allowed';
    exit(1);
}

// Otherwise, return the result of the action
$action = new $route;
$result = call_user_func(array($action, $_SERVER["REQUEST_METHOD"]));
echo $result;

