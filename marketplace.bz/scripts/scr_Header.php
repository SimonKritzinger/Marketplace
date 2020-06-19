<link rel="stylesheet" href="../inc/css/NavBar.css">

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top navbar-bottom-border">
    <button class="navbar-toggler" type="button" onclick="sidebarTogglerClick()" id="sidebarToggler" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" style="color: #008CD8" href="">Marketplace</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav mx-auto">
                <form class="form-inline my-2 my-lg-0 w-70">
                    <div class="input-group">
                        <input class="form-control mr-sm-2 form-control-underlined w-90" type="search" placeholder="Search" aria-label="Search" id="Searchfield" >
                        <div class="input-group-append">
                            <button class="btn btn-link text-primary my-2 my-sm-0" type="submit" onclick="javascript:UpdatePost('Search'); return false"><i class="fa fa-search" style="color: #008CD8" ></i></button>
                        </div>
                    </div>
                </form>
        </div>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#LoginForm" id="lbutton">Login</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#RegisterForm" id="rbutton">Register</a>
          </li>
          <li class="nav-item" id="hpostbutton" style="display: none">
            <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#CreatePostForm" id="cbutton" >Create Post</a>
          </li>
          <li class="nav-item" id="hlogoffbutton" style="display: none">
            <button type="button"  class="nav-item nav-link btn btn-info"  id="logoffbutton" onclick="javascript:LogOut()" >Logout</button>
          </li> 
        </ul>
    </div>
</nav>

<div class="modal" tabindex="-1" role="dialog" id="CreatePostForm" > 
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create a Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div class="col-md-16">
          <form method="post" action="/inc/classes/file_upload.php" enctype="multipart/form-data" id="upload_form">
                <div class="form-group">
                  <label for="form-group">Titel </label>
                  <input type="text" class="form-control" id="PTitel" name="titel" placeholder="Input your Titel" size="40" required>
                </div>
                <div class="form-group">
                  <label for="form-group">Description</label>
                  <textarea class="form-control" id="PDescritpion" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                  <label for="form-group">Select Category</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="category">
                    <option>Books</option>
                    <option>Entertainment</option>
                    <option>Electronic</option>
                    <option>Videogames</option>
                    <option>Games</option>
                    <option>House</option>
                    <option>Garden</option>
                    <option>Health and Care</option>
                    <option>Clothing</option>
                    <option>Sport</option>
                    <option>Vehicle</option>
                    <option>Office</option>
                    <option>Services</option>
                  </select>
                </div>
                <div class="form-group files">
                  <label>Upload  Image </label>
                  <input type="file" name="files[]"  class="form-control" single required>
                </div>
                <div>
                <button type="button"  class="btn btn-primary" id="button_upload" onclick="javascript:CreatePost()">Create Post</button>
                </div>
          </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="LoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
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
  <div class="modal-dialog modal-lg" role="document">
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




