<?php require 'add.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Web 2</title>
   <link rel="stylesheet" href="/css/main.css">
</head>

<body>
   <div class="container">
      <header>
         <div class=" w-100 product-list-header">
            <h1 class="display-4 fw-normal">Product Add</h1>
            <div>
               <button type="submit" class="btn-uppercase btn h-50 btn-lg btn-outline-primary" form="product_form">save</button>
               <button type="button" class="btn-uppercase btn h-50 btn-lg btn-outline-primary" onclick="history.back()">cancel</button>
            </div>
         </div>
      </header>

      <main>
         <div class="row g-5">
            <div class="col-lg-6">
               <form class="needs-validation" id="product_form" novalidate action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                  <div class="row g-3">
                     <?php echo $err['invalid_SKU'] ?>
                     <div class="row-container">
                        <div class="mr-4">SKU</div>
                        <input type="text" class="form-control" value="<?php echo $_POST['sku'] ?>" pattern="[1-9]{1}[0-9]*" name="sku" id="sku" placeholder="Example: 123456" maxlength="6" required>
                        <div class="invalid-feedback">
                           Please, submit required data.
                        </div>
                     </div>
                     <div class="row-container">
                        <div class="mr-4">Name</div>
                        <input type="text" class="form-control" value="<?php echo $_POST['name'] ?>" pattern="[a-zA-Z]+" name="name" id="name" placeholder="Example: Chair" required>
                        <div class="invalid-feedback">
                           Please, submit required data.
                        </div>
                     </div>
                     <div class="row-container">
                        <div class="mr-4">Price&nbsp;($)</div>
                        <input type="text" class="form-control" value="<?php echo $_POST['price'] ?>" name="price" id=" price" pattern="[0-9]+([\.,][0-9]+)?" placeholder="Example: 9.99" required>
                        <div class="invalid-feedback">
                           Please, submit required data.
                        </div>
                     </div>

                     <div class="row-container mb-4">
                        <div class="mr-4">Type&nbsp;switcher</div>
                        <select class="form-select" name="productType" id="productType" required onchange="update(this.selectedIndex)">
                           <option value="dvd-group" selected>DVD</option>
                           <option value="furniture-group">Furniture</option>
                           <option value="book-group">Book</option>
                        </select>
                        <input type="text" name="type-container" id="type-container" class="hide type-container" value="DVD"></input>
                     </div>

                     <div class="dvd-group show">
                        <div class="row-container">
                           <div class="mr-4">Size&nbsp;(MB)</div>
                           <input type="text" class="form-control" value="<?php echo $_POST['size'] ?>" pattern="[1-9]{1}[0-9]*" name="size" id="size" required>
                           <div class="invalid-feedback">
                              Please, submit required data.
                           </div>
                        </div>
                        <div class="mt-4">
                           DVD is selected.<br>Please provide correct size value in units of measurement written in brackets.
                        </div>
                     </div>

                     <div class="furniture-group hide">
                        <div class="row-container mb-3">
                           <div class="mr-4">Height&nbsp;(CM)</div>
                           <input type="text" class="form-control" value="<?php echo $_POST['height'] ?>" pattern="[0-9]+([\.,][0-9]+)?" name="height" id="height">
                           <div class="invalid-feedback">
                              Please, submit required data.
                           </div>
                        </div>
                        <div class="row-container mb-3">
                           <div class="mr-4">Width&nbsp;(CM)</div>
                           <input type="text" class="form-control" value="<?php echo $_POST['width'] ?>" pattern="[0-9]+([\.,][0-9]+)?" name="width" id="width">
                           <div class="invalid-feedback">
                              Please, submit required data.
                           </div>
                        </div>
                        <div class="row-container">
                           <div class="mr-4">Length&nbsp;(CM)</div>
                           <input type="text" class="form-control" value="<?php echo $_POST['length'] ?>" pattern="[0-9]+([\.,][0-9]+)?" name="length" id="length">
                           <div class="invalid-feedback">
                              Please, submit required data.
                           </div>
                        </div>
                        <div class="mt-4">
                           Furniture is selected.<br>Please provide dimensions in H&#215;W&#215;L format (units of measurement written in brackets).
                        </div>
                     </div>

                     <div class="book-group hide">
                        <div class="row-container">
                           <div class="mr-4">Weight&nbsp;(KG)</div>
                           <input type="text" class="form-control" value="<?php echo $_POST['weight'] ?>" pattern="[0-9]+([\.,][0-9]+)?" name="weight" id="weight">
                           <div class="invalid-feedback">
                              Please, submit required data.
                           </div>
                        </div>
                        <div class="mt-4">
                           Book is selected.<br>Please provide correct weight value in units of measurement written in brackets.
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </main>
   </div>
   <script type="text/javascript" src="script.js"></script>
</body>

</html>