<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: ../../index.php");
    }
    if(isset($_SESSION['admin']) && $_SESSION['admin'] == 0){
        header("Location: ../../index.php");
    }
    $id = $_GET['id'];
    unset($_SESSION['sess_img']);
    $oldCat;
    $oldId = $id;
    $oldCatId = explode('.', $id)[0];
    $categories = json_decode(file_get_contents("../../data/products.json"), true);
    if(!isset($SESSION['done'])){
        foreach($categories as $category){
            $catId = explode('.', $id)[0];
            if($category['id'] == $catId){
                $oldProducts = $category['products'];
                foreach($oldProducts as $product){
                    if($id == $product['id']){
                        $_SESSION['product'] = $product['title'];
                        $_SESSION['sess_description'] = $product['description'];
                        $_SESSION['category'] = $category['name'];
                        $oldCat = $category['name'];
                        $_SESSION['price'] = $product['price'];
                        $_SESSION['measure'] = $product['measure'];
                        $_SESSION['sess_img'] = $product['image'];
                        $_SESSION['oldDatas'] = true;
                        break;
                    }
                }
            }
    }
    }
    else{
        unset( $SESSION['done'] );
    }

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
              $cel = $_SESSION['sess_img'];
              if (move_uploaded_file($_FILES["productImageInput"]["tmp_name"], $cel)) {
                unset($_SESSION['error_name']);
                unset( $_SESSION['oldDatas']);
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
                $products;
                $actCat = [];
                foreach ($categories as $category) {
                    if($category['name'] == $_SESSION['category']){
                        $products = $category['products'];
                        $actCat = $category;
                        break;
                    }
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
                foreach ($products as $prod){
                    if($prod['imagealt'] == $alt && $id != $prod['id']){
                        $_SESSION['error_name'] = "Ez a terméknév már foglalt. Válassz másikat!";
                        unset( $_SESSION['oldDatas']);
                        break;
                    }else{
                        unset($_SESSION['error_name']);
                    }
                }    
                
                
                if(!isset($_SESSION['error_name'])){
                    if($_SESSION['category'] == $oldCat){
                        rename($_SESSION['sess_img'], "../../pictures/products/" . $alt . ".png");
                        $_SESSION['sess_img']= "../../pictures/products/" . $alt . ".png";
                        foreach ($products as &$product){
                            if($product['id'] == $id){
                                $product['title'] =  $_SESSION['product'];
                                $product['image'] = $_SESSION['sess_img'];
                                $product['price'] = $_SESSION['price'];
                                $product['measure'] = $_SESSION['measure'];
                                $product['description'] = $_SESSION['sess_description'];
                                $product['imagealt'] = $alt;
                            }
                        }
                        $actCat['products'] = $products;
                        foreach ($categories as &$category) {
                            if($category['name'] == $_SESSION['category']){
                                $category = $actCat;
                                break;
                            }
                        }
                        file_put_contents("../../data/products.json", json_encode($categories, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                        unset($_SESSION['sess_img']);
                        unset($_SESSION['sess_description']);
                        unset($_SESSION['category']);
                        unset($_SESSION['product']);
                        unset($_SESSION['price']);
                        unset($_SESSION['measure']);
                        unset($_SESSION['noImage']);
                        $SESSION['done'] = true;
                        header('Location: ./termekLista.php');
                    }
                    else{
                        echo "fasz";
                        rename($_SESSION['sess_img'], "../../pictures/products/" . $alt . ".png");
                        $_SESSION['sess_img']= "../../pictures/products/" . $alt . ".png";
                        $categories = json_decode(file_get_contents("../../data/products.json"), true);
                        foreach($categories as $category2){
                            if($category2["name"] == $_SESSION["category"]){
                                $products = $category2['products'];
                                $actCat = $category2;
                                if(count($products) > 0){
                                    $last = end($products);
                                    $idBefore = explode('.', $last['id'])[1] + 1;
                                    $id = $actCat['id'] . "." . $idBefore;
                                }
                                else{
                                    $id = $actCat['id'] . ".1";
                                }
                            }
                        }

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
                        
                        foreach($categories as $category2){
                            if($category2["name"] == $_SESSION["category"]){
                                $products = $category2['products'];
                                $actCat = $category2;
                            }
                        }
                        array_push($products, $product);
                        $actCat['products'] = $products;
                        foreach ($categories as &$category2) {
                            if($category2['name'] == $_SESSION['category']){
                                $category2 = $actCat;
                                break;
                            }
                        }
                        foreach($categories as &$category){
                            $products = &$category["products"];
                            foreach ($products as $product){
                                if($product['id'] === $oldId){
                                    unset($products[array_search($product, $products)]);
                                }
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
                        $SESSION['done'] = true;
                        header('Location: ./termekLista.php');
                    }                    
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
            <form id="newProductForm" action="termekModosit.php?id=<?php echo $id?>" enctype="multipart/form-data" method="post">
                <div id="newProductWrapper">
                    <h2 class="formTitle">Termék módosítása</h2>
                    <div class="formWrapper" id="newProductFormWrapper">
                        <div class="formTopRow">
                            <div class="formTopRowField" id="formProdNameDiv">
                                <p class="inputTitle">Terméknév</p>
                                <input name="termek" type="text" class="formInput" placeholder="Terméknév..." value="<?php if((isset($_FILES["productImageInput"]) && isset($_POST['imgUpload']) && !isset($_SESSION['error_name']) && isset($_SESSION['product'])) || isset($_SESSION['oldDatas'])){echo "{$_SESSION['product']}";} ?>" >
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
                                        echo "<img class='categoryImagePreview' src={$_SESSION['sess_img']} alt='Termékkép'>";
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
                    <button name="productSave" id="newProductButton" class="formSubmitButton" type="submit">Termék módosítása</button>
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