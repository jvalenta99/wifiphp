<?php
require_once 'lib/wifi-lib.php';

$posted = isSent();

if ($posted) {
    if ( exists('contact_name') ) {
       if ( required('contact_name') ) {
           echo 'Jipie';
       }
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kontakt</title>
    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" href="css/layout.css">
</head>
<body>
    <header class="site-header">
        <h1>Kontakt</h1>
    </header>
    <main>
        <h2>Kontaktieren Sie uns</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic incidunt nihil delectus exercitationem recusandae amet dolorum, aperiam facere ducimus adipisci eveniet est molestiae nulla rerum magnam quia debitis, eaque natus?</p>

        <form action="" method="post" class="pure-form pure-form-stacked">
            <label for="contactName">Name <sup>*</sup></label>
            <input type="text" name="contact_name" id="contactName" placeholder="Name">

            <label for="contactEmail">E-Mail <sup>*</sup></label>
            <input type="email" name="contact_email" id="contactEmail" placeholder="name@adresse.com">

            <label for="contactMessage">Nachricht <sup>*</sup></label>
            <textarea name="contact_message" id="contactMessage"></textarea>

            <label for="contactNewsletter">
                <input type="checkbox" name="contact_newsletter" id="contactNewsletter">
                Newsletter abonnieren
            </label>

            <input type="submit" value="Senden" class="pure-button pure-button-primary">
        </form>
    </main>
</body>
</html>