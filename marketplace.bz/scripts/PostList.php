  <div class="container">
    <div class="row" id="Post">

      <?php
        require_once 'inc\classes\Functions.php';
        $postdb = new Functions();
        $postdb->getAllPosts();
      ?>

    </div>
  </div>
