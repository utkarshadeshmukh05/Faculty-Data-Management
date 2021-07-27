<?php
    error_reporting(0);
    $fname = $_POST["first_name"];
    $lname = $_POST["last_name"];
    $email = $_POST["email"];
    $phone=$_POST["phone"];
    $password = $_POST["password"];
    $msg="";
    $email_error; 
try
{
	$con=mysqli_connect("localhost","root","","faculty_project");
	if($con==false)
	{
    print("Error :".mysqli_connect_error()."<br/>");
	}
	else
	{
    echo  isset($_POST['reg']) ; 
    if( isset($_POST['reg']))
    {
      echo "yes" ; 
      $q_email = "SELECT * FROM account WHERE email_id ='$email' " ; 
      $res = $con->query($q_email) ;
      echo mysqli_num_rows($res) ; 
      if(mysqli_num_rows($res) > 0 )
      {
        //header("Location:welcome.php");
        $email_error = "email already registered .. go to login" ; 
        //echo "email already registered .. go to login" ;
      }
      else
      {
        $sql="insert into account(first_name,last_name,email_id,phone,password) values (?,?,?,?,?)";
        $ps=mysqli_prepare($con,$sql);
        if($ps!=false)
        {
          mysqli_stmt_bind_param($ps,"sssss",$fname,$lname,$email,$phone,$password);
          mysqli_stmt_execute($ps);
          $n=mysqli_stmt_affected_rows($ps);
          mysqli_stmt_close($ps);
          mysqli_close($con);
          if($n==1)
           { header("Location:setclass.php");}
         else
          {
            print("Registration failed..");
          //echo "<p align='center'><font color=red font face='arial' size= '5pt'>Registration failed</font></p>";
          }
                
        }
        else
        {
        mysqli_close($con);
        print("prepared statement not created<br/>");
        }
      }
    }
  } 
}
catch(Exception $ex)
	{
	print($ex-> get_message()."<br/>");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width", initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="./register.css">
    <link rel="stylesheet" href="tech.css">
    <title>Registration</title>
</head>
<body>
  <nav class="navbar"  id="nav" style="background-color:#d40b0b; ">
    <span class="navbar-brand "  id="nav2" style="color:white; margin-left: 5%; 
    text-shadow: 0 3px 10px rgb(0 0 0 / 0.5);"><h3>Register</h3></span>
  </nav>

  

    <div style=" padding: 10px; background-color: #fefeff; box-shadow: 0 3px 10px rgb(0 0 0 / 0.3); margin-top: 1%; margin-left: 31%;   width: 40%; height:fit-content;" >
<div style="margin-left: 20%; padding-right: 15px;">
    <h2 style="margin-left: 70px; margin-bottom: 20px;">Register</h2>
        <form action=" " method="post" id="form" class="input-group" autocomplete="off">
            <div class="row mb-3">
              
              <div class="col-sm-10">
                <input  type="text" class="form-control"  placeholder="enter first name" id ="first" name="first_name">
                <span id ="fname" style="color:red;"></span>
                
              </div>
              
            
              <div class="col-sm-10" style="margin-top: 6%;">
                <input type="text" class="form-control" id="last" placeholder="enter last name" name="last_name" >
                <span id ="lname" style="color:red;"></span>
              </div>
              
            </div>
            <div class="row mb-3">
              
              <div class="col-sm-10">
                <input id= "user" class="form-control"  placeholder="enter your email" name="email">
                <span id="usernames" style="color: red; "></span>
              </div>

              <div class="col-sm-10" style="margin-top: 6%;">
                <input type="text" maxlength="10" class="form-control" id="phone"  placeholder="enter your phone number" name="phone">
                <span id="phone1" style="color: red; "></span>
              </div>

            </div>
            <div class="row mb-3">
            
            <div class="col-sm-10">
              <input type="password" class="form-control" id="pass1"  placeholder="enter your password" name="password">
              <span id="passone" style="color: red; "></span>
            </div>
            </div>
            <div class="col-sm-10 row-mb-3">
                <input type="password" class="form-control" id="pass2"  placeholder="confirm password">
                <span id="passtwo" style="color: red; "></span>
                  </div>
                </div>
                <div class="row mb-3" style="margin-top: 6%; margin-left: 1%">
              <div class="col-sm-10 offset-sm-2">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck1">
                  <label class="form-check-label" for="gridCheck1">
                  Agree terms and condition
                </div>
              </div>
            </div>

            
            <button type="submit" name = "reg" class="btn btn-primary"  style="margin-left:40% ;" >Register</button>
            <div>
              <p><center>Already have an account ? <a href="login.php"> Login Here</a></p>
            </div>
            <div class = "em_error" style = "margin-top :  6% ">
              <?php
              if( isset( $email_error ))
              {
                echo "<center> email already registered .. go to login" ;
              }
              
              ?>
            </div>
          </div>
          </form >
    
</div>
<script type="text/javascript">


form.addEventListener('submit' ,function(event)
{
 var firstname=document.getElementById('first').value;
 var lastname =document.getElementById('last').value;
  var form =document.getElementById('form').value;
var username = document.getElementById('user').value;
var pass1=document.getElementById('pass1').value;
var pass2=document.getElementById('pass2').value;
var phone = document.getElementById('phone').value;

if((firstname == '') && (lastname =='') && ( username=='' ) && ( pass1=='') && ( phone=='')){

  document.getElementById('fname').innerHTML="<h6>**field cant be blank</h6>";
    document.getElementById('first').style.borderColor="red";
    document.getElementById('lname').innerHTML="<h6>**field cant be blank</h6>";
    document.getElementById('last').style.borderColor="red";
    document.getElementById('phone1').innerHTML="<h6>** field cant blank <h6>";
    document.getElementById('phone').style.borderColor="red";
    document.getElementById('usernames').innerHTML="<h6>** cant blank <h6>";
    document.getElementById('user').style.borderColor="red";
    document.getElementById('passone').innerHTML="<h6>**field cant be blank</h6>";
    document.getElementById('pass1').style.borderColor="red";
    document.getElementById('pass2').style.borderColor="red";
    event.preventDefault();
    console.log("prevent")


}

else if((firstname == '') || (lastname =='') || ( username=='' ) || ( pass1=='') || ( phone=='')){


  document.getElementById('first').style.borderColor="red";
 document.getElementById('last').style.borderColor="red";
  document.getElementById('phone').style.borderColor="red";
   document.getElementById('user').style.borderColor="red";
   document.getElementById('pass1').style.borderColor="red";
   document.getElementById('pass2').style.borderColor="red";
   alert("fill all fields to submit form ");
   event.preventDefault();
   console.log("prevent")
  
  
}

else{
 

validate();


}
})


 









  
 
  

function validate(){
  var firstname=document.getElementById('first').value;
 var lastname =document.getElementById('last').value;
  var form =document.getElementById('form').value;
var username = document.getElementById('user').value;
var pass1=document.getElementById('pass1').value;
var pass2=document.getElementById('pass2').value;
var phone = document.getElementById('phone').value;



  if(firstname == '') {

document.getElementById('fname').innerHTML="<h6>**fill it to submit</h6>";
  document.getElementById('first').style.borderColor="red";
 
  console.log("prevent");
    event.preventDefault();
  }


else if(!isNaN(firstname)) {
  document.getElementById('fname').innerHTML="<h6>**not be number</h6>";
  document.getElementById('first').style.borderColor="red";
  event.preventDefault();
  console.log("prevent");
}

  else{

document.getElementById('first').style.border= " 2px solid green";
document.getElementById('fname').innerHTML="   ";
console.log(firstname);

}


 


  if(lastname == '') {

document.getElementById('lname').innerHTML="<h6>**fill it to submit</h6>";
  document.getElementById('last').style.borderColor="red";
 
  
  event.preventDefault();
 
  console.log("prevent");
  

}


else if(!isNaN(lastname)) {
  document.getElementById('lname').innerHTML="<h6>**not bre number</h6>";
  document.getElementById('last').style.borderColor="red";
  event.preventDefault();
  console.log("prevent");
}
else{

document.getElementById('last').style.border= " 2px solid green";
  document.getElementById('lname').innerHTML="   ";
console.log(lastname);

}


  
  
   if(username.endsWith("@cumminscollege.in")){
    console.log(username);

    document.getElementById('user').style.border= " 2px solid green";
    document.getElementById('usernames').innerHTML="   ";
    
    
  }
    

  

    else{

      document.getElementById('usernames').innerHTML="<h6>** cummins oly <h6>";
    document.getElementById('user').style.borderColor="red";
    
    event.preventDefault();
    console.log("prevent");


    }
   


    if(isNaN(phone)){

document.getElementById('phone1').innerHTML="<h6>** numbers  only <h6>";
  document.getElementById('phone').style.borderColor="red";
  
  event.preventDefault();
  console.log("prevent");
 
}

else if(phone.length<10 && phone.length>10){

  document.getElementById('phone').style.border= " 2px solid green";
  document.getElementById('phone1').innerHTML="   ";
  preventDefault();
  console.log("prevent");


}

else{
document.getElementById('phone').style.border= " 2px solid green";
  document.getElementById('phone1').innerHTML="   ";
  console.log(phone);
  
}






   if(pass1.length <=4){



      document.getElementById('passone').innerHTML="<h6>length should > 4</h6>";
    document.getElementById('pass1').style.borderColor="red";
    document.getElementById('pass2').style.borderColor="red";
    event.preventDefault();
    

    }

    else if(pass1 != pass2){


      document.getElementById('passone').innerHTML="<h6>not match</h6>";
    document.getElementById('pass1').style.borderColor="red";
    document.getElementById('pass2').style.borderColor="red";
    
    event.preventDefault();
    console.log("prevent");
   
   
    }

    
    else{


      document.getElementById('pass1').style.border= " 2px solid green";
    document.getElementById('pass2').style.border= " 2px solid green";
    document.getElementById('passone').innerHTML= " ";
    console.log(pass1);
  

    }
  
  
  
  }

/*function check(){
var  ac = document.getElementsByClassName('succ')
let count=5;
if(ac==5){
alert("suceesfull");
document.getElementById('first').style.border= " 2px solid green";
    document.getElementById('fname').innerHTML="   ";
    
    
  document.getElementById('last').style.border= " 2px solid green";
    document.getElementById('lname').innerHTML="   ";

document.getElementById('phone').style.border= " 2px solid green";
    document.getElementById('phone1').innerHTML="   ";
   
    document.getElementById('user').style.border= " 2px solid green";
    document.getElementById('usernames').innerHTML="   ";
    
    document.getElementById('pass1').style.border= " 2px solid green";
    document.getElementById('pass2').style.border= " 2px solid green";
    document.getElementById('passone').innerHTML= " ";
   



  
}

}



function add(){

$(document).ready(function(){

$("#true").addClass("succ");
})

}
*/

    
</script>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
 integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
