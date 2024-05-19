<?php
include __DIR__ . "/src/class/pctrsession/SessionClass.php";
include __DIR__ . "/src/class/pctrsession/PostClass.php";
include __DIR__ . "/src/class/pctrsession/GetClass.php";
$sessionClass = new SessionClass();
$postClass = new PostClass();
$getClass = new GetClass();

$ind="acc";
if($getClass->isKeyExist("ind")) {
  $ind=$getClass->getValueSt("ind");
}

if($ind=="conn") {
  if($postClass->isKeyExist("pseudo") && $postClass->isKeyExist("pass")) {
    $pass = $postClass->getValueSt("pass");
    $postClass->del("pass");
    $sessionClass->connected($postClass->getTab());
  }
  //header('Location: ./');
} else if($ind=="deconn") {
  $sessionClass->deconnected();
  //header('Location: ./');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/style_media.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />
</head>
<body>
    <header>
      <div class="all-logo">
        <img
            src="./favicon.ico"
            alt="logo site"
        />
      </div>
      <menu>
        <label id="menu-burger" for="menu-display">
          <i class="bi bi-list"></i>
        </label>
        <input type="checkbox" name="menu display" id="menu-display" />
        <ul class="all-bt-menu">
          <li class="bt-menu no-submenu">
            <a href="./">acc</a>
            <?php if($sessionClass->isConnected("pseudo")) { ?>
              <a href="./?ind=deconn">deconnected</a>
            <?php } else { ?>
              <a href="./?ind=login">login</a>
            <?php } ?>
          </li>
        </ul>
      </menu>
    </header>
    <section class="firstsection">
        <?php 

        if($ind=="login") { ?>
          <h1>Login</h1>
          <form action="./?ind=conn" method="post">
            <label for="pseudo">pseudo</label><input type="text" name="pseudo" id="pseudo">
            <label for="pass">pass</label><input type="password" name="pass" id="pass">
            <button type="submit">Valider</button>
          </form>
        <?php } else { 
          $name = "all";
          if($sessionClass->isConnected("pseudo")) {
            $name = $_SESSION["pseudo"];
          }
          ?>
          <h1>Welcome <?= $name ?></h1>
        <?php } ?>
    </section>
</body>
</html>
