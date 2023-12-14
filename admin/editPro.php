<?php include '../classes/category.php' ?>
<?php include '../classes/brand.php' ?>
<?php include '../classes/product.php' ?>
<?php
session_start();
//Category
$cate = new category();
$cateList = $cate->findAll();

//Brand
$brand = new brand();
$brandList = $brand->findAll();

$pro = new product();
if (!isset($_GET['proId']) || $_GET['proId'] == null) {
    echo "<script>alert('Not found Product')</script>";
    echo "<script>window.location='listPro.php'</script>";
} else {
    $id = $_GET['proId'];
};

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['proId'])) {
    $update = $pro->update($_POST, $_FILES, $id);
    if ($updateCate === "Update Brand successfully!") {
        echo "<script>alert('$updateCate')</script>";
        echo "<script>window.location='listBrand.php'</script>";
    };
    
};



$get_pro = $pro->findById($id);



?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="icon" href="../img/core-img/favicon.ico">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0ec45a6e18.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>

<body ng-app="albumApp" ng-controller="albumCtrl">
    <div>
        <!-- HEADER Ở ĐÂY -->
        <!-- <div th:replace="~{/admin/headeradmin.html :: header}"></div> -->
        <h1 class="text-center align-middle">Update Product</h1>
        <p class="fs-2 text-center text-white">
            <?php
            if (isset($insertCate)) {
                echo $insertCate;
            }
            ?>
        </p>
        <div class="row " style="margin-top: 7rem;">

            <div class="col-md-3 m-1">
                <!-- Không cần để gì vào đây -->
            </div>
            <div class="col-md-6">

                <?php
                if ($get_pro) {
                    foreach ($get_pro as $index => $p) {

                        ?>

                        <form class="position-relative" action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" name="name" value="<?php echo $p['name'] ?>" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Category</label>
                                <select class="form-select" name="cateId" aria-label="Default select example">
                                    <option selected>Choose Category</option>
                                    <?php
                                    if ($cateList) {
                                        foreach ($cateList as $item) {
                                           ?>
                                           <option <?php echo $item['id'] == $p['catId'] ? 'selected' : '' ?> value="<?php echo $item['id']?>"><?php echo $item['name']?></option>
                                           <?php

                                        }
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Brand</label>
                                <select class="form-select" name="brandId">
                                    <option selected>Choose Brand</option>
                                    <?php
                                    if ($brandList) {
                                        foreach ($brandList as $item) {
                                           ?>
                                           <option <?php echo $item['id'] == $p['brandId'] ? 'selected' : '' ?> value="<?php echo $item['id']?>"><?php echo $item['name']?></option>
                                           <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Desciptions</label>
                                <textarea name="descriptions" id="" cols="115" rows="5"><?php echo $p['description'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Price</label>
                                <input type="text" name="price" value="<?php echo $p['price'] ?>" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Type </label>
                                <select name="type" id="" class="form-select">
                                    <option <?php  echo $p['type'] == 0 ? 'selected' : ''  ?> value="0">Featured</option>
                                    <option <?php  echo $p['type'] == 1 ? 'selected' : ''  ?> value="1">Non-Featured</option>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Submit</button><br>
                            <img class="mt-3 position-absolute top-100 translate-start" style="margin-left: 35%;"  src="uploads/<?php echo $p['image'] ?>" width="240px" alt="">
                        </form>
                        <?php
                    }
                }
                ?>
            </div>

        </div>



    </div>
    <?php include '../inc/sideBarAdmin.php' ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>

</html>