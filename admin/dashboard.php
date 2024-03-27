
<?php 
session_start();
$admin = 'testadmin';
?>

<!DOCTYPE html>

<html lang="en">
<head>
        <title>MACTO ADMIN</title>
    <meta charset = "UTF-8">
    <meta name = "description" content = "ADMIN DASHBOARD">
    <meta name = "keywords" content = "Booking, Online, Cagbalete">
    <meta name = "author" content = "SLSU CIT 3RD YEAR CAPSTONE">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">

<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css" />
    <link rel="stylesheet" href="../css/admindesign.css">
    
</head>
<body>

<div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <img src="../img/logo/macto.png" style="width: 3rem; margin-left: -1.25rem;"/>
                </button>
                <div class="sidebar-logo">
                    <a href="#">MACTO</a>
                </div>
              
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                <img class="rounded-circle" src="../img/admin/user/<?php if(!empty ($admin)){echo $admin;} ?>.jpg" alt="" style = "height:40px; width:40px; margin-left: -0.33rem;"/>
                <span>&nbsp;<?php if(!empty ($admin)){echo $admin;} ?></span>
                        </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Task</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>Auth</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Login</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Register</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="lni lni-layout"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                Two Links
                            </a>
                            <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 1</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 2</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Setting</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <div class="text-center">
                <div class="row">
                <nav class="navbar bg-light" style="height:50px;">
                    <div class="form-floating col-2">
                    <input type="text" class="form-control" id="sbox" name="searchbox" placeholder="query"/> 
                    <label for="sbox">SEARCH</label>
                    </div>
                    <div class="col-2">
                        Messages
                    </div>
                    <div class="col-2">
                        Notifications
                    </div>
                </nav>
                </div>
                <div class="row">
                <div class="wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="mt-5 mb-3 clearfix">
					<a href = "penrolllogin.php" class = "btn btn-danger pull-left" id = "logout">LOG-OUT</a>
					<h2 class="mt-5 mb-3 clearfix" id = "title" align="center" >ADMIN DASHBOARD</h2><a href = "penrollcreate.php" class = "btn btn-success" id = "addbutton"><i>+</i> ADD STUDENT</a>
					</div>
					<?php
					require_once "penrollconfig.php";
					
					$sql = "SELECT * FROM tourist_info";
					if($result = $dbc->query($sql)){
						if(mysqli_num_rows($result) > 0) {
							echo '<table class="table table-bordered table=striped table-responsive" id = "table">';
								echo "<thead class = 'table table-info' id = 'thead'>";
									echo "<tr>";
										echo "<th>STUDENT NUMBER</th>";
										echo "<th>STUDENT NAME</th>";
										echo "<th>COURSE/YEAR</th>";
										echo "<th>SCHOOLYEAR</th>";
										echo "<th>SEMESTER</th>";
										echo "<th>PREENROLLMENT</th>";
										echo "<th>STATUS</th>";
										echo "<th>PAYMENT</th>";
										echo "<th>       ACTION</th>";
									echo "</tr>";
								echo "</thead>";
								echo "<tbody class = 'table table-dark''>";
								while($row = mysqli_fetch_array($result)){
									echo "<tr>";
										echo "<td>" . $row['student_number'] . "</td>";
										echo "<td>" . $row['student_name'] . "</td>";
										echo "<td>" . $row['course_year'] . "</td>";
										echo "<td>" . $row['school_year'] . "</td>";
										echo "<td>" . $row['semester'] . "</td>";
										echo "<td>" . $row['preenrollment'] . "</td>";
										echo "<td>" . $row['status'] . "</td>";
										echo "<td>" . $row['payment'] . "</td>";
										echo "<td>";
											echo '<a href="penrollsetsubject.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Set Subjects" data-toggle="tooltip" style="text-decoration: none;"><span class="viewicon">   📚  </span></a>';
											echo '<a href="penrollupdate.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Update Student Info" data-toggle="tooltip" style="text-decoration: none; color: green;><span class="updateicon">📝  </span></a>';
											echo '<a href="penrolldelete.php?student_number=' . $row['student_number'] . '" class = "mr-3" title = "Delete Student Info" data-toggle="tooltip" style="text-decoration: none; color: red;><span class="deleteicon">☒</span></a>';
										echo "</td>";
									echo "</tr>";
								}
								echo "</tbody>";
							echo "</table>";
							mysqli_free_result($result);
						}
						else {
							echo '<div class ="alert alert-danger"><b>NO STUDENTS HAVE PRE-ENROLLED.</b></div>';
						}
						}
					else {
						echo "Oops! Something wnet wrong. Please try again later.";
					}
					mysqli_close($link);
					?>
                </div>
            </div>
        </div>
    </div>

    <!--
    <div class="container-fluid">

        <div class="d-flex spinner-border text-warning" role="status">
            <span class="sr-only"></span>
        </div>

        <div class="sbar">
            <nav class="navbar bg-light navbar-light">
                <a href="dashboard.php" class="navbar-brand" >
                <img src="../img/logo/macto.png" style="display: flex;  width: 5rem" /> <h3 style="display:flex; margin-top:-3.5rem; margin-left:5rem">MACTO</h3>
                </a>
                <div class="row align-items-center mb-4 ms-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../img/admin/user/testadmin.jpg" alt="" style = "height:40px; width:40px;"/>
                    </div>
                    <div class="ms-5">
                        <h6 style="margin-bottom: 0px;"><?php //if(!empty ($admin)){echo $admin;} ?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                    <div class="navbar-nav">
                        <a href="dashboard.php">Dashboard</a>
                    </div>
            </nav>
        </div>

        <div class="content">

        </div>
    </div>
-->
    <script type="text/javascript"> 
    
    const hamBurger = document.querySelector(".toggle-btn");

    hamBurger.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("expand");
    });

</script>
    <script src=../js/bootstrap.bundle.min.js></script>
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
</body>
</html>