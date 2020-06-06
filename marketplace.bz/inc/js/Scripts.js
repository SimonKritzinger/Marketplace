
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