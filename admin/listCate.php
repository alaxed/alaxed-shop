<?php include '../classes/category.php' ?>
<?php
$cate = new category();
$listCate = $cate->findAll();
if (isset($_GET['cateId'])) {
    $id = $_GET['cateId'];
    $del = $cate->delById($id);
    if($del){
        echo "<script>alert('$del')</script>";
        echo "<script>window.location='listCate.php'</script>";
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
        <h1 class="text-center align-middle">Insert Category</h1>
        <p class="fs-2 text-center text-success">
        
        </p>
        <div class="row " style="margin-top: 7rem;">

            <div class="col-md-3 m-1">
                <!-- Không cần để gì vào đây -->
            </div>
            <div class="col-md-6">
                <table class="table table-hover table-striped table-light">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (!empty($listCate)) {
                            foreach ($listCate as $index => $category) {
                    ?>
                        <tr>
                           
                            <td><?php echo $index + 1 ?></td>
                            <td><?php echo $category['name'] ?></td>
                            <td class="text-center">
                                <a href="editCate.php?cateId=<?php echo $category['id']?>" class="btn btn-primary">Edit</a>
                                <a onclick="return confirm('Are you sure you want to delete this category?')" href="?cateId=<?php echo $category['id']?>"  class="btn btn-danger">Del</a>
                            </td>
                            
                        </tr>

                        <?php
                            }}
                        ?>
                    </tbody>
                </table>
            </div>

        </div>



    </div>
    <?php include '../inc/sideBarAdmin.php' ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/angular/album.js"></script>
</body>

</html>