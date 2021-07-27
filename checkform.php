<?php
error_reporting(0);
session_start();
$email = $_SESSION["email"];
//print($email);
if (isset($_POST['submit'])){
 // error_reporting(0);
   // $email = $_SESSION["email"];
    
    $year = $_POST["year"];
    $branch = $_POST["branch"];
    $division = $_POST["division"];
try{
$con=mysqli_connect("localhost","root","","faculty_project");
if($con==false)//1-if
{
print("Error :".mysqli_connect_error()."<br/>");
}
else{ //1-else
$sql="select * from setprofile where email_id='$email' and year='$year' and branch='$branch' and division='$division'";
$result = mysqli_query( $con,$sql ) ; 
if($result)
  {
   $arr=mysqli_fetch_array($result);
   $uclassincharge=$arr["classincharge"];
  if($uclassincharge=='yes') //4-if
  {
  header("Location:home2.html");
  //echo $email;
  }
  else{
  echo "<p align='center'><font color=red font face='arial' size= '5pt'>You are notclassincharge </font></p>";
  }
}  //3-else
else{

//$final_result="Invalid Email-id";
echo "<p align='center'><font color=red font face='arial' size= '5pt'>Cannot fetch result </font></p>";
}}

}
catch(Exception $e)
{$final_result=$e->get_message();
}}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
 integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="tech.css">
    <title>checkform</title>
</head>
<body>
    <nav class="navbar"  id="nav" style="background-color:#d40b0b; ">
        <span class="navbar-brand "  id="nav2" style="color:white; margin-left: 5%; 
        text-shadow: 0 3px 10px rgb(0 0 0 / 0.5);"><h3></h3></span>
      </nav>

 
        <div id="back" style=" padding: 10px; margin-top: 0%; margin-left: 35%;  border: 1px solid #fdfeff; width: 35%; height:auto;" >
            <div  style="margin-left: 25%; padding-right: 15px;">
                <div style="margin-left: 26px;  font-weight: bolder; font-size:larger;  
                font-family: 'PT Sans', sans-serif;"></div>
                    <form action=" " id="form" method="post" >
                        
                        
                        
                      
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
        
                          <div class="col-sm-10" style="margin-top: 4%;" id="true">
                            <h6 style="font-weight: bold;">Division</h6>
                            <span id="pass3" style="color: red; padding: 0%; "> </span>
                            
                            <select id="year3" name="division">
                              <option value="Select Division">Select Division</option>
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                              <option value="D">D</option>
                            </select>
                          </div>
                          
                        </div>
                        
              
                          
                              </div>
                          
        
                        </div>
                        
                        
                             
            
                        
                        <button type="submit" class="btn"  id ="color" style="margin-left:30%; 
                         width: 30%; padding: 10px; margin-top: 4% ; color: white;" name="submit">Submit</button>
                      </div>
                      </form>
                
            </div>
           </body>
   

</html>