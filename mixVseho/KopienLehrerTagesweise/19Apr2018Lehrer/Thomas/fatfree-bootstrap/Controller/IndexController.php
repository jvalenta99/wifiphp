<?php
namespace Controller;

class IndexController {
    protected static $f3;

    public static function render() {
        self::checkF3();
        // Aus Datenbank Content lesen
        $content = '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione magnam commodi sed quis nesciunt neque, quia perferendis unde nobis doloremque explicabo magni quas dolorum? Accusamus impedit illum assumenda perferendis corrupti.</p>';
        $f3 = \Base::instance();
        // VAriablen für Templates vorbereiten
        $f3->set('title','Blog');
        $f3->set('content',$content);

        echo \Template::instance()->render('views/index.html');
    }

    private static function checkF3() {
        if (!self::$f3) {
            self::$f3 = \Base::instance();
        }
    }
}