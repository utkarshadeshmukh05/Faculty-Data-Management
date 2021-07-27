<?php
  error_reporting(0) ;
  //if (ob_get_level()) ob_end_clean();
  $conn = mysqli_connect('localhost', 'root', '', 'faculty_project');


  if( $conn ) 
  {
    if( isset($_POST["add"]))
    {
      echo "dfskd" ; 
      $branch = $_POST["branch"] ; 
      $year = $_POST["year"] ; 
      $division = $_POST["division"] ; 
      $subject = $_POST["subject"] ; 
  
      $sql = "SELECT * from teachingplan where branch = '$branch' and year = '$year' and division = '$division' and subject = '$subject'  " ; 
      $result = $conn->query( $sql ) ; 
      
  
      if($result)
      {
        echo "jfj" ;
  
  
        $arr=mysqli_fetch_array($result);
         
        $path='teachingplan_uploads/'.$arr["teachingplan_file"];
        //echo "     " . $path ; 
        $filename = $arr["teachingplan_file"]  ; 
        $use_include_path = 'teachingplan_uploads/'.$filename;
  
  
        if( file_exists($path))
        {
        header('Content-type:application/pdf');
header('Content-Description:inline;filename="'.$arr["teachingplan_file"].'"');
header('Expires: 0');
header('Content-Transfer-Encoding:binary');
header('Accept-Ranges:bytes');
@readfile('teachingplan_uploads/'.$arr["teachinplan_file"]);
     
          $fp = fopen($use_include_path, "r") ;
     
          ob_clean();
          flush();
          while (!feof($fp)) 
          {
              $buff = fread($fp, 1024);
              print $buff;
          }
        }
        else
        {
          echo "sorry , file doesn't exist " ; 
        }
}
      else
      {
        echo "teaching plan not displayed " ; 
      }
      
    }
  }  
  else
  {
    echo "connection failed" ; 
  }

  
  

?>










<!DOCTYPE html>
<html lang="en">
<head>
  <title>Teachplan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
 integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./tech.css">
  
</head>
<body>


  <nav class="navbar"  id="nav" style="background-color:#d40b0b; ">
    <span class="navbar-brand "  id="nav2" style="color:white; margin-left: 5%; 
    text-shadow: 0 3px 10px rgb(0 0 0 / 0.5);"><h3> View Teaching Plan</h3></span>
  </nav>
  <div class="wrapper">
    <div class="sidebar">
       
        <ul>
            <li><li><a href="./home.html">Home</a></li>
          <li><a href="./timetable.php">Add timetable</a></li>
          <li><a href="./studentlist.php">Add StudentList</a></li>
          <li><a href="./Viewteachingplan.php">View Teaching plan</a></li>
          <li><a href="./Viewattendance.php">View Attendance List</a></li>
          <li><a href="./defaulter.php">Gernerate defalter</a></li>
        </ul> 
    </div>
    </div>
  
  <div id="back" style=" padding: 10px; margin-top: 5%; margin-left: 35%;  border: 1px solid #fdfeff; width: 35%; height:auto;" >
    <div  style="margin-left: 25%; padding-right: 15px;">
        <div style="margin-left: 26px;  font-weight: bolder; font-size:larger;  font-family: 'PT Sans', sans-serif;"></div>
            <form action=" "  id="form" method = "post">
                <div class="row mb-3">

                    <div class="col-sm-10" style="margin-top: 4%;" id="true">
                        <h6>Branch</h6>
                        <select id="year" name = "branch">
                          <option value="year">Select Branch</option>
                          <option value="CS">Computer Science</option>
                          <option value="IT">Information Technology</option>
                          <option value="ENTC">Electronics and Telecommunication </option>
                          <option value="MECH">Mechanical</option>
                          <option value="INSTRU">Instrumental</option>
                        </select>
                      </div>  
                  
                  <div class="col-sm-10" id="true">
                   <h6>Year</h6>
          <select id="year" name = "year" >
            <option value="year">Select Year</option>
            <option value="1">I</option>
            <option value="2">II</option>
            <option value="3">III</option>
            <option value="4">IV</option>
          </select>
                    
                  </div>
                  
                
                  <div class="col-sm-10" style="margin-top: 4%;" id="true">
                    <h6>Division</h6>
                    <select id="year" name = "division">
                      <option value="year">Select Division</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                      <option value="E">E</option>
                      <option value="F">F</option>
                      <option value="G">G</option>
                      <option value="H">H</option>
                      <option value="I">I</option>
                    </select>
                  </div>
                  
                </div>
                <div class="row mb-3">
                  
                  <div class="col-sm-8" id="true" >
                    <input id= "user" class="form-control"  name = "subject" placeholder="enter subject">
                    
                  </div>
                  
    
                  </div>
                
    
                
                <button type="submit" class="btn" name = "add" id ="color" style="margin-left:5%;  width: 80%; padding: 10px; margin-top: 3% ; color: white;">View TeachingPlan</button>
              </div>
              </form >
        
    </div>





   
</body></html>























































