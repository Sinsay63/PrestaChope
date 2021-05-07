<html>
    <head>
        <title>Accueil</title>
        <link rel="stylesheet" type="text/css" href="assets/css/accueil.css">
    </head>
    <body>
        <main>
            <div class="slideshow-container">
                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                        <img src="assets/images/grimbergen.png" style="width:100%;height:574px">
                </div>
                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                        <img src="assets/images/abbaye.jpg" style="width:100%;height:574px">
                </div>
                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                        <img src="assets/images/biere-artisanale-larzac.jpg" style="width:100%;height:574px">
                </div>
                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>
            <!-- The dots/circles -->
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span> 
                <span class="dot" onclick="currentSlide(2)"></span> 
                <span class="dot" onclick="currentSlide(3)"></span> 
            </div>
        </main>
        <script src="assets/js/accueil.js"></script>
    </body>
</html>

