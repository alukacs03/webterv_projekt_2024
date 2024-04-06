<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Termékek</title>
    <meta name="author" content="Lukács Ákos, Sándor Barnabás">
    <meta name="keywords" content="fa, fa szállítás, faszállítás, tüzép, szeged, gyors, tüzifa">
    <meta name="description" content="Rönklovagok Kft. gyors faszállítás olcsón">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../pictures/profilepics/page_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/global_style.css">
    <link rel="stylesheet" href="../styles/termek_style.css">
    <script src="../js/script.js" defer></script>
</head>
<body >
    <?php
        include_once("../templates/header.html");
    ?>
    <main id="termekMain">
        <h1 class="termekTitle">Kategóriák</h1>
        <div id="categorySelectBar">
            <a href="#tuzifa" class="termek">
                <div class="catItemWrapper">
                    <img class="catImage" src="../pictures/products/cat_firewood.png" alt="tűzifa">
                    <h4 class="catBarTitle">Tűzifa</h4>
                </div>
            </a>
            <a href="#fureszAru" class="termek">
                <div class="catItemWrapper">
                    <img class="catImage" src="../pictures/products/cat_planks.png" alt="Fűrészáru">
                    <h4 class="catBarTitle">Fűrészáru</h4>
                </div>
            </a>
            <a href="#osbLapok" class="termek">
                <div class="catItemWrapper">
                    <img class="catImage" src="../pictures/products/cat_OSB.png" alt="OSB lapok">
                    <h4 class="catBarTitle">OSB lapok</h4>
                </div>
            </a>
            <a href="#karacsonyfa" class="termek">
                <div class="catItemWrapper">
                    <img class="catImage" src="../pictures/products/cat_christmastree.png" alt="Karácsonyfa">
                    <h4 class="catBarTitle">Karácsonyfa</h4>
                </div>
            </a>
            <a href="#fogpiszkalo" class="termek">
                <div class="catItemWrapper">
                    <img class="catImage" src="../pictures/products/cat_toothstick.png" alt="Fogpiszkáló">
                    <h4 class="catBarTitle">Fogpiszkáló</h4>
                </div>
            </a>
            <a href="#faszeg" class="termek">
                <div class="catItemWrapper">
                    <img class="catImage" src="../pictures/products/cat_woodendowel.png" alt="Faszeg">
                    <h4 class="catBarTitle">Faszeg</h4>
                </div>
            </a>
        </div>

        <div class="categoryTitleWrapper" id="tuzifa">
            <img class="catImage" src="../pictures/products/cat_firewood.png" alt="Tűzifa">
            <h2 class="categoryTitle">Tűzifa</h2>
        </div>
        <div class="paragraphWrapper">
            <p class="productParagraph">Gondosan válogatott, keményfából származó tűzifánk garantálja a hosszan tartó melegséget és a kellemes lángokat. Tűzifánk kiemelkedő fűtőértékkel bír, így kevesebb tüzelővel is komfortos hőmérsékletet biztosíthat otthonában. A hosszan égő tűzifa kényelmes használatot nyújt, míg a hangulatos lángok meghitt atmoszférát teremtenek kandallójában vagy kályhájában. A Rönklovagok Kft. profi faszállítóként gyorsan és hatékonyan juttatja el a tűzifát otthonába az ország bármely pontjára. Válasszon minket, ha megbízható partnert keres a kiváló minőségű tűzifa kényelmes beszerzéséhez!</p>
        </div>
        <div class="productWrapper woodProducts">
            <div class="productCard">
                <img src="../pictures/products/bukk.jpg" alt="bükkfa" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Bükk</p>
                        <p class="productPrice">59.900 Ft / m<sup>3</sup></p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number">
                        <label>m<sup>3</sup></label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>    
                    </div>
                </div>
            </div>
            <div class="productCard">
                <img src="../pictures/products/tolgy.jpg" alt="tölgyfa" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Tölgy</p>
                        <p class="productPrice">54.900 Ft / m<sup>3</sup></p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number">
                        <label>m<sup>3</sup></label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>    
                    </div>
                </div>
            </div>
            <div class="productCard">
                <img src="../pictures/products/akac.jpg" alt="akácfa" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Akác</p>
                        <p class="productPrice">54.900 Ft / m<sup>3</sup></p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number">
                        <label>m<sup>3</sup></label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>    
                    </div>
                </div>
            </div>
            <div class="productCard">
                <img src="../pictures/products/koris.jpeg" alt="kőrisfa" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Kőris</p>
                        <p class="productPrice">61.900 Ft / m<sup>3</sup></p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number">
                        <label>m<sup>3</sup></label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>    
                    </div>
                </div>
            </div>
            <div class="productCard">
                <img src="../pictures/products/juhar.jpeg" alt="juhar fa" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Juhar</p>
                        <p class="productPrice">55.000 Ft / m<sup>3</sup></p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number">
                        <label>m<sup>3</sup></label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>    
                    </div>
                </div>
            </div>
            <div class="productCard">
                <img src="../pictures/products/fenyo.jpg" alt="fenyőfa" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Fenyő</p>
                        <p class="productPrice">49.900 Ft / m<sup>3</sup></p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number">
                        <label>m<sup>3</sup></label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>    
                    </div>
                </div>
            </div>
            <div class="productCard">
                <img src="../pictures/products/lucfenyo.jpeg" alt="lucfenyő" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Lucfenyő</p>
                        <p class="productPrice">52.000 Ft / m<sup>3</sup></p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number">
                        <label>m<sup>3</sup></label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>    
                    </div>
                </div>
            </div>
        </div>

        
        <div class="categoryTitleWrapper" id="fureszAru">
            <img class="catImage" src="../pictures/products/cat_planks.png" alt="Fűrészáru">
            <h2 class="categoryTitle">Fűrészáru</h2>
        </div>
        <div class="paragraphWrapper">
            <p class="productParagraph">Termékeink gondosan válogatott, hazai erdőkből származó faanyagból készülnek, modern technológiák és szigorú minőségellenőrzés mellett. Fűrészárunk rendkívül strapabíró, ellenálló a vetemedéssel és a gombásodással szemben, így hosszú távú megoldást nyújt építkezési, barkács- és hobbiprojektekhez egyaránt.

                Széles választékban kínálunk deszkákat és léceket különböző méretben, vastagságban és fafajtában, hogy megtalálja az Ön igényeinek és céljainak leginkább megfelelő terméket. Akár tetőfedéshez, burkoláshoz, kerítésépítéshez, bútorasztalos munkákhoz, vagy akár dekorációs célokra keres fűrészárut, a Rönklovagok Kft.-nél biztosan talál megfelelőt.
                
                Csapatunk profi tanácsadással áll az Ön rendelkezésére, hogy segítsen kiválasztani a legoptimálisabb fűrészárut projektjéhez. Továbbá, igény esetén méretre vágjuk a fűrészárut, és akár házhoz is szállítjuk.</p>
        </div>
        <div class="productWrapper woodProducts">
            <div class="productCard">
                <img src="../pictures/products/fenyodeszka.jpeg" alt="fenyő deszka" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Fenyő deszka</p>
                        <p class="productPrice">148.900 Ft / m<sup>3</sup></p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number">
                        <label>m<sup>3</sup></label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>  
                    </div>
                </div>
            </div>
            <div class="productCard">
                <img src="../pictures/products/fenyogerenda.jpeg" alt="fenyő gerenda" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Fenyő gerenda</p>
                        <p class="productPrice">145.900 Ft / m<sup>3</sup></p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number">
                        <label>m<sup>3</sup></label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>  
                    </div>
                </div>
            </div>
            <div class="productCard">
                <img src="../pictures/products/szarufa.jpeg" alt="vegyes szarufa" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Vegyes szarufa</p>
                        <p class="productPrice">177.000 Ft / m<sup>3</sup></p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number">
                        <label>m<sup>3</sup></label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>  
                    </div>
                </div>
            </div>
        </div>

        <div class="categoryTitleWrapper" id="osbLapok">
            <img class="catImage" src="../pictures/products/cat_OSB.png" alt="OSB Lapok">
            <h2 class="categoryTitle">OSB Lapok</h2>
        </div>
        <div class="paragraphWrapper">
            <p class="productParagraph">A Rönklovagok Kft. nem csak a tűzifa és a fűrészáru terén nyújt kiemelkedő minőséget, de az OSB lapok piacán is megbízható partnernek számít. Kínálatunkban megtalálja a legkülönfélébb méretű és vastagságú OSB lapokat, melyek kiválóan alkalmasak építkezési és barkácsmunkák széles skálájához.

                Az OSB lapok (Oriented Strand Board) nagy szilárdságú, teherbíró és nedvességálló építőanyagok, melyeket faforgács préselésével és ragasztásával állítanak elő. Sokoldalúan felhasználhatók tetőfedéshez, falburkoláshoz, padlózathoz, lépcsőépítéshez, bútorgyártáshoz és még sok máshoz.</p>
        </div>
        <div class="productWrapper woodProducts">
            <div class="productCard">
                <img src="../pictures/products/6mmOSB.jpeg" alt="6mm OSB lap" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">6mm OSB lap</p>
                        <p class="productPrice">1.245 Ft / m<sup>2</sup></p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number">
                        <label>m<sup>2</sup></label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>  
                    </div>
                </div>
            </div>
            <div class="productCard">
                <img src="../pictures/products/12mmOSB.jpeg" alt="12mm OSB lap" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">12mm OSB lap</p>
                        <p class="productPrice">2.064 Ft / m<sup>2</sup></p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number">
                        <label>m<sup>2</sup></label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>  
                    </div>
                </div>
            </div>
            <div class="productCard">
                <img src="../pictures/products/12mmNOSB.jpeg" alt="12mm nútféderes OSB" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">12mm nútféderes OSB lap</p>
                        <p class="productPrice">2.127 Ft / m<sup>2</sup></p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number">
                        <label>m<sup>2</sup></label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>  
                    </div>
                </div>
            </div>
            <div class="productCard">
                <img src="../pictures/products/22mmNOSB.jpeg" alt="22mm nútféderes OSB" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">22mm nútféderes OSB lap</p>
                        <p class="productPrice">3.881 Ft / m<sup>2</sup></p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number">
                        <label>m<sup>2</sup></label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>  
                    </div>
                </div>
            </div>
        </div>

        <div class="categoryTitleWrapper" id="karacsonyfa">
            <img class="catImage" src="../pictures/products/cat_christmastree.png" alt="Karácsonyfa">
            <h2 class="categoryTitle">Karácsonyfa</h2>
        </div>
        <div class="paragraphWrapper">
            <p class="productParagraph">A Rönklovagok Kft. nem csak a téli hideg elleni védekezésben, de a karácsonyi hangulat megteremtésében is segít. Gondosan válogatott, friss karácsonyfáinkkal varázslatos ünnepi atmoszférát teremthet otthonában.

                Kínálatunkban megtalálja a klasszikus lucfenyőket és a nordmann fenyőket is, különböző méretben és formában, hogy megtalálja az Önnek legmegfelelőbbet. Karácsonyfáinkat fenntartható erdőgazdálkodásból származtatjuk, így a vásárlásukkal hozzájárul a környezet védelméhez is.</p>
        </div>
        <div class="productWrapper woodProducts">
            <div class="productCard">
                <img src="../pictures/products/luckaracsony.jpeg" alt="lucfenyő karácsonyfa" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Lucfenyő karácsonyfa</p>
                        <p class="productPrice">14.900 Ft / m</p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number">
                        <label>m</label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>  
                    </div>
                </div>
            </div>
            <div class="productCard">
                <img src="../pictures/products/nordmannkaracsony.jpeg" alt="nordmann karácsonyfa" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Nordmann fenyő karácsonyfa</p>
                        <p class="productPrice">19.900 Ft / m</p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number">
                        <label>m</label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>  
                    </div>
                </div>
            </div>
            <div class="productCard">
                <img src="../pictures/products/ronkkaracsony.jpeg" alt="rönklovag karácsonyfa" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Prémium rönklovag karácsonyfa</p>
                        <p class="productPrice">30.900 Ft / m</p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number">
                        <label>m</label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>  
                    </div>
                </div>
            </div>
        </div>

        <div class="categoryTitleWrapper" id="fogpiszkalo">
            <img class="catImage" src="../pictures/products/cat_toothstick.png" alt="Fogpiszkáló">
            <h2 class="categoryTitle">Fogpiszkáló</h2>
        </div>
        <div class="paragraphWrapper">
            <p class="productParagraph">Feledje el az átlagos fogpiszkálókat! A Rönklovagok Kft. prémium minőségű fogpiszkálókat kínál, melyek a mindennapi rutinját is luxussá varázsolják.

                Kínálatunkban olyan fogpiszkálók találhatók, amelyek nemcsak praktikusak, hanem kiemelkedő minőségűek és elegánsak is.
                    
                </p>
                <h3 class="productParagraph">
                A Rönklovagok Kft. fogpiszkálói:
                </h3>
                <p class="productParagraph"><b>Kiválasztott nyírfából készülnek:</b> Kizárólag a legfinomabb, hibátlan nyírfát használjuk, így biztosítva a fogpiszkálók rendkívüli simaságát és szálkamentes használatát.</p>
                <p class="productParagraph">
                    <b>Kényelmes és precíz: </b>Ergonomikus kialakításuknak köszönhetően kényelmesen tarthatók a kézben, pontos és kíméletes tisztítást biztosítva.
                </p>
                <p class="productParagraph">
                    <b>Tartós és megbízható: </b>A nyírfából készült fogpiszkálók rendkívül strapabíróak, nem hajlanak el és nem töredeznek használat közben.
                </p>
                <p class="productParagraph">
                    <b>Letisztult elegancia: </b>Modern dizájnjukkal nemcsak praktikus eszközök, hanem elegáns kiegészítői az asztalnak vagy a neszesszernek.
                </p>
                <p class="productParagraph">
                    A Rönklovagok Kft. prémium minőségű fogpiszkálói azoknak az igényes vásárlóknak szólnak, akik a legjobbat keresik. Tökéletes választás egy elegáns vacsora kiegészítőjeként, vagy a mindennapi fogápolás során is.
                </p>
        </div>
        <div class="productWrapper woodProducts">
            <div class="productCard">
                <img src="../pictures/products/premiumfogpiszkalo.jpeg" alt="prémium fogpiszkáló" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Prémium fogpiszkáló</p>
                        <p class="productPrice">4.999 Ft / 100 db</p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number" min="100" value="100" step="100">
                        <label>db</label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>  
                    </div>
                </div>
            </div>
            <div class="productCard">
                <img src="../pictures/products/simafogpiszkalo.jpeg" alt="fogpiszkáló" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Fogpiszkáló</p>
                        <p class="productPrice">899 Ft / 100 db</p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number" min="100" value="100" step="100">
                        <label>db</label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>  
                    </div>
                </div>
            </div>
            <div class="productCard">
                <img src="../pictures/products/mentolosfogpiszkalo.jpeg" alt="mentolos fogpiszkáló" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Mentolos fogpiszkáló</p>
                        <p class="productPrice">5.999 Ft / 100 db</p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number" min="100" value="100" step="100">
                        <label>db</label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>  
                    </div>
                </div>
            </div>
            <div class="productCard">
                <img src="../pictures/products/fidgetfogpiszkalo.jpeg" alt="fidget spinner fogpiszkáló" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Fidget spinner fogpiszkáló</p>
                        <p class="productPrice">5.000 Ft / db ( + ajándék fidget spinnerrel)</p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number" min="1" value="1">
                        <label>db</label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>  
                    </div>
                </div>
            </div>
        </div>

        <div class="categoryTitleWrapper" id="faszeg">
            <img class="catImage" src="../pictures/products/cat_woodendowel.png" alt="Faszeg">
            <h2 class="categoryTitle">Faszeg</h2>
        </div>
        <div class="paragraphWrapper">
            <p class="productParagraph">A tiplik, más néven faszegek, apró, de annál fontosabb elemei a barkácsolásnak. Ezek a fából készült rögzítőelemek nélkülözhetetlenek, ha két fadarabot szilárdan és tartósan szeretnénk összekötni.

                Cégünk elkötelezett a kiváló minőségű tiplik gyártása mellett. Termékeinket nem gépeken, hanem kézzel készítjük, gondosan válogatott alapanyagokból. Minden egyes tiplit hozzáértő kezek faragnak tökéletesre, hogy Önnek a legjobb rögzítési élményt nyújthassuk.</p>
        </div>
        <div class="productWrapper woodProducts" id="utolso">
            <div class="productCard">
                <img src="../pictures/products/hagyomanyostipli.jpeg" alt="hagyományos faszeg" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Hagyományos faszeg</p>
                        <p class="productPrice">1.199 Ft / 100 db</p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number" min="100" value="100" step="100">
                        <label>db</label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>  
                    </div>
                </div>
            </div>
            <div class="productCard">
                <img src="../pictures/products/barazdalttipli.jpeg" alt="barázdált faszeg" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Barázdált faszeg</p>
                        <p class="productPrice">1.999 Ft / 100 db</p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number" min="100" value="100" step="100">
                        <label>db</label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>  
                    </div>
                </div>
            </div>
            <div class="productCard">
                <img src="../pictures/products/fembetetestipli.jpeg" alt="fémbetétes faszeg" class="productImage">
                <div class="productBottomDiv">
                    <div class="productTextWrapper">
                        <p class="productName">Fémbetétes faszeg</p>
                        <p class="productPrice">3.999 Ft / 100 db</p>
                    </div>
                    <div class="productPurchaseBar">
                        <input class="amountInput" type="number" min="100" value="100" step="100">
                        <label>db</label>
                        <a href="javascript:void(0)">
                            <div class="productCartButton">
                                <img class="cartIcon" src="../pictures/resources/shopping-cart.png" alt="kosár">                                <h3 class="productCartTitle">Kosárba</h3>
                            </div>  
                        </a>  
                    </div>
                </div>
            </div>
        </div>
    </main>
    <a href="#" id="upArrow" class="">
        <div>
            <p>↑</p>
        </div>
    </a>
    <footer id="pageFooter">
        <h2 id="location">6726 Szeged, Rönk utca 1.</h2>
        <div id="footerPhone">
            <img id ="phoneImage" src="../pictures/phone.png" alt="Telefon">
            <h3 id="phoneNumber">+36 20 420 6969</h3>
        </div>
    </footer>
</body>
</html>