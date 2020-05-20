<script>
  function getConnection(){
    <?php
      require_once 'inc/classes/Functions.php';
      $test = new Functions();
    ?>
    alert("<?php echo $test->getConnectionStatus(); ?>")
  };

  $(document).ready(function(){
    console.log("ready");
  });

</script>
