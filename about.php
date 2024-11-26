<?php
include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="about">
   <div class="row">
      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
      <h1>About Us</h1> <br>
                <p>"NisYu" is an exclusive business operating in Nepal, specializing in the import, distribution, and 
                retail of major American and European cosmetics brands. 
                </p><br>
                <p><b>Who We Are:</b>Nisyu is the Exclusive importer, distributor, and retailer for leading American
                and European Beauty brands in Nepal. It is the Nepali business chain entirely dedicated to beauty 
                products.
                </p><br>
                <p><b>Vision:</b>To become the largest beauty brand in Nepal</p><br>
                <p><b>Mission:</b>To harness the power of beauty to enhance the lives of customers, all while 
                inspiring and empowering women in all aspects of their lives.
                </p><br>
                <p><b>Commitment:</b>NisYu is dedicated to offering the best in beauty providing an exclusive
                experience with top brands, excellent service, and beauty experties in a unique store environment.
                We emphasize the authenticity of the products, assuring customers that they do not accept counterfeit
                items.
                </p><br>
      </div>
   </div>
</section>


<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>