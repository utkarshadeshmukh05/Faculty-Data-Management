<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width", initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="./tech.css">
    <title>Login</title>
</head>
<body>


  <nav class="navbar"  id="nav" style="background-color:#d40b0b; ">
    <span class="navbar-brand "  id="nav2" style="color:white; margin-left: 5%; 
    text-shadow: 0 3px 10px rgb(0 0 0 / 0.5);"><h3>Login</h3></span>
  </nav>
  

    <div style=" padding: 10px; margin-top: 2%; margin-left: 31%;   background-color: #fefeff; box-shadow: 0 3px 10px rgb(0 0 0 / 0.3);  width: 40%; height:fit-content;" >
<div style="margin-left: 20%; padding-right: 15px;">
    
        <form action="#"  id="form" method="post">
        
            <div class="row mb-3">
              
              <div class="col-sm-10">
                <input id= "user" class="form-control"  placeholder="Enter your email" name="email">
                <span id="usernames" style="color: red; "></span>
              </div>
              <div class="col-sm-10" style="margin-top: 6%;">
                <input type="password" class="form-control" id="pass1"  placeholder="Enter your password" name="password" >
                <span id="passone" style="color: red; "></span>
              </div>

              </div>
        
              <div class="col-sm-10 ">
                <div>
                  <h5>dont have an account?<a class ="link-info" href="register.php">Register?</a></h5>
                </div>
              </div>
            </div>

            
            <button type="submit" style="margin-left:35%; 
            width: 30%; padding: 10px; margin-top: 4% ;  background-color: #d40b0b; color: white;" class="btn" style="margin-left:40% ;" name="login">Login</button>
          
           
          </div>
          </form >
    
</div>
<script type="text/javascript">


form.addEventListener('submit' ,function(event)
{
 
  var form =document.getElementById('form').value;
var username = document.getElementById('user').value;
var pass1=document.getElementById('pass1').value;


if(username.includes("@") && username.endsWith("cumminscollege.in")){

    document.getElementById('user').style.border= " 2px solid green";
    document.getElementById('usernames').innerHTML="   ";
    
  }
    

    else if(username == ''){

      document.getElementById('usernames').innerHTML="<h6>** Email-ID Required <h6>";
    document.getElementById('user').style.borderColor="red";
    event.preventDefault()
    
      


  }
  

    else{

      document.getElementById('usernames').innerHTML="<h6>** cummins ID Only <h6>";
    document.getElementById('user').style.borderColor="red";
    event.preventDefault()


    }
   
  





  if(pass1 == ''){

    document.getElementById('passone').innerHTML="<h6>**Password Required</h6>";
    document.getElementById('pass1').style.borderColor="red";
   

    event.preventDefault()
    }

    else{

        document.getElementById('pass1').style.border= " 2px solid green";
    document.getElementById('passone').innerHTML="   ";
    

    }



    
    


    })
</script>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
 integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>


<?php
$email=$password="";
$email_err=$password_err=$final_reult="";
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
if(array_key_exists("login",$_POST))
{
$c=0;
}
if(empty(trim($_POST["email"])))
{
$email_err="EmailId required";
$c++;
}
else
{
$email=$_POST["email"];
$email_err="";
}
if(empty($_POST["password"]))
{
$password_err="Password is required";
$c++;
}
else
{
$password=$_POST["password"];
$password_err="";
}
if($c==0)
{
try{
$con=mysqli_connect("localhost","root","","faculty_project");
if($con==false)//1-if
{
print("Error :".mysqli_connect_error()."<br/>");
}
else{ //1-else
$sql="select email_id,password from account where email_id=?";
$ps=mysqli_prepare($con,$sql);
if(!$ps==false) //2-if
{
mysqli_stmt_bind_param($ps,"s",$email);
$uemail=$upass="";
mysqli_stmt_bind_result($ps,$uemail,$upass);
mysqli_stmt_execute($ps);
if(mysqli_stmt_fetch($ps)!=null)  //3-if
{
mysqli_stmt_close($ps);
mysqli_close($con);
if(strcmp($password,$upass)==0) //4-if
{
$_SESSION["email"]=$uemail;
header("Location:home.html");
}
else  //4-else
{
//$final_result="Invalid Password";
echo "<p align='center'><font color=red font face='arial' size= '5pt'>INVALID PASSWORD</font></p>";

}}  //3-else
else{
mysqli_stmt_close($ps);
mysqli_close($con);
//$final_result="Invalid Email-id";
echo "<p align='center'><font color=red font face='arial' size= '5pt'>INVALID USERNAME</font></p>";
}}
else{ //2nd-else
mysqli_close($con);
print("Prepared statement is not created<br/>");
}

}}
catch(Exception $e)
{$final_result=$e->get_message();
}
}
}
?>