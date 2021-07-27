<?php
error_reporting(0);
$year=$_POST["year"];
$branch=$_POST["branch"];
$division=$_POST["division"];
$classincharge=$_POST["classincharge"];
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'faculty_project');

// Uploads files
if (isset($_POST['add'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];
    

    // destination of the file on the server
    $destination = 'studentlist_uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
    $fileop=fopen($file,"r");
    
    if (!in_array($extension, ['xls', 'xlsx', 'xlsm','xlsb','csv'])) {
        echo "You file extension must be .zip, .xls or .xlsm";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO studentlist(year,branch,division,studentlist_file, classincharge) VALUES ('$year','$branch','$division','$filename','$classincharge')";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
        while(($column=fgetcsv($fileop,1000,","))!==FALSE) 
        {
            $insql = "INSERT INTO classlist(rollno,name,year,branch,division) VALUES ('".$column[0]."','".$column[1]."','".$column[2]."','".$column[3]."','".$column[4]."')";
            $result=mysqli_query($conn, $insql) ;
            
            if(empty($result)){
            echo  "NotImported";
            }}
    }}

?>

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
    text-shadow: 0 3px 10px rgb(0 0 0 / 0.5);"><h3>Add stud list</h3></span>
  </nav>
  <div class="wrapper">
    <div class="sidebar">
       
        <ul>
          <li><a href="./home.html">Home</a></li>
          <li><a href="./timetable.php">Add timetable</a></li>
          <li><a href="./studentlist.php">Add StudentList</a></li>
          <li><a href="./Viewteachingplan.php">View Teaching plan</a></li>
          <li><a href="./Viewattendance.php">View Attendance List</a></li>
          
        </ul> 
    </div>
    </div>
    
      <div id="back" style=" padding: 10px; margin-top: 1%; margin-left: 35%;  border: 1px solid #fdfeff; width: 55%; height:auto;" >
          <div  style="margin-left: 20%; padding-right: 15px;">
        <div style="margin-left: 26px;  font-weight: bolder; font-size:larger;  
        font-family: 'PT Sans', sans-serif;"></div>
        <form action="" id="login" class="input-group" method="post"enctype="multipart/form-data" >
            <div class="row mb-3">
            <div class="col-sm-10" style="margin-top: 4%;" id="true">
            <div class="select">Year</div>
            <select id="year2" name="year">
              <option value="year">Select Year</option>
              <option value="1">I</option>
              <option value="2">II</option>
              <option value="3">III</option>
              <option value="4">IV</option>
            </select></div>
            
            <div class="col-sm-10" style="margin-top: 4%;" id="true">
            <div class="select">Branch</div>
            <select id="Branch" name="branch">
              <option value="Branch">Select Branch</option>
              <option value="CS">Computer Science</option>
              <option value="IT">Information Technology</option>
              <option value="MECH">Mechanical</option>
              <option value="INSTRU">Instrumentation</option>
              <option value="ETC">Electronics and Telecommunication</option>
            </select> </div> 
         
         <div class="col-sm-10" style="margin-top: 4%;" id="true"> 
            <input type="text" class="input-field" placeholder="Division" name="division" required>
           
              <input type="file" name="myfile">
              <input type="hidden" name="MAX_FILE_SIZE" value="67108864"/> <! - 64 MB's worth in bytes ->
        </div>
    <input type="text" class="input-field" placeholder="Class Incharge"  name="classincharge" required>
</div>
<div>
                <table>
                <tr>Add .csv File only in this format</tr>
              <tr>
                <th> Rollno </th>
                <th>Name </th>
                <th>Year</th>
              <th>Branch </th>
                <th>Division </th>
               
                
           
        </tr>
        </table>
                </div>
         <div class="col-sm-10" style="margin-top: 4%;" id="true">
        <button type="submit" class="btn" name = "add" id ="color" style="margin-left:5%;  width: 80%; padding: 10px; margin-top: 3% ; color: white;">Add Student list</button> </div> 
      </form>



    </div>
    <script>
    
form.addEventListener('submit' ,(event)=>

{
  var form4 = document.getElementById("year1").value;
  var form5 =document.getElementById("year2").value;
  var form6 =document.getElementById("year3").value;


  if((form4 == "Computer Science")||(form4 == "Information Technology")||(form4 == " Electronics and Telecommunication ")
  ||(form4 == " Mechanical")|| (form4 == "Instrumental")){
  document.getElementById('pass1').innerHTML="    ";
  
}

  else{
   
    document.getElementById('pass1').innerHTML="<h6>**select valid option</h6>";
 
 event.preventDefault();
 
  
  }



  if((form5 == "1st")||(form5 == "2nd")||(form5 == "3rd")||(form5 == "4th")){
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
    
</body>
</html>