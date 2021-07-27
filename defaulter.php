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
    text-shadow: 0 3px 10px rgb(0 0 0 / 0.5);"><h3> View Defaulter List</h3></span>
  </nav>
  <div class="wrapper">
    <div class="sidebar">
       
        <ul>
            <li><a href="./home.html">Home</a></li>
          <li><a href="./timetable.php">Add timetable</a></li>
          <li><a href="./studentlist.php">Add StudentList</a></li>
          <li><a href="./Viewteachingplan.php">View Teaching plan</a></li>
          <li><a href="./Viewattendance.php">View Attendance List</a></li>
          <li><a href="./defaulter.php">View Defaulter List</a></li>
        </ul> 
    </div>
    </div>
  
  <div id="back" style=" padding: 10px; margin-top: 5%; margin-left: 35%;  border: 1px solid #fdfeff; width: 35%; height:auto;" >
    <div  style="margin-left: 25%; padding-right: 15px;">
        <div style="margin-left: 26px;  font-weight: bolder; font-size:larger;  font-family: 'PT Sans', sans-serif;"></div>
            <form action=" "  id="form" method="post" >
                <div class="row mb-3">
                    <div class="col-sm-10" style="margin-top: 4%;" id="true">
                        <h6>Branch</h6>
                        <select id="year" name="branch">
                          <option value="year">Select Branch</option>
                          <option value="CS">Computer Science</option>
                          <option value="IT">Information Technology</option>
                          <option value="ETC">Electronics and Telecommunication </option>
                          <option value="MECH">Mechanical</option>
                          <option value="INSTRU">Instrumental</option>
                        </select>
                      </div>

                  <div class="col-sm-10" id="true">
                   <h6>Year</h6>
          <select id="year" name="year">
            <option value="year">Select Year</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
                    
                  </div>
                  
                
                  <div class="col-sm-10" style="margin-top: 4%;" id="true">
                    <h6>Division</h6>
                    <select id="year" name="division">
                      <option value="year">Select Division</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                    </select>
                  </div>
                  <div class="row mb-3">
                  
                  <div class="col-sm-8" id="true" style="margin-top: 6%;">
                    <input id= "user" class="form-control"  placeholder="enter subject  type="text" name="subject" required>
                    <span id="pass1" style="color: red; padding: 0%; "></span>
                  </div>
                  
                  </div>
                </div>
                
               
                     
    
                
                <button type="submit" class="btn"  id ="color" style="margin-left:1%;  width: 80%; padding: 10px; margin-top: 4% ; color: white;" name="submit">View DefaulterList</button>
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
  
      $sql = "SELECT * from data where year='$year'and branch='$branch' and division='$division' and subject='$subject'" ; 
      $result = mysqli_query( $conn,$sql ) ;
      if(mysqli_num_rows($result)>0)
      {
        ?>
        <div  style="margin-top:3%; margin-bottom:5%; margin-left:30%;background-color:#f5f5f5;">
       
        <table>
        <thead>
        <tr>
        <th> Rollno </th>
         <th>Name </th>
          <th>Subject </th>
           <th> Lecture Conducted </th>
            <th> Lecture Attended </th>
            <th> Attendance percentage </th>
        </tr>
        </thead>
        </div>
        <?php
        while($row=mysqli_fetch_array($result)){
        $lectureattend=$row['lecture_attend'];
        $lectureconduct=$row['lecture_conduct'];
        $check=(75*$lectureconduct)/100;
        $ss=(($lectureattend /$lectureconduct)*100);
        if((($lectureattend /$lectureconduct)*100)<$check)
        {
        
        ?>
        <tbody>
        <tr>
        <td><?php echo $row['rollno'];?>  </td>
        <td><?php echo $row['name'];?>    </td>
        <td><?php echo $row['subject'];?>  </td> 
        <td><?php echo $row['lecture_conduct'];?> </td>
        <td><?php echo $row['lecture_attend'];?> </td>
        <td><?php echo $ss." %";?> </td>
        
        
        </tr>
        
        </tbody>
        <?php }} ?>
         </table>
         <?php }
         else{
         echo "<p align='center'><font color=red font face='arial' size= '5pt'>Record Not Found</font></p>";
         }
      } 
      
}}
catch(Exception $e)
{$final_result=$e->get_message();
}


?>

   
</body></html>























































