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

//product
$pd = new product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insert = $pd->insert($_POST, $_FILES);
    if (isset($insert)) {
        echo "<script>alert('$insert')</script>";
        echo "<script>window.location='addPro.php'</script>";
    }
}
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


<body>
    <div>
        <!-- HEADER Ở ĐÂY -->
        <!-- <div th:replace="~{/admin/headeradmin.html :: header}"></div> -->
        <h1 class="text-center align-middle">Insert Product</h1>

        <div class="row mt-2">

            <div class="col-md-3 m-1">
                <!-- Không cần để gì vào đây -->
            </div>
            <div class="col-md-6">
                <form class="" action="addPro.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category</label>
                        <select class="form-select" name="cateId" aria-label="Default select example">
                            <option selected>Choose Category</option>
                            <?php
                            if ($cateList) {
                                foreach ($cateList as $item) {
                                    echo "<option value='" . $item['id'] . "'> " . $item['name'] . "</option>";
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
                                    echo "<option value='" . $item['id'] . "'> " . $item['name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Desciptions</label>
                        <textarea name="descriptions" id="" cols="115" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Price</label>
                        <input type="text" name="price" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Type </label>
                        <select name="type" id="" class="form-select">
                            <option value="0">Featured</option>
                            <option value="1">Non-Featured</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </form>
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