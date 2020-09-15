<?php

if(isset($_SESSION['user'])) {
    $sesh = $_SESSION['user'];
} else {
    $sesh = array('username' => 'guest');
}

require 'wiki.php';

$wiki = new Wiki();
$files = $wiki->iterate();

if(isset($_GET['id'])) {
    $get_file = $_GET['id'];
} else {
    $get_file = 'notfound';
}

$file = file_get_contents($files[$get_file]);
$markdown = $wiki->parser->parse($file);

?>
<div class="container app">
    <form class="nav" action="/logout" method="POST">
        <h1>Lightscribe</h1>
        <span>Welcome, <?=$sesh['username']?>!</span>
        <button type="submit">Logout</button>
    </form>
    <div class="main">
        <div class="explorer">
            <?php foreach($files as $key => $value): ?>
                <a href="?id=<?=$key?>">
                    <img src="./document.png" alt="document" width="20px" height="20px">
                    <span><?php echo $key ?>.md</span>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="content">
            <?=$markdown?>
        </div>
    </div>
</div>