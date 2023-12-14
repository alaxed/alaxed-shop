<?php include_once '../lib/session.php';
Session::checkSession();
Session::checkRole();
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  
  session_destroy();
  header("Location:../login.php");
}
?>

<div>

  <aside class="sidebar">
    <div class="logo">
      <a href="../index.php"> <img src="/img/core-img/favicon.ico" alt="logo"> </a>
      <h2>One Sound</h2>
    </div>
    <ul class="links">
      <h4>Main Menu</h4>
      <li>
        <span class="material-symbols-outlined">dashboard</span>
        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownCate"
            data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownCate">
            <li><a class="dropdown-item" href="addCate.php">Add Category</a></li>
            <li><a class="dropdown-item" href="listCate.php">List Category</a></li>
            
          </ul>
        </div>
      </li>
      <li>
        <span class="material-symbols-outlined">show_chart</span>
        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownCate"
            data-bs-toggle="dropdown" aria-expanded="false">
            Brand
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownCate">
            <li><a class="dropdown-item" href="addBrand.php">Add Brand</a></li>
            <li><a class="dropdown-item" href="listBrand.php">List Brand</a></li>
            
          </ul>
        </div>
      </li>
      <li>
        <span class="material-symbols-outlined">flag</span>
        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownCate"
            data-bs-toggle="dropdown" aria-expanded="false">
            Product
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownCate">
            <li><a class="dropdown-item" href="addPro.php">Add Product</a></li>
            <li><a class="dropdown-item" href="listPro.php">List Product</a></li>
            
          </ul>
        </div>
      </li>
      <li>
        <span class="material-symbols-outlined">flag</span>
        <a th:href="@{/admin/song/index}">Song</a>
      </li>
      <li>
        <span class="material-symbols-outlined">flag</span>
        <a th:href="@{/dashboard/user}">User</a>
      </li>

      <hr>
      <h4>Report</h4>
      <li>
        <span class="material-symbols-outlined">person</span>
        <a th:href="@{/admin/web-report/index}">Report</a>
      </li>

      <!-- <hr>
        <h4>Account</h4>
        <li>
          <span class="material-symbols-outlined">bar_chart</span>
          <a href="#">Overview</a>
        </li>
        <li>
          <span class="material-symbols-outlined">mail</span>
          <a href="#">Message</a>
        </li>
        <li>
          <span class="material-symbols-outlined">settings</span>
          <a href="#">Settings</a>
        </li> -->
      <li class="logout-link">
        <span class="material-symbols-outlined">logout</span>
        <a href="?action=logout">Logout</a>


      </li>
    </ul>
  </aside>

</div>