<?php
if (isset($_POST['submit'])){
  error_reporting(0);
    $email = $_POST["email"];
    $year = $_POST["year"];
    $branch = $_POST["branch"];
    $division = $_POST["division"];
    $subject = $_POST["subject"];
    $classincharge = $_POST["classincharge"];
    
try
{
	$con=mysqli_connect("localhost","root","","faculty_project");
	if($con==false)
	{
    print("Error :".mysqli_connect_error()."<br/>");
	}
	else
	{
    $sql="insert into setprofile(email_id,year,branch,division,subject,classincharge) values (?,?,?,?,?,?)";
    $ps=mysqli_prepare($con,$sql);
    if($ps!=false)
    {
      mysqli_stmt_bind_param($ps,"sssiss",$email,$year,$branch,$division,$subject,$classincharge);
      mysqli_stmt_execute($ps);
      $n=mysqli_stmt_affected_rows($ps);
      mysqli_stmt_close($ps);
      mysqli_close($con);
      if($n==1)
        echo "<p align='center'><font color=red font face='arial' size= '5pt'>Record Added..</font></p>";
     else
      {
        //print("Record Not Added..");
      echo "<p align='center'><font color=red font face='arial' size= '5pt'>Record Not Added..</font></p>";
      }
            
    }
    else
    {
    mysqli_close($con);
    print("prepared statement not created<br/>");
    }
  } 
}
catch(Exception $ex)
	{
	print($ex-> get_message()."<br/>");
	}
}

