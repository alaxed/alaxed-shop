<?php include '../classes/brand.php' ?>
<?php
$brand = new brand();
$listBrand = $brand->findAll();
if (isset($_GET['brandId'])) {
    $id = $_GET['brandId'];
    $del = $brand->delById($id);
    if ($del) {
        echo "<script>alert('$del')</script>";
        echo "<script>window.location='listBrand.php'</script>";
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
        <h1 class="text-center align-middle">List Brand</h1>
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
                        if (!empty($listBrand)) {
                            foreach ($listBrand as $index => $b) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $index + 1 ?>
                                    </td>
                                    <td>
                                        <?php echo $b['name'] ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="editBrand.php?brandId=<?php echo $b['id'] ?>" class="btn btn-primary">Edit</a>
                                        <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $b['id'] ?>)" class="btn btn-danger">Del</a>
                                    </td>
                                </tr>

                            <?php
                            }
                        } else {
                            echo "<tr><td colspan='3' class='text-center'>No categories available</td></tr>";
                        }
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
    <script>
        function confirmDelete(brandId) {
        var confirmDelete = confirm("Are you sure you want to delete this brand?");
        if (confirmDelete) {
            window.location.href = "?brandId=" + brandId;
        }
    }
    </script>
</body>

</html>