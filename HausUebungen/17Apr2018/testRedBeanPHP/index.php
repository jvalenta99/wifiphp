<?php
    require 'rb.php';
    //R::setup();
    R::setup( 'mysql:host=localhost;dbname=redbeantest', 'root', '' );

    $post = R::dispense( 'post' );
    $post->title = 'My holiday';
    $id = R::store( $post );

    $post = R::load( 'post', $id );
    echo $post['title'];
