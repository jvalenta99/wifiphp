<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./resources/css/reset.css">
    <link rel="stylesheet" href="./resources/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond|Roboto" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="centered">
            <header>
                <h1>Thomas</h1>
            </header>
            <div class="main_col2">
                <!-- <div class="main_nav"> -->
                <nav>
                    <span>
                        <a href="./index.php">Home</a>
                    </span>
                    <span>
                        <a href="./addition.php">Die Summe</a>
                    </span>
                    <span>
                        <a href="./four.php">Erweitert</a>
                    </span>
                </nav>
                <!--  </div> -->
                <main>
                    <section class="highlight">
                        <h2>Blindtext</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic aliquam omnis blanditiis impedit harum?
                            Itaque quos assumenda vero aperiam explicabo, iste ullam, nihil dignissimos deserunt aliquam
                            porro officia libero numquam reprehenderit molestias ut quam illo maiores praesentium perferendis
                            saepe aspernatur ipsa sunt labore. Eos autem, placeat fugit magnam quas accusamus aliquam doloremque
                            consequuntur quisquam nostrum sint recusandae earum repellat dicta voluptatem! Tempore, fuga
                            nesciunt incidunt veniam alias nam repudiandae eum magnam reprehenderit reiciendis dolor similique
                        </p>
                    </section>

                    <section class="smallhighlight">
                        <div class="underheader">
                            <h3>Blindtext</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum accusamus delectus harum
                                sed rem numquam fugit illo. Enim totam, nam quas, repellat perspiciatis rem eius impedit
                                sapiente laboriosam commodi harum dolor tempora odit expedita unde tempore! Eum, ut praesentium
                            </p>
                        </div>
                        <div class="underheader">
                            <h3>Blindtext</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum accusamus delectus harum
                                sed rem numquam fugit illo. Enim totam, nam quas, repellat perspiciatis rem eius impedit
                                sapiente laboriosam commodi harum dolor tempora odit expedita unde tempore! Eum, ut praesentium
                            </p>
                        </div>
                    </section>

                </main>
            </div>
            <footer>
                <h4>&copy; 2017<?php
                    if (date("Y") >= "2017") {
                        echo " - " . date("Y");
                        } 
                ?></h4>
            </footer>
        </div>
        <!-- div.centered -->
    </div>
    <!-- div.container -->
</body>


</html>