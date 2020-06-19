
function Register(){

  var email = document.getElementById("remailid").value;
  var pass= document.getElementById("rpasswordid").value;
  var name= document.getElementById("rnameid").value;
  var username= document.getElementById("runameid").value;
  //check that email an password are not null
  if(email=="" || pass=="" || name=="" || username=="" ){

    $("#Registeremailalert").show();

  }else{

    $.ajax
    ({
      type:'POST',
      url:'inc/classes/registeruser.php',
      data:{
      email:email,
      password:pass,
      name:name,
      username:username,
      },

      success:function(data){
         if(data){
          var result = JSON.parse(data);
          alert(result.message);

          if(result.message =="Registration complete"){
             window.location.href="index.php";
          }
         }
      }
    });
  }
}

function Login(){

var email = document.getElementById("lemailid").value;
var pass= document.getElementById("lpasswordid").value;


if(pass=="" || email=="" ){

  $("#Registeremailalert").show();

}else{

  $.ajax
  ({
    type:'POST',
    url:'inc/classes/Login.php',
    data:{
    email:email,
    password:pass,
    },

    success:function(data){
       if(data){
        var result = JSON.parse(data);
        alert(result.message);

        if(result.message =="Login completed"){
          $('#LoginForm').modal('hide');
          document.getElementById("lbutton").style.display='none';
          document.getElementById("rbutton").style.display='none';
          document.getElementById("hpostbutton").style.display='block';
          document.getElementById("hlogoffbutton").style.display='block';
        }
       }
    }
  });
 }
}

function CreatePost(){

  var formData = new FormData($('#upload_form')[0]);

    $.ajax
    ({
      type:'POST',
      enctype: 'multipart/form-data',
      url:'inc/classes/createpost.php',
      data:formData,
      contentType: false,
      processData: false,
      cache: false,
      success:function(data){
         if(data){
          var result = JSON.parse(data);
          alert(result.message);

          if(result.message =="Post was created"){
            window.location.href="index.php";
          }
         }
      }
    });

}

function LogOut(){

    $.ajax
    ({
      type:'POST',
      url:'inc/classes/logoff.php',

      success:function(data){
         if(data){
          var result = JSON.parse(data);
          alert(result.message);

          if(result.message =="Logout completed"){

            window.location.href="index.php";
          }
         }
      }
    });
}

function UpdatePost(userinput){

  var searchtext =  document.getElementById("Searchfield").value;
  
  if(!searchtext && userinput == "Search"){

    alert("Please enter something to search for");

  }else{

    searchtext = "%" + searchtext +"%";
    
    document.getElementById("Post").innerHTML="";
    $.ajax
  ({

    type:'POST',
    url:'inc/classes/updatepost.php',
    async: false,
    data:{
    input:userinput,
    searchinput:searchtext,
    },

    success:function(data){

      var postdiv = document.getElementById("Post");
      var result = JSON.parse(data);

      if(result.hasOwnProperty('message')){

        alert(result.message);

      }else{

        result.forEach(function(item){

          var postid = item.postid;
          var category = item.category;
          var titel = item.titel;
          var description = item.description;
          var images = item.primaryimage;
          var email = item.email;


        $('#Post').append('<div class="col-md-4">' +
              '<div class="card mb-4 box-shadow" data-toggle="modal" onclick="ToggleModal(this.id)" id="#'+ postid +'">'+
                '<img class="card-img-top" alt="'+images + '" style="height:225px;width:100%;display:block;"'+
                'src="inc/images/' +images+ '" data-holder-rendered="true">'+
                '<hr style="margin-top:0rem;margin-bottom:0rem;">'+
                '<div class="card-body">'+
                  '<div class="d-flex justify-content-between align-items-center">'+
                    '<small class="text-muted" style="font-size:18px">' +titel+ '</small>'+
                    '<medium class="border border-primary rounded blue-box">' +category + '</medium>'+
                  '</div>'+
                '</div>'+
              '</div>'+
            '</div>'+
            '<div class="modal fade" id="'+postid+ '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">'+
              '<div class="modal-dialog" role="document" style="max-width:800px">'+
                '<div class="modal-content">'+
                  '<div class="modal-header">'+
                    '<h5 class="modal-title" id="exampleModalLongTitle" style="margin:auto">' +titel +'</h5>'+
                    '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                      '<span aria-hidden="true">&times;</span>'+
                    '</button>'+
                  '</div>'+
                  '<div class="modal-body">'+
                    '<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="'+images +'" style="height:225px;width:225px;display:block;"'+
                    'src="inc/images/'+ images +'" data-holder-rendered="true">'+
                    '<hr style="margin-top:0rem;margin-bottom:0rem;">'+ description+
                  '</div>'+
                  '<div class="modal-footer">'+
                    '<small class="text-muted" style="font-size:18px;margin:auto">Contact:' +email +'</small>'+
                  '</div>'+
                '</div>'+
              '</div>'+
            '</div>')

        });

      }

    }
  });
  } 
  
  sidebarTogglerClick();
 
}

function ToggleModal(id){
  var res = id.replace("#", "");
  $("#"+res).modal('show');
}
