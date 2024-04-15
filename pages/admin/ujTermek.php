<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: ../../index.php");
    }
    if(isset($_SESSION['admin']) && $_SESSION['admin'] == 0){
        header("Location: ../../index.php");
    }
?>
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
        <?php include_once "../../templates/adminSideNav.php"; ?>
        <div class="adminMainWrapper formPageWrapper">
            <form id="newProductForm" onsubmit="return false;" enctype="multipart/form-data" method="post">
                <div id="newProductWrapper">
                    <h2 class="formTitle">Új termék hozzáadása</h2>
                    <div class="formWrapper" id="newProductFormWrapper">
                        <div class="formTopRow">
                            <div class="formTopRowField" id="formProdNameDiv">
                                <p class="inputTitle">Terméknév</p>
                                <input type="text" class="formInput" placeholder="Terméknév..." required>
                            </div>
                            <div class="formTopRowField" id="formProdCatDiv">
                                <p class="inputTitle">Termék kategória</p>
                                <select name="categorySelector" id="categorySelector" required>
                                    <option value="">-</option>
                                    <option value="tuzifa">Tűzifa</option>
                                    <option value="tuzifa">Fűrészárú</option>
                                    <option value="tuzifa">OSB lapok</option>
                                    <option value="tuzifa">Karácsonyfa</option>
                                    <option value="tuzifa">Fogpiszkáló</option>
                                    <option value="tuzifa">Faszeg</option>
                                </select>
                            </div>
                            <div class="formTopRowField">
                                <p class="inputTitle">Ár</p>
                                <div class="priceInputWrapper">
                                    <input required type="number" min="0" placeholder="Ár..." class="formInput">
                                    <p class="inputTitle">Ft</p>
                                </div>
                            </div>
                            <div class="formTopRowField">
                                <p class="inputTitle">Mértékegység</p>
                                <input type="text" placeholder="m^3" class="formInput" required>
                            </div>
                        </div>
                        <div class="formBottomRow">
                            <div class="productDescWrapper">
                                <label for="descInput" class="inputTitle">Termék leírása</label>
                                <textarea name="descInput" id="descInput" cols="30" rows="10" class="descInput formInput" placeholder="Rövid leírás..." required></textarea>
                            </div>
                            <div class="productImgWrapper">
                                <div class="productImgLeft">
                                    <p class="inputTitle">Termék képe</p>
                                    <div class="imgWrapper">
                                        <img class="productImagePreview" src="../../pictures/resources/uploadimage.jpeg" alt="Termékkép">
                                    </div>
                                </div>
                                <div class="productImgRight">
                                    <div class="imgUploadBtnWrapper">
                                        <label for="productImageInput" class="formButton">Kép választása</label>
                                        <input type="file" name="productImageInput" id="productImageInput" accept="image/*">
                                    </div>
                                    <button id="imgUploadButton" class="formButton">Kép feltöltése...</button>
                                    <button id="imgDeleteButton" class="formButton redButton">Kép törlése...</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id="newProductButton" class="formSubmitButton" type="submit">Termék közzététele</button>
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