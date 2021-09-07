
<div class="card-header text-center pl-0 pr-0 pb-0 pt-0">
  <img src="imgs/2677518.jpg" class="img-fluid w-100">
  <div class="bg-primary text-white">
    <nav class="navbar navbar-expand-lg navbar-light bg-info" style="background:linear-gradient(135deg, #C56CD6 0%,#3425AF 100%);">
      <a class="navbar-brand " style="color:#ffff33; font-family: Corbel Light" href="#">Membership & Financial Database</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link <?php if($title === 'members'){echo 'active';}else{}?>" href="membership.php">Members</a>
          <a class="nav-item nav-link <?php if($title === 'finance'){echo 'active';}else{}?>" href="finance.php">Finance</a>
          <a class="nav-item nav-link <?php if($title === 'users'){echo 'active';}else{} ?>" href="users.php">Manage Users</a>
        </div>
      </div>
    </nav>
  </div>
</div>