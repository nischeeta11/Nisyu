<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<div class="home-bg">

<section class="home">

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/foundation1.webp" alt="">
         </div>
         <div class="content">
            <span>upto 50% off</span>
            <h3>Foundation</h3>
            <a href="shop.php" class="btn">Shop Now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/lipstick2.webp" alt="">
         </div>
         <div class="content">
            <span>upto 50% off</span>
            <h3>Matte Lipstick</h3>
            <a href="shop.php" class="btn">Shop Now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/eyeshadow3.webp" alt="">
         </div>
         <div class="content">
            <span>upto 50% off</span>
            <h3>Eyeshadow</h3>
            <a href="shop.php" class="btn">Shop Now</a>
         </div>
      </div>

   </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

</div>

<section class="category">

   <h1 class="heading">Category</h1>

   <div class="swiper category-slider">

   <div class="swiper-wrapper">

   <a href="category.php?category=foundation" class="swiper-slide slide">
      <img src="images/foundation1.webp" alt="">
      <h3>Foundation</h3>
   </a>

   <a href="category.php?category=blush" class="swiper-slide slide">
      <img src="images/blush1.webp" alt="">
      <h3>Blush</h3>
   </a>

   <a href="category.php?category=concealer" class="swiper-slide slide">
      <img src="images/concealer1.webp" alt="">
      <h3>Concealer</h3>
   </a>

   <a href="category.php?category=mascara" class="swiper-slide slide">
      <img src="images/mascara1.webp" alt="">
      <h3>Mascara</h3>
   </a>

   <a href="category.php?category=eyeliner" class="swiper-slide slide">
      <img src="images/eyeliner1.webp" alt="">
      <h3>Eyeliner</h3>
   </a>

   <a href="category.php?category=eyeshadow" class="swiper-slide slide">
      <img src="images/eyeshadow1.webp" alt="">
      <h3>Eyeshadow</h3>
   </a>

   <a href="category.php?category=liquid lipstick" class="swiper-slide slide">
      <img src="images/liquid lipstick1.webp" alt="">
      <h3>Liquid Lipstick</h3>
   </a>

   <a href="category.php?category=lipliner" class="swiper-slide slide">
      <img src="images/lipliner1.webp" alt="">
      <h3>Lipliner</h3>
   </a>

   <a href="category.php?category=lipstick" class="swiper-slide slide">
      <img src="images/lipstick1.webp" alt="">
      <h3>Lipstick</h3>
   </a>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>

<section class="home-products">

   <h1 class="heading">Latest Products</h1>

   <div class="swiper products-slider">

   <div class="swiper-wrapper">

   <?php
     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6"); 
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="swiper-slide slide">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="price"><span>Rs.</span><?= $fetch_product['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="5" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>



<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>