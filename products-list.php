<?php
require('app/Customer.php');
require('app/Product.php');
require('app/FileUtility.php');

$products_data = FileUtility::openCSV('products.csv');

$products = Product::convertArrayToProducts($products_data);

$customer = new Customer('Aleeya Candelaria', 'candelaria.aleeyajenzen@auf.edu.ph');
?>
<html>
<head>
    <title>My Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-sm sticky-top bg-light navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="products-list.php">
      <img src="logo.png" alt="" width="130" height="30">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="products-list.php">Home</a>
        </li>
      </ul>
      <span class="navbar-text">
        <h5>Welcome, <?php echo $customer->getName() ?>!</h5>
        </span>
        <span>
        </span>
        <span class="item">
                    <span class="item-left">
                    <a href="shopping-cart.php">
                        <img src="shopping-cart.png" alt="" />
                    </a>
      </span>
  </div> 
  </div>
</nav>

<div id="products_header">
<img id="products_img" src="home_header.png" class="img-fluid" alt="..." width="100%">
<div class="centered"><h1>Products</h1></div>
</div>

<form action="app/ShoppingCart.php" method="POST">
<div class="row row-cols-1 row-cols-md-4 g-6">
<?php foreach ($products as $product): ?>
    <div class="card">
    <div id="container">

  <img src="<?php echo $product->getImage(); ?>" class="card-img-top" alt="...">
    <div id="overlay">
        <div id="text">
        <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>" />
        <h5 id="title_card"><?php echo $product->getName(); ?></h5>
    <p>
        <?php echo $product->getDescription(); ?><br/>
        <br><span style="color: white; font-weight: bold;">PHP <?php echo $product->getPrice(); ?></span>
        Qty <input id="quantity_style" type="number" name="quantity" class="quantity" value="" />
        <button class="btn btn-primary" id ="button_style" type="submit"> 
            ADD TO CART
        </button>
    </p>
        </div>
    </div>
</div>
</div>
<?php endforeach; ?>
  </div>
  </div>
</form>


<style>

#products_header {
  position: relative;
  text-align: center;
    background: linear-gradient(180deg, rgba(88,37,5,1) 0%, rgba(47,27,14,1) 35%);
    overflow: hidden;
}

.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.centered h1 {
    font-size:  80px;
    color: white;
}


#products_img {
   opacity: 0.3;
}


.card-img-top {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

#overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: #4C342F;
}

#container:hover #overlay {
  opacity: 0.9;
}


#text {
    margin-top: 30px;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}

span {
    padding-top: 10px;
    font-size:  20px;
    padding-left: 20px;
}

.card {
    padding-top: 10px;
    background: #AD8D87;
    margin-top: 20px;
    margin-left: 20px;
    padding-bottom: 10px;
    width:  350px;
}

#title_card {
    font-size: 35px;
}

#button_style {
    background:  #371F1A;
    border-color: #592E26;
    margin-top: 20px;
    margin-left: 50%;
    object-position: center;

}

#quantity_style {
    width: 50px;
}
</style>
</body>
</html>