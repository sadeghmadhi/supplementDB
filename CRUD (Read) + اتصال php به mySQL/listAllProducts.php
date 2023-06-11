<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<div class="container-lg bg-body-secondary p-3 rounded mt-5">
    <?php 
        include_once("connect.php");
        $conn = connectToSupplementDB();

            if (isset($_GET["delete"])) {
                $id = $_GET["delete"];
        
                $deleteQuery = "UPDATE products SET isAvailable = 'false' WHERE product_id = '$id'";
                if ($conn->query($deleteQuery) === TRUE) {
                echo "Record deleted successfully";
                } else {
                echo "Error deleting record: " . $conn->error;
                }
        
                exit();
            }

            $selectQuery = "SELECT * FROM products WHERE isAvailable = 'true'";
            $fetchUsers = $conn->query($selectQuery);
            
            if ($fetchUsers->num_rows > 0) {
                while($row = $fetchUsers->fetch_assoc()) {
                    echo '<div class="bg-light p-3">';
                    echo '<p class="fs-5 text-dark px-3 d-inline">' . $row["product_name"] . '</p>';

                    echo '<a href="?' . 'delete='.$row["product_id"] . '" role="button" class="btn btn-danger float-start">حذف محصول</a>';
                    echo '</div>';
          
                }
              } else {
                echo "0 results";
            }

            exit();
    ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>