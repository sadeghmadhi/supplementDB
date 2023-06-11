<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <?php 
        include_once("connect.php");
        $conn = connectToSupplementDB();

        if(isset($_GET["title"]) && isset($_GET["brand"]) && isset($_GET["image"]) && isset($_GET["desc"]) && isset($_GET["variation"])) {
            $title = $_GET["title"];
            $brand = $_GET["brand"];
            $image = $_GET["image"];
            $desc = $_GET["desc"];
            $variation = $_GET["variation"];

            $addQuery = "INSERT INTO products (product_name, product_brand, product_image, product_desc, product_variation) VALUES ('$title', '$brand', '$image', '$desc', '$variation')";
            if ($conn->query($addQuery) === TRUE) {
                echo "Record Added succesfully";
              } else {
                echo "Error Adding record: " . $conn->error;
            }

            exit();
        }
    ?>
<form class="container-lg bg-body-secondary p-3 rounded mt-5" method="get" action="">
  <div class="mb-3">
    <label for="exampleProductTitle" class="form-label">عنوان محصول</label>
    <input type="text" class="form-control" id="exampleProductTitle" aria-describedby="title" name="title">
  </div>
  <div class="mb-3">
    <label for="exampleInputBrand" class="form-label">برند محصول</label>
    <input type="text" class="form-control" id="exampleInputBrand" name="brand">
  </div>
  <div class="mb-3">
    <label for="exampleInputImage" class="form-label">تصویر محصول</label>
    <input type="text" class="form-control" id="exampleInputImage" name="image">
  </div>
  <div class="mb-3">
  <label for="floatingTextarea">توضیحات محصول</label>
    <textarea class="form-control mt-3" placeholder="توضیحات محصول را در این قسمت بنویسید." id="floatingTextarea" name="desc"></textarea>
    
  </div>
  <div class="mb-3">
    <label for="exampleInputImage" class="form-label">نوع محصول</label>
    <select name="variation" class="form-select" aria-label="Default select example">
        <option selected value="protein">پروتئین</option>
        <option value="gainer">گینر</option>
        <option value="creatine">کراتین</option>
        <option value="vitamin">ویتامین</option>
        <option value="glutamine">گلوتامین</option>
        <option value="amino">آمینو</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">انجام</button>
  <button type="submit" class="btn btn-danger">بازگشت</button>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>