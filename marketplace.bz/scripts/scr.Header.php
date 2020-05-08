<link rel="stylesheet" href="../inc/css/SearchField.css">

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="#">Marketplace</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav mx-auto">
                <form class="form-inline my-2 my-lg-0">
                    <div class="input-group">
                        <input class="form-control mr-sm-2 form-control-underlined" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-link text-primary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
        </div>

        <ul class="navbar-nav">
          <?php
          if(!empty($_SESSION["user"]))
          {?>
          <li class="nav-item">
            <a href="#" class="nav-link"><?php echo $_SESSION["user"].username?>></a>
          </li>
          <li class="pure-menu-item">
            <a href="#" class="pure-menu-link">Logoff</a>
          </li>
           <?php
          }
          else{
           ?>
          <li class="nav-item">
            <a href="#" class="nav-link">Login</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Register</a>
          </li>
            <?php }?>
        </ul>
    </div>
</nav>
