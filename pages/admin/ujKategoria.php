<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Rönklovagok - Admin</title>
    <meta name="author" content="Lukács Ákos, Sándor Barnabás">
    <meta name="keywords" content="fa, fa szállítás, faszállítás, tüzép, szeged, gyors, tüzifa">
    <meta name="description" content="Rönklovagok Kft. gyors faszállítás olcsón">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../pictures/profilepics/page_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../styles/global_style.css">
    <link rel="stylesheet" href="../../styles/admin_style.css">
    <script src="../../js/regbej.js" defer></script>
</head>
<body>
    <header id="pageHeader">
        <nav class="menuBar" id="adminMenuBar">
            <h3 id="adminTitle"><a href="admin.php">Rönklovagok Admin Felület</a></h3>
            <ul class="menu" id="adminBackToPage">
                <li class="menuItem"><a class="menuLink" href="../../index.php">Vissza az oldalra</a></li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
    <main>
        <nav id="sideNav">
            <ul class="sideMenu" id="adminSideNavMenu">
                <li class="sideMenuItem"><a class="sideMenuLink" href="ujTermek.php">Új termék</a></li>
                <li class="sideMenuItem"><a class="sideMenuLink" href="#">Új kategória</a></li>
                <li class="sideMenuItem"><a class="sideMenuLink" href="megrendelesek.php">Megrendelések</a></li>
            </ul>
            <div class="sideHamburger">
                <span class="sideBar"></span>
                <span class="sideBar"></span>
                <span class="sideBar"></span>
            </div>
        </nav>
        <div class="adminMainWrapper formPageWrapper">
            <form id="newCategoryForm" onsubmit="return false;" enctype="multipart/form-data" method="post">
                <div id="newCategoryWrapper">
                    <h2 class="formTitle">Új kategória hozzáadása</h2>
                    <div class="formWrapper" id="newCategoryFormWrapper">
                        <div class="formTopRow" id="categoryTopRow">
                            <div class="formTopRowField" id="formCatNameDiv">
                                <p class="inputTitle">Kategórianév</p>
                                <input type="text" class="formInput" placeholder="Kategórianév..." required>
                            </div>
                        </div>
                        <div class="formBottomRow">
                            <div class="categoryDescWrapper">
                                <label for="descInput" class="inputTitle">Kategória leírása</label>
                                <textarea name="descInput" id="descInput" cols="30" rows="10" class="descInput formInput" placeholder="Rövid leírás..." required></textarea>
                            </div>
                            <div class="categoryImgWrapper">
                                <div class="categoryImgLeft">
                                    <p class="inputTitle">Kategória képe</p>
                                    <div class="imgWrapper">
                                        <img class="categoryImagePreview" src="../../pictures/resources/uploadimage.jpeg" alt="Kategóriakép">
                                    </div>
                                </div>
                                <div class="categoryImgRight">
                                    <div class="imgUploadBtnWrapper">
                                        <label for="categoryImageInput" class="formButton">Kép választása</label>
                                        <input type="file" name="categoryImageInput" id="categoryImageInput" accept="image/*">
                                    </div>
                                    <button id="imgUploadButton" class="formButton">Kép feltöltése...</button>
                                    <button id="imgDeleteButton" class="formButton redButton">Kép törlése...</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id="newCategoryButton" class="formSubmitButton" type="submit">Kategória mentése</button>
                </div>
            </form>
        </div>
    </main>
    <footer id="pageFooter">
        <h2 id="location">6726 Szeged, Rönk utca 1.</h2>
        <div id="footerPhone">
            <img id ="phoneImage" src="../../pictures/phone.png" alt="Telefon">
            <h3 id="phoneNumber">+36 20 420 6969</h3>
        </div>
    </footer>
</body>
</html>