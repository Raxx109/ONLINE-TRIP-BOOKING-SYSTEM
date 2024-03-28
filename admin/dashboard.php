
<?php 
session_start();
$dbc = require_once 'config.php';

$admin = 'testadmin';


if(isset($_GET['TouristID'])) {
    try {
        $tid = $_GET['TouristID'];
        $sqldelcmd = "DELETE FROM `tourist_info` WHERE `TouristID` = :tid";
        $stmtdel = $dbc->prepare($sqldelcmd);
        $stmtdel -> bindValue(':tid', $tid);
        $stmtdel -> execute();
        $sqldelcmd = null;
        $stmtdel = null;
    } catch(Exception $d){
        echo '<script>window.alert("DELETE FAILED!")</script>';
    }
}

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
                <a href="login.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <div class="text-center">
                <div class="row">
                <nav class="navbar bg-light" style="height:50px;">
                    <div class="form-group col-2">
                    <input type="text" class="form-control form-control-sm" id="sbox" name="searchbox" placeholder="Search"/> 
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
					</div>
					<?php
					
					$sqlcmd = "SELECT * FROM tourist_info ORDER BY Arrivaldate ASC";
                    $stmt = $dbc->prepare($sqlcmd);
                    $stmt->execute();
					if($result = $dbc->query($sqlcmd)){
                        $count = $result->rowCount();
						if($count > 0) {
							echo '<div class = "table-responsive w-auto" style="width:100%; height:100%;"><table class="table table-bordered table=striped w-auto" id = "table">';
								echo "<thead class = 'table table w-auto' id = 'thead'>";
									echo "<tr>";
                                        echo "<th>       ACTION</th>";
                                        echo "<th>NO.</th>";
                                        echo "<th>STATUS</th>";
                                        echo "<th>EMAIL</th>";
                                        echo "<th>NAME</th>";
                                        echo "<th>CONTACT</th>";
                                        echo "<th>COR</th>";
                                        //echo "<th>O.COR</th>";
                                        echo "<th>REGION</th>";
                                        //echo "<th>FRGN#</th>";
                                        //echo "<th>FP#</th>";
                                        //echo "<th>M#</th>";
                                        echo "<th>ΣV</th>";
                                        //echo "<th>ΣM</th>";
                                        //echo "<th>ΣF</th>";
                                        //echo "<th>ΣS</th>";
                                        //echo "<th>Σ7+</th>";
                                        //echo "<th>Σ59+</th>";
                                        //echo "<th>Σ60+</th>";
                                        echo "<th>A.DATE</th>";
                                        echo "<th>ITIR</th>";
                                        echo "<th>RESORT</th>";
                                       // echo "<th>O.RESORT</th>";
                                        echo "<th>T.MEANS</th>";
                                        echo "<th>PARKING</th>";
                                        //echo "<th>O.PRKG</th>";
                                        echo "<th>BOAT</th>";
                                        echo "<th>PURPOSE</th>";
                                        //echo "<th>O.PURPOSE</th>";
									echo "</tr>";
								echo "</thead>";
								echo "<tbody class = 'table w-auto'>";
								while($data = $stmt->FETCH(PDO::FETCH_ASSOC)){
									echo "<tr>";
                                   echo "<td>";
                                   // echo '<a href="viewrecord.php?TouristID=' . $data['TouristID'] . '" class = "mr-3" title = "View Record" data-toggle="tooltip" style="text-decoration: none;"><span class="viewicon">📚  </span></a>';
                                   // echo '<a href="updaterecord.php?TouristID=' . $data['TouristID'] . '" class = "mr-3" title = "Update Tourist Info" data-toggle="tooltip" style="text-decoration: none; color: green;><span class="updateicon">📝  </span></a>';
                                   echo '<form action = "dashboard.php" name="Delete" method ="GET"><input type = hidden name = "TouristID" value = "'. $data['TouristID'].'"></input> <button type = "submit" class = "mr-3" title = "Delete Tourist Info" data-toggle="tooltip" style="text-decoration: none; color: red;"><span class="deleteicon">🗑</span></button></form>';
                                echo "</td>";
                                        echo "<td>" . $data['TouristID'] . "</td>";
                                        echo "<td>" . $data['Status'] . "</td>";
                                        echo "<td>" . $data['Email'] . "</td>";
                                        echo "<td>" . $data['Fullname'] . "</td>";
                                        echo "<td>" . $data['Contactno'] . "</td>";
                                        echo "<td>" . $data['Residence'] . "</td>";
                                        //echo "<td>" . $data['Country'] . "</td>";
                                        echo "<td>" . $data['Region'] . "</td>";
                                        //echo "<td>" . $data['Foreignerc'] . "</td>";
                                        //echo "<td>" . $data['Filipinoc'] . "</td>";
                                        //echo "<td>" . $data['Maubaninc'] . "</td>";
                                        echo "<td>" . $data['TotalV'] . "</td>";
                                        //echo "<td>" . $data['TotalM'] . "</td>";
                                        //echo "<td>" . $data['TotalF'] . "</td>";
                                        //echo "<td>" . $data['TotalS'] . "</td>";
                                        //echo "<td>" . $data['Sevenyold'] . "</td>";
                                        //echo "<td>" . $data['Fifnineyold'] . "</td>";
                                        //echo "<td>" . $data['Sixtyold'] . "</td>";
                                        echo "<td>" . $data['Arrivaldate'] = date('m-d', strtotime($data["Arrivaldate"])) . "</td>";
                                        echo "<td>" . $data['Itinerary'] . "</td>";
                                        echo "<td>" . $data['Resort'] . "</td>";
                                        //echo "<td>" . $data['Resortopt'] . "</td>";
                                        echo "<td>" . $data['Travelmeans'] . "</td>";
                                        echo "<td>" . $data['Parking'] . "</td>";
                                        //echo "<td>" . $data['Parkingopt'] . "</td>";
                                        echo "<td>" . $data['Boating'] . "</td>";
                                        echo "<td>" . $data['Purpose'] . "</td>";
                                        //echo "<td>" . $data['Purposeopt'] . "</td>";
									echo "</tr>";
								}
								echo "</tbody>";
							echo "</table> </div>";
						}
						else {
							echo '<div class ="alert alert-danger"><b>NO CLIENTS FOUND</b></div>';
						}
						}
					else {
						echo "Oops! Something went wrong. Please try again later.";
					}
                    $sqlcmd = null;
                    $dbc = null;
					?>
                </div>
            </div>
        </div>
    </div>
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

