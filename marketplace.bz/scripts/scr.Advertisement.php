<div>
  <?php
    $path = "inc/images/troll/";
    $images = array("7up.jpg","ClassicCoffe.jpg","goodAdvertisement.jpg","GuysTonic.jpg","HappyMovingDay.jpg","HappyMovingDay2.jpg",
    "Heinz.jpg","Pepsi.jpg","Recharge.jpg","Sketofax.jpg","Smoke.jpg","Waitress.png","Yoga.jpeg");
    $number = rand(1,13);
    $number2 = rand(1,13);
    $number3 = rand(1,13);
    while($number == $number2){
      $number2 = rand(1,13);
    }
    while($number == $number3 || $number2 == $number3){
      $number3 = rand(1,13);
    }
    echo '<img src="' . $path . $images[$number-1] . '" width="100%">' ;
    echo '<br><br>';
    echo '<img src="' . $path . $images[$number2-1] . '" width="100%">' ;
    echo '<br><br>';
    echo '<img src="' . $path . $images[$number3-1] . '" width="100%">' ;
  ?>
</div>
