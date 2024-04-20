<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: ../../index.php");
    }
    if(isset($_SESSION['admin']) && $_SESSION['admin'] == 0){
        header("Location: ../../index.php");
    }

    $id = $_GET['id'];

    if (isset($_FILES["productImageInput"]) && isset($_POST['imgUpload'])) {
        $_SESSION['product'] = $_POST['termek'];
        $_SESSION['sess_description'] = $_POST['descInput'];
        $_SESSION['category'] = $_POST['categorySelector'];
        $_SESSION['price'] = $_POST['price'];
        $_SESSION['measure'] = $_POST['measure'];
        $engedelyezett_kiterjesztesek = ["jpg", "jpeg", "png"];
        $kiterjesztes = strtolower(pathinfo($_FILES["productImageInput"]["name"], PATHINFO_EXTENSION));
        if (in_array($kiterjesztes, $engedelyezett_kiterjesztesek)) {
          if ($_FILES["productImageInput"]["error"] === 0) {
            if ($_FILES["productImageInput"]["size"] <= 31457280) {
              $cel = "../../pictures/products/kep.png";
              if (move_uploaded_file($_FILES["productImageInput"]["tmp_name"], $cel)) {
                $_SESSION['vanKepTermek'] = 1;
                $_SESSION['sess_img'] = $cel;
                unset($_SESSION['error_name']);
              }
            } 
          }
        }
      }

    if(isset($_POST['productSave']) && isset($_POST['termek']) && trim($_POST['termek']) !== "" && isset($_POST['descInput']) && trim($_POST['descInput']) !== ""){
        if(isset($_SESSION['sess_img'])){
            $_SESSION['product'] = $_POST['termek'];
            $_SESSION['sess_description'] = $_POST['descInput'];
            $_SESSION['category'] = $_POST['categorySelector'];
            $_SESSION['price'] = $_POST['price'];
            $_SESSION['measure'] = $_POST['measure'];
            $categories = json_decode(file_get_contents("../../data/products.json"), true);
            $products;
            $actCat = [];
            foreach ($categories as $category) {
                if($category['name'] == $_SESSION['category']){
                    $products = $category['products'];
                    $actCat = $category;
                    break;
                }
            }
            $ell = false;
            if(count($products) > 0){
                $last = end($products);
                $idBefore = explode('.', $last['id'])[1] + 1;
                $id = $actCat['id'] . "." . $idBefore;
            }
            else{
                $id = $actCat['id'] . ".1";
                $ell = true;
            }
            
            $abc = [
                "á",
                "é",
                "í",
                "ó",
                "ö",
                "ő",
                "ú",
                "ü",
                "ű",
                " "
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
                "u",
                "_"
            ];
            $alt = mb_strtolower($_SESSION['product']);
            $alt = str_replace($abc, $abc2, $alt);
            unset($_SESSION['error_name']);
            if(!$ell){
                foreach ($products as $prod){
                    if($prod['imagealt'] == $alt){
                        $_SESSION['error_name'] = "Ez a terméknév már foglalt. Válassz másikat!";
                        break;
                    }else{
                        unset($_SESSION['error_name']);
                    }
                }    
            }
            
            if(!isset($_SESSION['error_name'])){
                rename("../../pictures/products/kep.png", "../../pictures/products/" . $alt . ".png");
                $_SESSION['sess_img']= "../../pictures/products/" . $alt . ".png";
                $product = [
                    "id" => $id,
                    "image" => $_SESSION['sess_img'],
                    "imagealt" => $alt,
                    "title" => $_SESSION['product'],
                    "price" => $_SESSION["price"],
                    "measure" => $_SESSION["measure"],
                    "description" => $_SESSION['sess_description'],
                    "reviews" => []
                ];
                array_push($products, $product);
                $actCat['products'] = $products;
                foreach ($categories as &$category) {
                    if($category['name'] == $_SESSION['category']){
                        $category = $actCat;
                        break;
                    }
                }
                
                file_put_contents("../../data/products.json", json_encode($categories, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                unset($_SESSION['vanKepTermek']);
                unset($_SESSION['sess_img']);
                unset($_SESSION['sess_description']);
                unset($_SESSION['category']);
                unset($_SESSION['product']);
                unset($_SESSION['price']);
                unset($_SESSION['measure']);
                unset($_SESSION['noImage']);

            }
        }
        else{
            $_SESSION['noImage'] = 1;
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
            <form id="newProductForm" action="ujTermek.php" enctype="multipart/form-data" method="post">
                <div id="newProductWrapper">
                    <h2 class="formTitle">Új termék hozzáadása</h2>
                    <div class="formWrapper" id="newProductFormWrapper">
                        <div class="formTopRow">
                            <div class="formTopRowField" id="formProdNameDiv">
                                <p class="inputTitle">Terméknév</p>
                                <input name="termek" type="text" class="formInput" placeholder="Terméknév..." value="<?php if(isset($_FILES["productImageInput"]) && isset($_POST['imgUpload']) && !isset($_SESSION['error_name']) && isset($_SESSION['product'])){echo "{$_SESSION['product']}";} ?>" >
                            </div>
                            <div class="formTopRowField" id="formProdCatDiv">
                                <p class="inputTitle">Termék kategória</p>
                                <select name="categorySelector" id="categorySelector">
                                    <?php
                                        if(isset($_SESSION["category"])){
                                            echo $_SESSION["category"];
                                        }
                                        else{
                                            echo $_SESSION["category"];
                                        }
                                        $cats = json_decode(file_get_contents("../../data/products.json"), true);
                                        foreach ($cats as $cat){
                                            if($cat["name"] == $_SESSION["category"]){
                                                echo "<option selected value='{$cat['name']}'>{$cat['name']}</option>";
                                            }
                                            else{
                                                echo "<option value='{$cat['name']}'>{$cat['name']}</option>";
                                            }
                                        }
                                    ?>
                                    
                                </select>
                            </div>
                            <div class="formTopRowField">
                                <p class="inputTitle">Ár</p>
                                <div class="priceInputWrapper">
                                    <input name="price" type="number" min="0" placeholder="Ár..." class="formInput" value="<?php if(isset($_SESSION['price'])){echo "{$_SESSION['price']}";} ?>">
                                    <p class="inputTitle">Ft</p>
                                </div>
                            </div>
                            <div class="formTopRowField">
                                <p class="inputTitle">Mértékegység</p>
                                <input name="measure" type="text" placeholder="m^3" class="formInput" value="<?php if(isset($_SESSION['measure'])){echo "{$_SESSION['measure']}";} ?>">
                            </div>
                        </div>
                        <div class="formBottomRow">
                            <div class="productDescWrapper">
                                <label for="descInput" class="inputTitle">Termék leírása</label>
                                <textarea name="descInput" id="descInput" cols="30" rows="10" class="descInput formInput" placeholder="Rövid leírás..."><?php if(isset($_SESSION['sess_description'])){echo "{$_SESSION['sess_description']}";} ?></textarea>
                            </div>
                            <div class="productImgWrapper">
                                <div class="productImgLeft">
                                    <p class="inputTitle">Termék képe</p>
                                    <div class="imgWrapper">
                                    <?php
                                        if(!isset($_SESSION['vanKepTermek'])){
                                            echo "<img class='categoryImagePreview' src='../../pictures/resources/uploadimage.jpeg' alt='Termékkép'>";
                                        }
                                        else {
                                            echo "<img class='categoryImagePreview' src='../../pictures/products/kep.png' alt='Termékkép'>";
                                        }
                                    ?>
                                    </div>
                                </div>
                                <div class="productImgRight">
                                    <div class="imgUploadBtnWrapper">
                                        <label for="productImageInput" class="formButton">Kép választása</label>
                                        <input type="file" name="productImageInput" id="productImageInput" accept="image/*">
                                    </div>
                                    <button name="imgUpload" id="imgUploadButton" class="formButton">Kép feltöltése...</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        if(isset($_SESSION["error_name"]) && $_SESSION["error_name"] != ""){
                            echo $_SESSION["error_name"];
                        }
                    ?>
                    <button name="productSave" id="newProductButton" class="formSubmitButton" type="submit">Termék közzététele</button>
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