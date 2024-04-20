<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['reviewLoginError'] = "Kérjük jelentkezzen be az értékeléshez!";
        $_SESSION['reviewMessage'] = $_POST['contactMessageInput'];
        $headerText = "Location: ../termekleiras.php?id=" . $_POST['productId'];
        header($headerText);
        exit();
    }

    if(isset($_POST['indexIdentifier'])){
        $csillag = $_POST['star'];
        if($csillag == null){
            $_SESSION['reviewLoginError'] = "Kérjük válasszon csillagot az értékeléshez!";
            $_SESSION['indexReviewMessage'] = $_POST['contactMessageInput'];
            header("Location: ../../index.php#reviewTitle");
            exit();
        }
        $message = $_POST['contactMessageInput'];
        $review = [
            "name" => $_SESSION['username'],
            "date" => date("Y.m.d."),
            "stars" => $csillag,
            "message" => $message
        ];
        $reviews = json_decode(file_get_contents("../../data/reviews.json"), true);
        array_push($reviews, $review);
        file_put_contents("../../data/reviews.json", json_encode($reviews, JSON_PRETTY_PRINT));
        unset($_SESSION['reviewMessage']);
        unset($_SESSION['reviewLoginError']);
        header("Location: ../../index.php#reviewTitle");
        exit();
    }

    if(isset($_POST['contactSubmitButton'])){
        $csillag = $_POST['star'];
        if($csillag == null){
            $_SESSION['reviewLoginError'] = "Kérjük válasszon csillagot az értékeléshez!";
            $_SESSION['reviewMessage'] = $_POST['contactMessageInput'];
            $headerText = "Location: ../termekleiras.php?id=" . $_POST['productId'];
            header($headerText);
            exit();
        }
        $message = $_POST['contactMessageInput'];
        $productId = $_POST['productId'];
        $categories = json_decode(file_get_contents("../../data/products.json"), true);
        $categoryId = substr($productId, 0, strpos($productId, "."));
        $review = [
            "username" => $_SESSION['username'],
            "date" => date("Y.m.d."),
            "message" => $message,
            "stars" => $csillag
        ];
        foreach($categories as &$category){
            if($category['id'] == $categoryId){
                $products = $category['products'];
                foreach($products as &$product){
                    if($product['id'] == $productId){
                        $reviews = $product['reviews'];
                        array_push($reviews, $review);
                        $product['reviews'] = $reviews;
                        $category['products'] = $products;
                    }
                }
            }
        }

        file_put_contents("../../data/products.json", json_encode($categories, JSON_PRETTY_PRINT));
        header("Location: ../termekleiras.php?id=" . $productId);
    }

    unset($_SESSION['reviewMessage']);
    unset($_SESSION['reviewLoginError']);
?>