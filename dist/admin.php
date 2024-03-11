<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Administrátorské rozhraní - Veterina U Kryšpína</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
<body>
    <!-- Masthead-->
    <header class="masthead">
    </header>
    <section class="page-section">
            <div class="container">
                <div class="row text-center justify-content-center">
                    <div class="col-md-6">
                        <div class="text-center">
                            <h2 class="section-heading text-uppercase">Administrace</h2>
                            <h3>Editace upozornění</h3>
                        </div>
                        <form action="update_announcement.php" method="post">
                            <div class="mb-4">
                                <label for="message" class="form-label">Text upozornění</label>
                                <textarea id="message" class="form-control" name="message" rows="3" maxlength="1000" required placeholder="Zadejte text upozornění"></textarea>
                            </div>
                            <div class="mb-4">
                                <input type="checkbox" id="active" class="form-check-input" name="active" value="1">
                                <label for="active" class="form-label">Zobrazit na webu</label>
                            </div>
                            <button class="btn btn-primary text-uppercase" type="submit">Aktualizovat</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
