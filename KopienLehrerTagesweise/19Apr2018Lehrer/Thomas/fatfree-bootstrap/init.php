<?php
define ('PROJECT_ROOT', __DIR__ . '/');
define ('PW_SALT', 'AsdjJK987JLOP_ioadfPOUBzu');

function form_loader($className) {
    // Unix/Linux
    $fileName = PROJECT_ROOT . '/' .  str_replace('\\', '/', $className) . ".php";
    
    if(file_exists($fileName)) {
        require($fileName);
    }
}

require_once ('lib/base.php');
// globales F3 Objekt erstellen
$f3 = Base::instance();

// Routes
$f3->route( 'GET /', '\Controller\IndexController::render');

$f3->route(
    'GET /blog', function ($f3) {
       // Aus Datenbank Content lesen
    $content = '<p>Welcome Blog</p>';

    // VAriablen für Templates vorbereiten
    $f3->set('title','Blog');
    $f3->set('content',$content);

    echo \Template::instance()->render('views/index.html');
       
    }    
);

$f3->route(
    'GET /shop', function ($f3) {
      // Aus Datenbank Content lesen
    $content = '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio quaerat rem, dolorum nostrum id quo neque ad eius repudiandae architecto.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, odio ab odit, nisi fugit aut libero ipsa debitis in magnam architecto sit eveniet est numquam aperiam aliquid doloremque dicta. Similique!</p>';

    // VAriablen für Templates vorbereiten
    $f3->set('title','Shop');
    $f3->set('content',$content);

    echo \Template::instance()->render('views/index.html'); 
    }
    
);




$f3->route(
    'GET /impressum', function ($f3) {
      // Aus Datenbank Content lesen
    $content = '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione magnam commodi sed quis nesciunt neque, quia perferendis unde nobis doloremque explicabo magni quas dolorum? Accusamus impedit illum assumenda perferendis corrupti.</p>';

    // VAriablen für Templates vorbereiten
    $f3->set('title','Impressum');
    $f3->set('content',$content);

    echo \Template::instance()->render('views/content.html');
       
    }
    
);

$f3->run();