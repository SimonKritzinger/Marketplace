  <div class="container">
    <div class="row">

      <?php
        
        require_once 'inc\classes\Functions.php';
        $postdb = new Functions();
        if(isset($_POST['input'])){
          $Normal = $_POST['input'];
        }else{
          $Normal = "Normal";
        }
        $postdb->getAllPosts($Normal);
      ?>

    </div>
  </div>