if (isset($_POST['login'])){
header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Set Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
 integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head> 
 <link rel="stylesheet" href="./tech.css">
  
</head>
<body>
<nav class="navbar"  id="nav" style="background-color:#d40b0b; ">
    <span class="navbar-brand "  id="nav2" style="color:white; margin-left: 5%; 
    text-shadow: 0 3px 10px rgb(0 0 0 / 0.5);"><h3>Set classes</h3></span>
  </nav>
  <div id="back" style=" padding: 10px; margin-top: 0%; margin-left: 35%;  border: 1px solid #fdfeff; width: 35%; height:auto;" >
    <div  style="margin-left: 25%; padding-right: 15px;">
        <div style="margin-left: 26px;  font-weight: bolder; font-size:larger;  
        font-family: 'PT Sans', sans-serif;"></div>
    <div class="form-container">
        <form action=" "  id="form" method="post" class="input-group">
             
          <div class="row mb-3">
          <div class="col-sm-8" id="true">
          <input type="text"  class="form-control" id="year4"  placeholder="Enter Email i'd" name="email">
           <span id="pass4" style="color: red; padding: 0%; "> </span>
           </div
                    
          <div class="row mb-3">
          <div class="col-sm-10" id="true">
            <h6 style="font-weight: bold; margin-top: 10px;">Year</h6>
           <span id="pass1" style="color: red; padding: 0%; "> </span>
          <select id="year1" name="year">
            <option value="Select Year">Select Year</option>
            <option value="1">I</option>
            <option value="2">II</option>
            <option value="3">III</option>
            <option value="4">IV</option>
          </select>
          </div>
          
          <div class="col-sm-10" style="margin-top: 4%;" id="true">
                    <h6 style="font-weight: bold;">Branch</h6>
                    <span id="pass2" style="color: red; padding: 0%; "> </span>
                    
            <select id="year2" name="branch">
            <option value="Branch">Select Branch</option>
            <option value="cs">Computer Science</option>
            <option value="It">Information Technology</option>
            <option value="Mech">Mechanical</option>
            <option value="Instru">Instrumentation</option>
            <option value="EnTC">Electronics and Telecommunication</option>
          </select>
          </select>
          </div>
          
          <div class="row mb-3" style="margin-top: 5%;" >
          <div class="col-sm-8" id="fal">
                   <input type="text" style="padding-right: 10px; width: 100%;" class="form-control" id="year6"  placeholder="Enter the Division" name="division">
                   <span id="pass6" style="color: red; padding: 0%; "> </span>
                    </div>
                  </div>
          
          <div class="row mb-3" style="margin-top: 5%;" >
           <div class="col-sm-8" id="fal">
                   <input type="text" style="padding-right: 10px; width: 100%;" class="form-control" id="year6"  placeholder="Enter the Subject" name="subject">
                   <span id="pass6" style="color: red; padding: 0%; "> </span>
                    </div>
                  </div>
          <div class="check" style="margin-top: 8px;">
         <div class="select" style="font-weight: bold;">Are you Class Incharge?</div>
          <div class="group">
            <input type="radio" name="classincharge" value="yes">Yes
           <!-- <label for="sketch">Yes</label>-->
            <input type="radio" name="classincharge" value="no">NO
           <!-- <label for="sketch">Yes</label>-->
        </div>
       
       </div>
        
        
        
         <button type="submit" class="btn"  id ="color" style="margin-left:2%; 
                 width: 30%; padding: 10px; margin-top: 4% ; color: white;" name="submit">Save</button>
          <button type="submit" class="btn"  id ="color" style="margin-left:2%; 
                 width: 30%; padding: 10px; margin-top: 4% ; color: white;" name="login">Login</button>
              </div>
       </form>
    </div>

    
</body>



<script>
var form = document.getElementById('form');
  var cb1 = document.getElementById('sketch');
  var cb2 = document.getElementById('sketch2');
  
  
  form.addEventListener( 'submit' , (event)=>
  {



    var form4 = document.getElementById("year2").value;
    var form5 =document.getElementById("year1").value;
    var form6 =document.getElementById("year3").value;
    var username = document.getElementById("year4").value;
    var year6 = document.getElementById("year6").value;
  


    if((form4 == "Computer Science")||(form4 == "Information Technology")||(form4 == " Electronics and Telecommunication ")
    ||(form4 == " Mechanical")|| (form4 == "Instrumental")){
    document.getElementById('pass2').innerHTML="    ";
    
  }
  
    else{
     
      document.getElementById('pass2').innerHTML="<h6>**select valid option</h6>";
   
   event.preventDefault();
   
    
    }
  
  
  
    if((form5 == "1st")||(form5 == "2nd")||(form5 == "3rd")||(form5 == "4th")){
    document.getElementById('pass1').innerHTML="    ";
    
  }
  
    else{
     
      document.getElementById('pass1').innerHTML="<h6>**select valid option</h6>";
   
   event.preventDefault();
   
    
    }
  
  
    if((form6 == "A")||(form6 == "B")||(form6 == "C")||(form6 == "D")){
    document.getElementById('pass3').innerHTML="    ";
    
  }
  
    else{
     
      document.getElementById('pass3').innerHTML="<h6>**select valid option</h6>";
   
   event.preventDefault();
   
    
    }
  
  

    if(username.includes("@") && username.endsWith("cumminscollege.in")){

document.getElementById('year4').style.border= " 2px solid green";
document.getElementById('pass4').innerHTML="   ";

}


else if(username == ''){

  document.getElementById('pass4').innerHTML="<h6>** cant blank <h6>";
document.getElementById('year4').style.borderColor="red";
event.preventDefault()

  


}


else{

  document.getElementById('pass4').innerHTML="<h6>** cummins id only <h6>";
document.getElementById('year4').style.borderColor="red";
event.preventDefault()


}


if(year6 == '')
  {
  document.getElementById("pass6").innerHTML="<h6>**not be empty</h6>";
  document.getElementById("year6").style.borderColor="red";
  event.preventDefault();
 

}

  
  else if(!isNaN(year6)) {
  document.getElementById('pass6').innerHTML="<h6>**not be number</h6>";
  document.getElementById('year6').style.borderColor="red";
  event.preventDefault();
 
}

  else{

document.getElementById('year6').style.borderColor="green";
document.getElementById('pass6').innerHTML="   ";


}



  



  
if(cb1.checked == false && cb2.checked == false){
  document.getElementById("check1").innerHTML="<h6>**select checkbox</h6>"

}

else if(cb1.checked == true && cb2.checked == true){
  document.getElementById("check1").innerHTML="<h6>**select one checkbox</h6>"
}

else{
  document.getElementById("check1").innerHTML=" ";


}


  /*if (cb1.checked == true){
  
    window.open( "./add.html");
  
  
  }
  
  
  
  if (cb2.checked == true){
  
  window.open('./login.html');
  
  
  }
  
  */
  }
  )
  
</script>


</html>
