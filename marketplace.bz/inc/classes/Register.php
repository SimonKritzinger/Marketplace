<html>
<?php
 require_once "CategoriesDB.php";
?>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>

    function myRegister(){
        <?php
            
            $test = new CategoriesDB();
            
		?>

        alert("<?php echo $test->storepassword();; ?>")
    };
</script>
</head>
<titel>

</titel>
<body>
<form action="Register.php" method="post">
<div class="container">
<h1> Register for Marketplace </h1>
<p> Please fill in this form to create an account for Marketplace. </p>


<table class="table">
<tbody>
    <tr>
        <td> <label for="name"><b>Name</b></label> </td>
        <td> <input type="text" placeholder="Name" name="name" required> </td>
    </tr>

    <tr>
        <td> <label for="email"><b>Email</b></label> </td>
        <td> <input type="text" placeholder="Enter your Email" name="email" required> </td>

    </tr>

    <tr>
        <td> <label for="password"><b>Password</b></label> </td>
        <td> <input type="password" placeholder="Enter Password" name="password" required> </td>
    </tr>

    <tr>
        <td> <label for="username"><b>Username</b></label> </td>
        <td> <input type="text" placeholder="Enter Username" name="username" required> </td>
    </tr>

</tbody>
</table>


<button type="submit" class="registerbtn" onclick="myRegister()">Register</button>

</div>
</form>
</body>
</hmtl>
 