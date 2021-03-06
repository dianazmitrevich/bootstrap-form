<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <div class="container">
        <header>
            <div class=" w-100 product-list-header">
                <h1 class="display-4 fw-normal">Product List</h1>
                <div>
                    <a href="/add-product.php"><button type="button" class="btn-uppercase btn h-50 btn-lg btn-outline-primary">add</button></a>
                    <button type="submit" form="indexForm" class="btn-uppercase btn h-50 btn-lg btn-outline-primary">mass delete</button>
                </div>
            </div>
        </header>

        <main>
            <form method="post" class="row row-cols-1 row-cols-md-4 mb-3 text-center" action="mass-delete.php" id="indexForm">

                <?php
                require 'configDB.php';

                $parameter = '';
                $query = 'SELECT * FROM Items';
                if ($result = $link->query($query)) {
                    while ($row = $result->fetch_array()) {
                        if ($row['Type'] == 'DVD') {
                            $element = $link->query('SELECT * FROM DVD WHERE LinkToItemId = \'' . $row['id'] . '\'')->fetch_array();
                            $parameter = 'Size: ' . $element['Size'] . ' MB';
                        } else if ($row['Type'] == 'Furniture') {
                            $element = $link->query('SELECT * FROM Furniture WHERE LinkToItemId = \'' . $row['id'] . '\'')->fetch_array();
                            $parameter = 'Dimensions: ' . $element['Height'] . '&times;' . $element['Width'] . '&times;' . $element['Length'];
                        } else if ($row['Type'] == 'Book') {
                            $element = $link->query('SELECT * FROM Book WHERE LinkToItemId = \'' . $row['id'] . '\'')->fetch_array();
                            $parameter = 'Weight: ' . $element['Weight'] . 'KG';
                        }
                        echo '
                        <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm">
                                <div class="py-3">
                                    <input type="checkbox" class="delete-checkbox form-check-input" name="checkboxes[]" value="' . $row['id'] . '">
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled">
                                        <li>' . $row['SKU'] . '</li>
                                        <li>' . $row['Name'] . '</li>
                                        <li>' . $row['Price'] . '</li>
                                        <li>' . $parameter . '</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                }
                ?>
            </form>
        </main>
    </div>
</body>

</html>