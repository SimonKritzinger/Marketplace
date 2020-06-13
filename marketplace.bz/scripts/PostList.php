  <div class="container">
    <div class="row" id="Post">

      <?php
        require_once 'C:\Wamp.NET\sites\marketplace.bz\inc\classes\Functions.php';
        $postdb = new Functions();
        $postdb->getAllPosts();
      ?>

    </div>
  </div>
