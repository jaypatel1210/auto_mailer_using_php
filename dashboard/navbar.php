<nav class="navbar navbar-expand-lg navbar-dark primary-color">

  <a class="navbar-brand" href="index">Auto Mailer</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="basicExampleNav">

    <ul class="navbar-nav ml-auto">
      <li class="nav-item 
      <?php if ($isActive == 'home') {
          echo 'active';
      } 
      ?>
      ">
        <a class="nav-link" href="index">Home
        </a>
      </li>
      <li class="nav-item
      <?php
        if ($isActive == 'profile') {
          echo 'active';
        }
      ?>
      ">
        <a class="nav-link" href="profile">Profile
        </a>
      </li>
      <li class="nav-item
      <?php
        if ($isActive == 'report') {
          echo 'active';
        }
      ?>
      ">
        <a class="nav-link" href="report">Reports
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout">Logout
        </a>
      </li>

    </ul>
  </div>

</nav>