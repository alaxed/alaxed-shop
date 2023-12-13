<?php include '../classes/category.php' ?>
<?php
$cate = new category();
if (!isset($_GET['cateId']) || $_GET['cateId'] == null) {
    echo "<script>alert('Not found category')</script>";
    echo "<script>window.location='listCate.php'</script>";
} else {
    $id = $_GET['cateId'];
};

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cateName = $_POST['name'];

    $updateCate = $cate->update($id,$cateName);

    if($updateCate === "Update Category successfully!"){
        echo "<script>alert('$updateCate')</script>";
        echo "<script>window.location='listCate.php'</script>";
    };
};


$get_cate = $cate->findById($id);
$check_cate = $cate->findAll();

 
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
        <h1 class="text-center align-middle">Update Category</h1>
        <p class="fs-2 text-center text-white">
            <?php 
                if(isset($insertCate)){
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
                if ($get_cate) {
                    foreach ($get_cate as $index => $category) {

                        ?>

                        <form class="" action="" method="post">
                            <div class="mb-3" >
                                <label for="exampleInputEmail1" class="form-label">Nasme category</label>
                                <input type="text" name="name" value="<?php echo $category['name'] ?>" class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">

                            </div>

                            <button type="submit" class="btn btn-success">Submit</button>
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