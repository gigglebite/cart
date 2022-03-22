<?php
require('app/Customer.php');
require('app/Product.php');
require('app/ShoppingCart.php');
require('app/FileUtility.php');

$products_data = FileUtility::openCSV('products.csv');

$products = Product::convertArrayToProducts($products_data);

$customer = new Customer('Aleeya Candelaria', 'candelaria.aleeyajenzen@auf.edu.ph');

$shoppingCart = new ShoppingCart($customer);
$shoppingCartItems = $shoppingCart->getAllItems();
?>
<html>
<head>
    <title>My Cart</title>
</head>
<body>
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
<img id="products_img" src="shoppingcartheader.jpg" class="img-fluid" alt="..." width="100%">
<div class="centered"><h1>Shopping Cart</h1>
<a href="products-list.php">
<button class="btn btn-primary" id ="button_style"> 
            SHOP MORE
</button>
</a>
</div>
</div>

<?php if (count($shoppingCartItems) > 0): ?>

    <table>
    <thead>
        <th>Product</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Subtotal</th>
    </thead>
    <tbody>

    <?php foreach ($shoppingCartItems as $item): ?>

        <tr>
            <td><?php echo $item['product']->getName(); ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td><?php echo $item['price']; ?></td>
            <td><?php echo $item['subtotal']; ?></td>
        </tr>

    <?php endforeach; ?>

        <tr>
            <td colspan="4">
                <?php echo $shoppingCart->getItemsTotal(); ?>
            </td>
        </tr>

    </tbody>
    </table>

    <?php endif; ?>

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

#button_style {
    background:  #592E26;
    border-color: #592E26;
    margin-top: 40px;
    object-position: center;
}


    span {
    padding-left: 20px;
}
</style>
</body>
</html>