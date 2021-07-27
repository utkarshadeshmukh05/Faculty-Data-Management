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
    text-shadow: 0 3px 10px rgb(0 0 0 / 0.5);"><h3> View Attendance List</h3></span>
  </nav>
  <div class="wrapper">
    <div class="sidebar">
       
        <ul>
          <li><a href="./home.html">Home</a></li>
          <li><a href="./timetable.php">Add timetable</a></li>
          <li><a href="./studentlist.php">Add StudentList</a></li>
          <li><a href="./Viewteachingplan.php">View Teaching plan</a></li>
          <li><a href="./Viewattendance.php">View Attendance List</a></li>
           <li><a href="./defaulter.php">Generate Defaulter</a></li>
        </ul> 
    </div>
    </div>
  
  <div id="back" style=" padding: 10px; margin-top: 5%; margin-left: 35%;  border: 1px solid #fdfeff; width: 35%; height:80%;" >
    <div  style="margin-left: 25%; padding-right: 15px;">
       
            <form action=" "  id="form" method="post" >
                <div class="row mb-3">

                  <div class="col-sm-10" style="margin-top: 4%;" id="true">
                    <h6 style="font-weight: bold;"> Branch</h6>
                    <span id="pass1" style="color: red; padding: 0%;"> </span>
                    
                    <select id="year1" name="branch">
                      <option value="Branch">Select Branch</option>
              <option value="CS">Computer Science</option>
              <option value="IT">Information Technology</option>
              <option value="MECH">Mechanical</option>
              <option value="INSTRU">Instrumentation</option>
              <option value="ETC">Electronics and Telecommunication</option>
                    </select>
                  </div>
                  <div class="col-sm-10" id="true" style="margin-top: 3%;">
                   <h6 style="font-weight: bold;">Year</h6>
                   <span id="pass2" style="color: red; padding: 0%; "> </span>
          <select id="year2" name="year">
            <option value="Select Year">Select Year</option>
            <option value="year">Select Year</option>
              <option value="1">I</option>
              <option value="2">II</option>
              <option value="3">III</option>
              <option value="4">IV</option>
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
               
                <div class="row mb-3">
                  
                  <div class="col-sm-8" id="true">
                    <input id= "year4" class="form-control"  placeholder="enter subject" name="subject">
                    <span id="pass4" style="color: red; padding: 0%; "> </span>
                    
                  </div>
               </div>
               </div>
                
<button type="submit" class="btn"  id ="color" style="margin-left:3%;  width: 60%; padding: 10px; margin-top: 4% ; color: white;" name="submit">View Attendance List</button>
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
      $subject = $_POST["subject"];
  
      $sql = "SELECT * from data where year='$year' and branch='$branch' and division='$division' and subject='$subject'" ; 
      $result = mysqli_query( $conn,$sql ) ;
      if(mysqli_num_rows($result)>0)
      {
        ?>
        
        <div style="margin-top:3%; margin-bottom:5%; margin-left:30%; background-color:#f5f5f5;">
        <table>
        <thead>
        <tr>
        <th> Rollno </th>
         <th>Name </th>
         <th>Year</th>
         <th>Branch </th>
         <th>DIvision </th>
          <th>Subject </th>
           <th> Lecture Conducted </th>
            <th> Lecture Attended </th>
           
        </tr>
        </thead>
        </div>
       
        
        <?php
        while($row=mysqli_fetch_array($result)){
        ?>
        <tbody>
        <tr>
        <td><?php echo "<p align='center'>".$row['rollno']."</p>";?>  </td>
        <td><?php echo $row['name'];?>    </td>
        <td><?php echo $row['year'];?>  </td>
        <td><?php echo $row['branch'];?>  </td>
        <td><?php echo $row['division'];?>  </td>
        <td><?php echo $row['subject'];?>  </td> 
        <td><?php echo $row['lecture_conduct'];?> </td>
        <td><?php echo $row['lecture_attend'];?> </td>
        
        
        
        </tr>
        
        </tbody>
        <?php } ?>
         </table>
         <?php }
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
  var form7=document.getElementById("year4").value;




  if(form7 == '')
    {
    document.getElementById("pass4").innerHTML="<h6>**not be empty</h6>";
    document.getElementById("year4").style.borderColor="red";
    event.preventDefault();
    console.log("prevent");
  
  }
  
    
    else if(!isNaN(form7)) {
    document.getElementById('pass4').innerHTML="<h6>**not be number</h6>";
    document.getElementById('year4').style.borderColor="red";
    event.preventDefault();
    console.log("prevent");
  }
  
    else{
  
  document.getElementById('year4').style.borderColor="green";
  document.getElementById('pass4').innerHTML="   ";
  
  
  }

  if((form4 == "CS")||(form4 == "IT")||(form4 == " ETC ")
  ||(form4 == "MECH")|| (form4 == "INSTRU")){
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