<?php //require('./src/View/includes/header.php'); 
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./vendor/font/css/all.min.css">
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./../vendor/bootstrap/js/bootstrap.min.js"></script>
    <title>Gestion conges contrats </title>

<body>
    </head>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="./assets/images/cropped-logo-uni2grow-1.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a style="margin-left:600px;" class="nav-link active bg-danger" aria-current="page" href="./Accuiel.php">Acceuil</a>
                        <a class="nav-link" href="#contact">Nous Conctacter</a>
                        <a class="nav-link" href="./src/source/login.php">Connectez-vous</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-sm-md-lg-xl-fluid">

        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="./assets/images/small-4.jpg" class="d-block w-100 " style="height: 590px;" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <a class="btn btn-danger" href="./src/source/login.php">Connection</a>
                        <p><strong>
                                <h1 class="col-sm-12 col-md-12 col-lg-12" style="color:brown; position:relative; top: -400px; left:45px; font-size:60px">Gestion Congés Contrats</h1>
                            </strong></p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="./assets/images/small-1.jpg" class="d-block w-100" style="height: 590px;" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <a class="btn btn-danger" href="./src/source/login.php">Connection</a>
                        <p><strong>
                                <h1 class="col-sm-12 col-md-12 col-lg-12" style="color:brown; position:relative; top: -400px; left:45px; font-size:60px">Gestion Congés Contrats</h1>
                            </strong></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./assets/images/bg-auth.jpg" class="d-block w-100" style="height: 590px;" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <a class="btn btn-danger" href="./src/source/login.php">Connection</a>
                        <p><strong>
                                <h1 class="col-sm-12 col-md-12 col-lg-12" style="color:brown; position:relative; top: -400px; left:45px; font-size:60px">Gestion Congés Contrats</h1>
                            </strong></p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <section id="contact" class="contact" style="background-color:rgb(234, 234, 247);">
        <div class="container" data-aos="fade-up">
            <center>
                <br><br>
                <div class="section-title">
                    <h2>Contact Nous!!!!!</h2>
                </div><br><br>
            </center>
            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="fas fa-map"></i>
                                <h3>Notre Adresse</h3>
                                <p>Dschang Immeuble SOCINAN Total marche B </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                            <i class="fas fa-envelope"></i>
                                <h3>Adresses Emails</h3>
                                  <p>franck@gmail.com<br>sorel@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                            <i class="fas fa-phone"></i>
                                <h3>Contacter Nous</h3>
                                <p> +237 673 869 461<br>+237 690 075 615</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col form-group">
                                <label for="">Nom</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Votre nom" required>
                            </div>
                            <div class="col form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="votre Email" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label for="">Sujet</label>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" required>
                        </div><br>
                        <div class="form-group">
                            <label for="">Message</label>
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-danger">Send Message</button></div>
                    </form>
                </div>

            </div>

        </div><br><br>
    </section><!-- End Contact Section -->




    <footer class="bd-footer py-5 mt-5 bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3 mb-3">
                    <img src="./assets/images/cropped-logo-uni2grow-1.png" alt="">
                    <ul class="list-unstyled small text-muted"><br>
                        <li class="mb-2">Designed and built with all the love in the world by the <a href="#">Bootstrap team</a>
                            with the help of <a href="#">our contributors</a>.</li>
                        <li class="mb-2">Code licensed <a href="#">MIT</a>, docs <a href="#">CC BY 3.0</a>.</li>
                        <li class="mb-2">Currently v5.1.3.</li>
                        <li class="mb-2">Analytics by <a href="#">Fathom</a>.</li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 offset-lg-1 mb-3">
                    <h4>Links</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Home</a></li>
                        <li class="mb-2"><a href="#">Docs</a></li>
                        <li class="mb-2"><a href="#">Examples</a></li>
                        <li class="mb-2"><a href="#">Themes</a></li>
                        <li class="mb-2"><a href="#">Blog</a></li>
                        <li class="mb-2"><a href="#">Swag Store</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-3">
                    <h4>Guides</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Getting started</a></li>
                        <li class="mb-2"><a href="#">Starter template</a></li>
                        <li class="mb-2"><a href="#">Webpack</a></li>
                        <li class="mb-2"><a href=#>Parcel</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-3">
                    <h4>Projects</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Bootstrap 5</a></li>
                        <li class="mb-2"><a href="#">Bootstrap 4</a></li>
                        <li class="mb-2"><a href="#">Icons</a></li>
                        <li class="mb-2"><a href="#">RFS</a></li>
                        <li class="mb-2"><a href="#">npm starter</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-3">
                    <h4>Community</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Issues</a></li>
                        <li class="mb-2"><a href="#">Discussions</a></li>
                        <li class="mb-2"><a href="#">Corporate sponsors</a></li>
                        <li class="mb-2"><a href="#">Open Collective</a></li>
                        <li class="mb-2"><a href="#">Slack</a></li>
                        <li class="mb-2"><a href="#">Stack Overflow</a></li>
                    </ul>
                </div>
            </div>
    </footer>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fas fa-arrow"></i></a>

</body>

</html>