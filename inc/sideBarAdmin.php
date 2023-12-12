<div th:fragment="menu-side">

    <aside class="sidebar">
      <div class="logo">
        <a href="/home/index"> <img src="/img/core-img/favicon.ico" alt="logo"> </a>
        <h2>One Sound</h2>
      </div>
      <ul class="links">
        <h4>Main Menu</h4>
        <li>
          <span class="material-symbols-outlined">dashboard</span>
          <a th:href="@{/album/index}">Album</a>
        </li>
        <li>
          <span class="material-symbols-outlined">show_chart</span>
          <a th:href="@{/singer/index}">Singer</a>
        </li>
        <li>
          <span class="material-symbols-outlined">flag</span>
          <a th:href="@{/genres/index}">Genres</a>
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
          <a href="/auth/logoff">Logout</a>
        </li>
      </ul>
    </aside>

  </div>