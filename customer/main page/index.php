
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Of La Maison</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
<style>
    .menu .box-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
    gap:1.5rem;
}

.menu .box-container .box{
    padding:5rem;
    text-align: center;
    border:var(--border);    
}

.menu .box-container .box img{
    height: 10rem;
}

.menu .box-container .box h3{
    color: #fff;
    font-size: 2rem;
    padding:1rem 0;
}

.menu .box-container .box .price{
    color: #fff;
    font-size: 2.5rem;
    padding:.5rem 0;
}

.menu .box-container .box .price span{
    font-size: 1.5rem;
    text-decoration: line-through;
    font-weight: lighter;
}

.menu .box-container .box:hover{
    background:#fff;
}

.menu .box-container .box:hover > *{
    color:var(--black);
}
</style>
</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a href="#" class="logo">
        <img src="images/LaMaison.png" alt="">
    </a>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#about">about</a>
        <a href="#menu">menu</a>
        <a href="#review">review</a>
    </nav>
      
</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>Do it the French way</h3>
        <p>LE BURGER QUI FAIT L'ÉPREUVE DU FRANÇAIS SUR VOTRE TOUNGH.</p>
        <a href="#" class="btn">get yours now</a>
    </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span>about</span> us </h1>

    <div class="row">

        <div class="image">
            <img src="images/Soupe à l’oignon .jpg" alt="">
        </div>

        <div class="content">
            <h3>what makes our Soupe special?</h3>
            <p>Even though it originated as a humble peasant dish, French onion soup is nowadays regarded as one of the most prized dishes of French cuisine. The broth is simple, made merely with caramelized onions and meat stock.</p>
            
            <a href="#" class="btn">learn more</a>
        </div>

    </div>

</section>

<!-- about section ends -->

<!-- menu section starts  -->

<section class="menu" id="menu">

    <h1 class="heading"> our <span>menu</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/menu-1.png" alt="">
            <h3>tasty and healty</h3>
        </div>

        <div class="box">
            <img src="images/applepie.jpg" alt="">
            <h3>FRENCH APPLE PIE</h3>
        </div>

        <div class="box">
            <img src="images/avocado-toast.jpg" alt="">
            <h3>THE AVACADO TOAST</h3>
        </div>

        <div class="box">
            <img src="images/cold dreanks.jpg" alt="">
            <h3>THE VARIOUS FRENCH DREANKS</h3>
        </div>

        <div class="box">
            <img src="images/double-chocolate-peancakes-with-caramel-and-pecan-sauce-126315-1.jpg" alt="">
            <h3>THE BEST CARAMEL PEANCAKES</h3>
        </div>

        <div class="box">
            <img src="images/banana-bread.jpg" alt="">
            <h3>THE HEALTHY BANANA BREAD</h3>
        </div>

    </div>

</section>

<!-- menu section ends -->

<!-- review section starts  -->

<section class="review" id="review">

    <h1 class="heading"> customer's <span>review</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/quote-img.png" alt="" class="quote">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi nulla sit libero nemo fuga sequi nobis? Necessitatibus aut laborum, nisi quas eaque laudantium consequuntur iste ex aliquam minus vel? Nemo.</p>
            <img src="images/pic-1.png" class="user" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
        </div>

        <div class="box">
            <img src="images/quote-img.png" alt="" class="quote">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi nulla sit libero nemo fuga sequi nobis? Necessitatibus aut laborum, nisi quas eaque laudantium consequuntur iste ex aliquam minus vel? Nemo.</p>
            <img src="images/pic-2.png" class="user" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
        </div>
        
        <div class="box">
            <img src="images/quote-img.png" alt="" class="quote">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi nulla sit libero nemo fuga sequi nobis? Necessitatibus aut laborum, nisi quas eaque laudantium consequuntur iste ex aliquam minus vel? Nemo.</p>
            <img src="images/pic-3.png" class="user" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
        </div>

    </div>

</section>

<!-- review section ends -->

<!-- contact section starts  -->


<!-- contact section ends -->

<!-- blogs section starts  -->

<section class="blogs" id="blogs">

    <h1 class="heading"> our <span>blogs</span> </h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="images/Spaghetti Bologness.jpg" alt="">
            </div>
            <div class="content">
                <a href="#" class="title">hot and spicy spaghetti</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/chocolatemousse-526482.jpg" alt="">
            </div>
            <div class="content">
                <a href="#" class="title">tasty and refreshing Mousse Au Chocolate</a>
               
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/14.-Diabolo-Menthe-Non-alcoholic-French-Drinks.jpg" alt="">
            </div>
            <div class="content">
                <a href="#" class="title"> refreshing Diabolo Menthe Non alcoholic French Drinks</a>
        
            </div>
        </div>

    </div>

</section>

<!-- blogs section ends -->

<!-- footer section starts  -->

<section class="footer">

    <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
        <a href="#" class="fab fa-pinterest"></a>
    </div>

    <div class="links">
        <a href="#">home</a>
        <a href="#">about</a>
        <a href="#">menu</a>
        <a href="#">products</a>
        <a href="#">review</a>
    </div>

    <div class="credit">created by <span>GROUP NO : 15</span> | all rights reserved</div>

</section>

<!-- footer section ends -->

















<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>