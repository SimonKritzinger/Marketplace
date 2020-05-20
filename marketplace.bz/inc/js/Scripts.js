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

    return false;
}

/*
function GetAllPosts(){
  $.ajax({
    type:'GET',
    url:'inc/classes/PostDB.php',
    data:{

    },
    success:function(data){

    }
  });
}
*/
