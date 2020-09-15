<?php

$post_routes = array(
    '/register' => function () {
        $connection = new mysqli('localhost', 'admin', 'admin', 'sandbox');
        if($connection->errno) {
            echo $connection->error;
        }

        $username = $connection->real_escape_string($_POST['username']);
        $password = $connection->real_escape_string($_POST['password']);
        $email = $connection->real_escape_string($_POST['email']);

        $connection->query("INSERT INTO users(username, password, email) VALUES ('$username', '$password', '$email')");

        header('location: /');
    },
    '/login' => function () {
        session_start();

        $connection = new mysqli('localhost', 'admin', 'admin', 'sandbox');
        if($connection->errno) {
            echo $connection->error;
        }

        $username = $connection->real_escape_string($_POST['username']);
        $password = $connection->real_escape_string($_POST['password']);

        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

        echo '<script>alert("'.$query.'")</script>';

        $accounts = $connection->query($query);

        if($accounts->num_rows > 0) {
            $account = $accounts->fetch_assoc();
            print_r($account);
            $_SESSION['user'] = $account;
        }

        header('location: /');
    },
    '/logout' => function () {
        session_start();
        session_destroy();
        header('location: /');
    }
);


switch($_SERVER['REQUEST_METHOD']) {
    case 'GET': {
        session_start();
        if(!isset($_SESSION['user'])) {

            if($_SERVER['REQUEST_URI'] == '/register') {

                $header_title = 'Register';
                include 'header.php';
                include 'register.php';

            } else {

                $header_title = 'Login';
                include 'header.php';
                include 'login.php';

            }
        } else {

            $header_title = 'Home';
            include 'header.php';
            include 'app.php';

        }

        include 'footer.php';
        break;
    }
    case 'POST': {
        $request = $_SERVER['REQUEST_URI'];
        if(array_key_exists($request, $post_routes)) {
            $post_routes[$request]();
        }
        break;
    }
}


?>