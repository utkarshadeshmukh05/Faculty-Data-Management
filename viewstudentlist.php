<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student List</title>
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
    text-shadow: 0 3px 10px rgb(0 0 0 / 0.5);"><h3> View Student List</h3></span>
  </nav>
  <div class="wrapper">
    <div class="sidebar">
       
        <ul>
          <li><a href="./setclass.php">Set Profile</a></li>
                  <li><a href="./addteachplan.php">Add Teach plan</a></li>
                  <li><a href="./addattendance.php">Add Attendance</a></li>
                  <li><a href="./viewtimetable.php">View Timetable</a></li>
                  <li><a href="./Viewstudentlist.php">View class List</a></li>
                  <li><a href="checkform.php">Class Incharge</a></li>
                  <li><a href="#">Logout</a></li>
        </ul> 
    </div>
    </div>
  
  <div id="back" style=" padding: 10px; margin-top: 5%; margin-left: 35%;  border: 1px solid #fdfeff; width: 35%; height:auto;" >
    <div  style="margin-left: 25%; padding-right: 15px;">
        <div style="margin-left: 26px;  font-weight: bolder; font-size:larger;  font-family: 'PT Sans', sans-serif;"></div>
            <form action=" "  id="form" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col-sm-10" style="margin-top: 4%;" id="true">
                        <h6  style="font-weight: bold;">Branch</h6>
                        <span id="pass1" style="color: red;"> </span>
                        <select id="year1" name="branch">
                          <option value="Branch">Select Branch</option>
              <option value="CS">Computer Science</option>
              <option value="IT">Information Technology</option>
              <option value="MECH">Mechanical</option>
              <option value="INSTRU">Instrumentation</option>
              <option value="ETC">Electronics and Telecommunication</option>
                        </select>
                      </div>

                  <div class="col-sm-10" id="true"  style="margin-top: 3%;">
                   <h6  style="font-weight: bold;">Year</h6>
                   <span id="pass2" style="color: red; padding: 0%; "> </span>
          <select id="year2" name="year">
          <option value="year">Select Year</option>
            <option value="1">I</option>
              <option value="2">II</option>
              <option value="3">III</option>
              <option value="4">IV</option>
          </select>
                    
                  </div>
                  
                
                  <div class="col-sm-10" style="margin-top: 3%;" id="true">
                    <h6  style="font-weight: bold;">Division</h6>
                    <span id="pass3" style="color: red; padding: 0%; "> </span>
                    <select id="year3" name="division">
                      <option value="year3">Select Division</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                    </select>
                  </div>
                  
                </div>
                
               
                     
    
                
                <button type="submit" class="btn"  id ="color" style="margin-left:10%;  width: 60%; padding: 10px; margin-top: 4% ; color: white;" name="submit">View StudentList</button>
              </div>
              </form >
        
    </div>

<?php
try{
$conn = mysqli_connect('localhost', 'root', '', 'faculty_project');


  if( $conn ) 
  {
    if( isset($_POST["submit"]))
    {
      $year = $_POST["year"];
      $branch = $_POST["branch"];
      $division = $_POST["division"]; 
      
  
      $sql = "SELECT * from classlist where year='$year' and branch='$branch' and division='$division'" ; 
      $result = mysqli_query( $conn,$sql ) ;
      if(mysqli_num_rows($result)>0)
      {
        ?>
        
        <div style="margin-top:3%; margin-bottom:5%; margin-left:35%; background-color:#f5f5f5;">
        <table>
        <thead>
        <tr>
        <th> Rollno </th>
         <th>Name </th>
         <th>Year</th>
         <th>Branch </th>
         <th>Division </th>
         
           
        </tr>
        </thead>
        </div>
       
        
        <?php
        while($row=mysqli_fetch_array($result)){
        ?>
        <tbody>
        <tr>
        <td><?php echo $row['rollno'];?>  </td>
        <td><?php echo $row['name'];?>    </td>
        <td><?php echo $row['year'];?>  </td>
        <td><?php echo $row['branch'];?>  </td>
        <td><?php echo $row['division'];?>  </td>
        >
        
        
        
        </tr>
        
        </tbody>
        <?php } ?>
         </table>
         <?php }
         else {
         echo "Record NOt Found";
         }
      } 
      
}}
catch(Exception $e)
{$final_result=$e->get_message();
}


?>



   
</body>
<script>

form.addEventListener('submit' ,(event)=>

{
  var form4 = document.getElementById("year1").value;
  var form5 =document.getElementById("year2").value;
  var form6 =document.getElementById("year3").value;


  if((form4 == "CS")||(form4 == "IT")||(form4 == " ETC ")
  ||(form4 == " MECH")|| (form4 == "INSTRU")){
  document.getElementById('pass1').innerHTML="    ";
  
}

  else{
   
    document.getElementById('pass1').innerHTML="<h6>**select valid option</h6>";
 
 event.preventDefault();
 
  
  }



  if((form5 == "1")||(form5 == "2")||(form5 == "3")||(form5 == "4")){
  document.getElementById('pass2').innerHTML="    ";
  
}

  else{
   
    document.getElementById('pass2').innerHTML="<h6>**select valid option</h6>";
 
 event.preventDefault();
 
  
  }


  if((form6 == "A")||(form6 == "B")||(form6 == "C")||(form6 == "D")){
  document.getElementById('pass3').innerHTML="    ";
  
}

  else{
   
    document.getElementById('pass3').innerHTML="<h6>**select valid option</h6>";
 
 event.preventDefault();
 
  
  }

})
</script>


</html>

