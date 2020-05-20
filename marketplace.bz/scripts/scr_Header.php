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
            <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#LoginForm" id="lbutton">Login</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#RegisterForm" id="rbutton">Register</a>
          </li>
            <?php }?>
        </ul>
    </div>
</nav>



<div class="modal fade" id="LoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email"  class="form-control validate" name="lemail" id="lemailid">
          <label data-error="wrong" data-success="right" for="defaultForm-email" required>Your email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password"  class="form-control validate" name="lpassword" id="lpasswordid">
          <label data-error="wrong" data-success="right" for="defaultForm-pass" required>Your password</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
      <button type="submit" class="btn btn-primary" name="loginbutton"  onclick="javascript:Login()" >Login</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="RegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Register</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email"  class="form-control validate" name="remail" placeholder="Enter email" id="remailid" required>
          <label data-error="wrong" data-success="right" for="defaultForm-email" >Your email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="text"  class="form-control validate" name="rname" id="rnameid" placeholder="Enter name" required>
          <label >Your name</label>
        </div>
        
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="text"  class="form-control validate" name="runame" id="runameid" placeholder="Enter username" required>
          <label >Your username</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password"  class="form-control validate" name="rpassword" id="rpasswordid" placeholder="Enter password"required>
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
        </div>

        <div class="alert alert-danger collapse" role="alert" id="Registeremailalert">
          <strong>Please insert missing Data</strong> 
          <button type="button" class="close" id="healert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>


      </div>
      <div class="modal-footer d-flex justify-content-center form-group">
        <button type="submit" class="btn btn-primary" name="loginbutton"  onclick="javascript:Register()" >Register</button>
      </div>
    </div>
  </div>
</div>


<script>

$("#healert").click(function(){
        $("#Registeremailalert").toggle();
    });
</script>

<script>

    function sidebarTogglerClick() {
        console.log("sers")
        // open or close navbar
        $('#sidebar').toggleClass('d-none');
        $('#sidebar').toggleClass('d-block');

        $('#sidebar[aria-expanded=true]').attr('aria-expanded', 'false');
    };

</script>




