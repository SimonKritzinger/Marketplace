<script>
  function myFunction(){
    <?php $test = new CategoriesDB(); ?>
    alert("<?php echo $test->getCategories(); ?>")
  };

  $(document).ready(function(){
    console.log("ready");
  });

</script>




