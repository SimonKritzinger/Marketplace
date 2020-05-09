<link rel="stylesheet" href="../inc/css/NavBar.css">

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top navbar-bottom-border">
    <button class="navbar-toggler" type="button" onclick="sidebarTogglerClick()" id="sidebarToggler" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" style="color: #008CD8" href="#">Marketplace</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav mx-auto">
                <form class="form-inline my-2 my-lg-0 w-70">
                    <div class="input-group">
                        <input class="form-control mr-sm-2 form-control-underlined w-90" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-link text-primary my-2 my-sm-0" type="submit"><i class="fa fa-search" style="color: #008CD8"></i></button>
                        </div>
                    </div>
                </form>
        </div>

        <ul class="navbar-nav">
          <?php
          if(!empty($_SESSION["user"]))
          {?>
          <li class="nav-item">
            <a href="#" class="nav-item nav-link"><?php echo $_SESSION["user"].username?>></a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-item nav-link">Logoff</a>
          </li>
           <?php
          }
          else{
           ?>
          <li class="nav-item">
            <a href="#" class="nav-item nav-link">Login</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-item nav-link">Register</a>
          </li>
            <?php }?>
        </ul>
    </div>
</nav>

<script>

    function sidebarTogglerClick() {
        console.log("sers")
        // open or close navbar
        $('#sidebar').toggleClass('d-none');
        $('#sidebar').toggleClass('d-block');

        $('#sidebar[aria-expanded=true]').attr('aria-expanded', 'false');
    };

</script>
