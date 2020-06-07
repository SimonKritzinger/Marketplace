<?php

  class Functions{

    public static function getConnectionStatus(){
			$ret = "";
			//https://www.a2hosting.com/kb/developer-corner/postgresql/connect-to-postgresql-using-php
			$db_connection = pg_connect("host=localhost port=5433 dbname=Marketplace user=Admin password=master69key420");
			//$result = pg_query($db_connection, "SELECT lastname FROM employees");

			$stat = pg_connection_status($db_connection);
			if($stat === PGSQL_CONNECTION_OK){
				echo 'Connection status ok';
			}else{
				echo 'Connection status bad';
			}
			pg_close($db_connection);
		}

    public function getAllPosts(){
      $db_connection = pg_pconnect("host=localhost port=5433 dbname=Marketplace user=Admin password=master69key420");
      if(!$db_connection){
        echo "An Error occured while trying to connect to the Database.\n";
        exit;
      }else{
        $sql = "SELECT * FROM post join muser on muser.userid = post.userid;";
        $result = pg_query($db_connection,$sql);
        if(!$result){
          echo "An Error occured while trying to query the Database.\n";
          exit;
        }else{
          if(pg_num_rows($result) == 0){
            echo "There are 0 records.\n";
          }else{
            while($row = pg_fetch_array($result)){
              $postid = $row[0];
              $userid = $row[1];
              $category = $row[2];
              $titel = $row[3];
              $description = $row[4];
              $images = $row[5];
              $email = $row[9];
              ?>

              <div class="col-md-4">
                <div class="card mb-4 box-shadow" data-toggle="modal" data-target="#<?php echo $postid ?>">
                  <img class="card-img-top" alt="<?php echo $images ?>" style="height:225px;width:100%;display:block;"
                  src="inc/images/<?php echo $images ?>" data-holder-rendered="true">
                  <hr style="margin-top:0rem;margin-bottom:0rem;">
                  <div class="card-body">
                    <!--<p class="card-text"></p>-->
                    <div class="d-flex justify-content-between align-items-center">
                      <small class="text-muted" style="font-size:18px"><?php echo $titel ?></small>
                      <span class="border border-primary rounded blue-box"><?php echo $category ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="<?php echo $postid ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width:800px">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle" style="margin:auto"><?php echo $titel ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="<?php echo $images ?>" style="height:225px;width:225px;display:block;"
                      src="inc/images/<?php echo $images ?>" data-holder-rendered="true">
                      <hr style="margin-top:0rem;margin-bottom:0rem;">
                      <?php echo $description ?>
                    </div>
                    <div class="modal-footer">
                      <small class="text-muted" style="font-size:18px;margin:auto">Contact: <?php echo $email ?></small>
                    </div>
                  </div>
                </div>
              </div>

              <?php
            }
          }
        }
      }
    }

  }

 ?>
