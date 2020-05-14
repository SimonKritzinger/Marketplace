  <div class="container">
    <div class="row">

      <div class="col-md-4">
        <div class="card mb-4 box-shadow" data-toggle="modal" data-target="#exampleModalLong">
          <img class="card-img-top" alt="Thumbnail[100%x225]" style="height:225px;width:100%;display:block;"
          src="inc/images/stefan-chair-brown-black.webp" data-holder-rendered="true">
          <hr style="margin-top:0rem;margin-bottom:0rem;">
          <div class="card-body">
            <!--<p class="card-text"></p>-->
            <div class="d-flex justify-content-between align-items-center">
              <small class="text-muted" style="font-size:18px">Brown Black Chair</small>
              <span class="border border-primary rounded blue-box">House</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:800px">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle" style="margin:auto">Brown Black Chair</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Thumbnail[100%x225]" style="height:225px;width:225px;display:block;"
              src="inc/images/stefan-chair-brown-black.webp" data-holder-rendered="true">
              <hr style="margin-top:0rem;margin-bottom:0rem;">
              here comes the description
              <p></p>
              and maybe price and something else...
            </div>
            <div class="modal-footer">
              <small class="text-muted" style="font-size:18px;margin:auto">Contact: ThisIsYourEmail@gmail.com</small>
            </div>
          </div>
        </div>
      </div>

      <?php
        for($i = 0; $i < 10; $i++){
          echo '<div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top" alt="Thumbnail[100%x225]" style="height:225px;width:100%;display:block;"
              src="inc/images/stefan-chair-brown-black.webp" data-holder-rendered="true">
              <hr style="margin-top:0rem;margin-bottom:0rem;">
              <div class="card-body">
                <!--<p class="card-text"></p>-->
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted" style="font-size:18px">Brown Black Chair</small>
                  <span class="border border-primary rounded blue-box">House</span>
                </div>
              </div>
            </div>
          </div>';
        }
      ?>

    </div>
  </div>
