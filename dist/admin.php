<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login');
    exit;
}

// Initialize variables to hold the announcement data with default values
$announcementType = "Warning"; // Default value
$announcementActive = '';
$announcementMessage = '';

// Read and decode JSON
$dataFile = 'data.json';
if (file_exists($dataFile)) {
    $jsonContent = file_get_contents($dataFile);
    $data = json_decode($jsonContent, true);
} else {
    die("Data file not found.");
}

// Get announcement data
$announcementActive = $data['announcement']['active'] ? 'checked' : '';
$announcementMessage = $data['announcement']['message'];
$announcementType = isset($data['announcement']['type']) ? $data['announcement']['type'] : $announcementType;
$announcementAutoHide = $data['announcement']['auto_hide'] ? 'checked' : '';
$hideTime = isset($data['announcement']['hide_time']) ? $data['announcement']['hide_time'] : '';
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
                        <?php if (isset($_GET['success'])): ?>
                            <?php if ($_GET['success'] == 'true'): ?>
                                <div class="alert alert-success" role="alert"><p>Upozornění bylo úspěšně aktualizováno.</p>
                                <a class="btn btn-primary text-uppercase ms-auto responsive-text-button" href="/">Návrat na web</a>
                                </div>
                            <?php elseif ($_GET['success'] == 'false'): ?>
                                <div class="alert alert-danger" role="alert">Aktualizace upozornění selhala.</div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="text-center">
                            <h2 class="section-heading text-uppercase">Administrace</h2>
                            <h3>Editace oznámení</h3>
                        </div>
                    </div>
                </div>
                <form action="update_announcement.php" method="post">
                    <div class="row text-center justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <label for="message" class="form-label">Text oznámení</label>
                                <textarea id="message" class="form-control" name="message" rows="3" maxlength="1000" required placeholder="Zadejte text upozornění"><?php echo htmlspecialchars($announcementMessage); ?></textarea>
                            </div>
                        </div>
                        <div class="row text-center justify-content-center">
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="type" class="form-label">Typ oznámení</label>
                                    <select id="type" name="type" class="form-select">
                                        <option value="Information" <?php echo $announcementType == 'Information' ? 'selected' : ''; ?>>Informace (modrá)</option>
                                        <option value="Warning" <?php echo $announcementType == 'Warning' ? 'selected' : ''; ?>>Upozornění (žlutá)</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <input type="checkbox" id="active" class="form-check-input" name="active" value="1" <?php echo $announcementActive; ?> onchange="toggleHideOptions(this)">
                                    <label for="active" class="form-label">Zobrazit na webu</label>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8 mb-4">
                                <div class="auto-hide-container disabled text-center" id="autoHideContainer">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <input type="checkbox" id="auto_hide" class="form-check-input" name="auto_hide" value="1" <?php echo $announcementAutoHide; ?> disabled>
                                            <label for="auto_hide" class="form-label">Automaticky skrýt oznámení</label>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="hide_time" class="form-label">Datum a čas skrytí</label>
                                            <input type="datetime-local" id="hide_time" class="form-control" name="hide_time" value="<?php echo $hideTime; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center justify-content-center">
                            <div class="col-md-4 mb-4">
                                <a class="btn btn-primary text-uppercase ms-auto responsive-text-button" href="/">Zpět</a>
                            </div>    
                            <div class="col-md-4">
                                <button class="btn btn-primary text-uppercase" type="submit">Uložit</button>
                            </div>
                        </div>
                    </div>   
                </form>
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
        <script>
        function toggleHideOptions(activeCheckbox) {
            const autoHideCheckbox = document.getElementById('auto_hide');
            const hideTimeInput = document.getElementById('hide_time');
            const autoHideContainer = document.getElementById('autoHideContainer');
            const isChecked = activeCheckbox.checked;

            autoHideCheckbox.disabled = !isChecked;
            hideTimeInput.disabled = !isChecked;

            // Toggle the disabled class for the container
            if (isChecked) {
                autoHideContainer.classList.remove('disabled');
            } else {
                autoHideContainer.classList.add('disabled');
                autoHideCheckbox.checked = false; // Optionally uncheck auto hide when disabling
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            toggleHideOptions(document.getElementById('active'));
        });
        </script>
    </body>
</html>
