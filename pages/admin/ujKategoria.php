<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: ../../index.php");
    }
    if(isset($_SESSION['admin']) && $_SESSION['admin'] == 0){
        header("Location: ../../index.php");
    }
    $_SESSION['error_name'] = "";
    // && isset($_POST['categoryImageInput']) && trim($_POST['categoryImageInput']) !== ""
    if(isset($_POST['kategoria']) && trim($_POST['kategoria']) !== "" && isset($_POST['descInput']) && trim($_POST['descInput']) !== ""){
        $name = $_POST['kategoria'];
        $description = $_POST['descInput'];
        $categories = json_decode(file_get_contents("../../data/products.json"), true);
        $last = end($categories);
        $id = $last['id'] + 1;
        $abc = [
            "á",
            "é",
            "í",
            "ó",
            "ö",
            "ő",
            "ú",
            "ü",
            "ű"
        ];
        $abc2 = [
            "a",
            "e",
            "i",
            "o",
            "o",
            "o",
            "u",
            "u",
            "u"
        ];
        $href = mb_strtolower($name);
        $href = str_replace($abc, $abc2, $href);
        $image = "kep";

        foreach ($categories as $cat){
            if($cat['href'] == $href){
                $_SESSION['sess_description'] = $description;
                $_SESSION['sess_img'] = $image;
                $_SESSION['error_name'] = "Ez a kategórianév már foglalt. Válassz másikat!";
            }
        }

        if($_SESSION['error_name'] == ""){
            $category = [
                "id" => $id,
                "href" => $href,
                "name" => $name,
                "image" => $image,
                "message" => $description,
                "products" => []
            ];
            array_push($categories, $category);
            file_put_contents("../../data/products.json", json_encode($categories, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
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
            <form id="newCategoryForm" action="ujKategoria.php" enctype="multipart/form-data" method="post">
                <div id="newCategoryWrapper">
                    <h2 class="formTitle">Új kategória hozzáadása</h2>
                    <div class="formWrapper" id="newCategoryFormWrapper">
                        <div class="formTopRow" id="categoryTopRow">
                            <div class="formTopRowField" id="formCatNameDiv">
                                <p class="inputTitle">Kategórianév</p>
                                <input type="text" class="formInput" placeholder="Kategórianév..." required id="kategoria" name="kategoria">
                                <?php
                                    if($_SESSION['error_name'] == "Ez a kategórianév már foglalt. Válassz másikat!"){
                                        echo "<p id='catError'>{$_SESSION['error_name']}</p>";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="formBottomRow">
                            <div class="categoryDescWrapper">
                                <label for="descInput" class="inputTitle">Kategória leírása</label>
                                <?php
                                    if($_SESSION['error_name'] == "Ez a kategórianév már foglalt. Válassz másikat!"){
                                        echo "<textarea name='descInput' id='descInput' cols='30' rows='10' class='descInput formInput' autofocus placeholder='Rövid leírás...' required>{$_SESSION['sess_description']}</textarea>";
                                    }
                                    else{
                                        echo "<textarea name='descInput' id='descInput' cols='30' rows='10' class='descInput formInput' placeholder='Rövid leírás...' required></textarea>";
                                    }
                                ?>
                            </div>
                            <div class="categoryImgWrapper">
                                <div class="categoryImgLeft">
                                    <p class="inputTitle">Kategória képe</p>
                                    <div class="imgWrapper">
                                    <?php
                                        echo "<img class='categoryImagePreview' src='../../pictures/resources/uploadimage.jpeg' alt='Kategóriakép'>";
                                    ?>
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