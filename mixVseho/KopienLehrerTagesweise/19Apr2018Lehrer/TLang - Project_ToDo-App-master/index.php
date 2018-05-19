<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo-App</title>
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:500" rel="stylesheet">
    <link rel="stylesheet" href="./resources/css/reset.css">
    <link rel="stylesheet" href="./resources/css/style.css">
</head>

<body>
    <!-- HEADER SECTION Start -->
    <header>
        <section class="logo">
            <div class="rahmen">
                <h2>Web Developer</h2>
                <h3>PHP</h3>
            </div>
        </section>

        <section class="title">
            <h1>ToDo-App</h1>
        </section>
    </header>
    <!-- HEADER SECTION End -->

    <main class="center">
        <div class="login">
                <?php 
                require_once './resources/inc/init.php'; 
                $form = new \Formgen\Form($conf);
                
                if ($form->isSent()) {
                    $validData = $form->isValid();
                    if (!$validData) {
                        echo $form->render();
                    }
                    else {
                        if ($validData['user'] === 'Test' && $validData['passwort'] === "test12") {
                            header('Location: todo.php');
                        } else {
                            echo $form->render(); 
                        }

                    }
                } 
                else {
                    echo $form->render();
                }


            ?>
        </div>

    </main>

    <footer>&COPY; 2108 TL</footer>
    <script src="./resources/js/todo.js"></script>
</body>

</html>