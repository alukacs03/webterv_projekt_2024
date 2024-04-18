<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Rönklovagok - Profil</title>
    <meta name="author" content="Lukács Ákos, Sándor Barnabás">
    <meta name="keywords" content="fa, fa szállítás, faszállítás, tüzép, szeged, gyors, tüzifa">
    <meta name="description" content="Rönklovagok Kft. gyors faszállítás olcsón">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../pictures/profilepics/page_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/global_style.css">
    <link rel="stylesheet" href="../styles/index_style.css">

    <script src="../js/regbej.js" defer></script>
</head>
<body>
    <?php 
        include_once "../templates/header.php";
    ?>
    <main>
    <div id="formWrapper">
            <form id="contactForm" action="functions/adatModositas.php" method="POST">
                <h2>Profil adatok</h2>
                <div id="contactTopContainer" style="flex-wrap: row">
                    <div id="contactNameContainer" class="contactContainer">
                        <label for="contactNameInput" class="contactLabel">Név:</label>
                        <input type="text" name="contactNameInput" id="contactNameInput" class="contactInputField" placeholder="Név..." value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : '' ?>" required>
                    </div>
                    <div id="contactEmailContainer" class="contactContainer">
                        <label for="contactEmailInput" class="contactLabel">E-mail:</label>
                        <input type="email" name="contactEmailInput" id="contactEmailInput" class="contactInputField" placeholder="E-mail..." value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>" required>
                    </div>
                    <div id="contactSubjectContainer" class="contactContainer">
                        <label for="newPass" class="contactLabel">Új jelszó:</label>
                        <input type="password" name="newPass" id="newPass" class="contactInputField" placeholder="Új jelszó...">
                    </div>
                    <div id="contactSubjectContainer" class="contactContainer">
                        <label for="currPass" class="contactLabel">Jelenlegi jelszó:</label>
                        <input type="password" name="currPass" id="currPass" class="contactInputField" placeholder="Jelenlegi jelszó..." required>
                    </div>

                </div>

                <button id="contactSubmitButton" name="supportSubmit" type="submit">Adatok módosítása</button>
            </form>
        </div>
    </main>
    <?php 
        include_once "../templates/footer.html";
    ?>
</body>
</html>