
<?php 
session_start();
$dbc = require_once 'config.php';

if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    header("location:./login.php");
} 
else {
try {
    $user = $_SESSION['username'];
    $sqladm = "SELECT * FROM login_info WHERE Username = :user"; 
    $stmtadm = $dbc->prepare($sqladm);
    $stmtadm->bindValue("user", $user);
    $stmtadm->execute();
    $admdata = $stmtadm->FETCH(PDO::FETCH_ASSOC);
    $admin = $admdata['Fname'];
    $admimg = $user;
} catch(Exception $d){
    echo '<script>window.alert("LOGIN FAILED!")</script>';
    $admin = '404 ADMIN';
}
}


 //add buttons for each function
if(isset($_POST['stsbtn'])) {

    if ($_POST['stsbtn'] == 1){
        try {
            $tid = $_POST['TouristID'];
            $sqlrescmd = "UPDATE `tourist_info` SET `status` = 'Pending' WHERE `TouristID` = :tid";
            $stmtres = $dbc->prepare($sqlrescmd);
            $stmtres -> bindValue(':tid', $tid);
            $stmtres -> execute();
            $sqlrescmd = null;
            $stmtres = null;
            } catch(Exception $d){
                echo '<script>window.alert("RESET FAILED!")</script>';
            }
        }

    if ($_POST['stsbtn'] == 0){
    try {
        $tid = $_POST['TouristID'];
        $sqldnycmd = "UPDATE `tourist_info` SET `status` = 'Denied' WHERE `TouristID` = :tid";
        $stmtdny = $dbc->prepare($sqldnycmd);
        $stmtdny -> bindValue(':tid', $tid);
        $stmtdny -> execute();
        $sqldnycmd = null;
        $stmtdny = null;
        } catch(Exception $d){
            echo '<script>window.alert("APPROVAL FAILED!")</script>';
        }
    }

    if ($_POST['stsbtn'] == 2){
    //Approve status
    try {
        $tid = $_POST['TouristID'];
        $sqlapvcmd = "UPDATE `tourist_info` SET `status` = 'Approved' WHERE `TouristID` = :tid";
        $stmtapv = $dbc->prepare($sqlapvcmd);
        $stmtapv -> bindValue(':tid', $tid);
        $stmtapv -> execute();
        $sqlapvcmd = null;
        $stmtapv = null;
        } catch(Exception $d){
            echo '<script>window.alert("APPROVAL FAILED!")</script>';
        }
    }

        }

        if (isset($_POST['delbtn'])){
            //Approve status
           
            //Delete Function
            try {
                $tid = $_POST['TouristID'];
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

        if (isset($_POST['updbtn'])){
            //Update Function
            try {
                $email = $_POST['email'];
                $fname = $_POST['fullname']; 
                $contact = $_POST['contactno']; 
                $residence = $_POST['country']; 
                //$country = $_POST['origin']; 
                $region = $_POST['region']; 
                $fc = $_POST['foreignc']; 
                $fpc = $_POST['filipinoc']; 
                $mc = $_POST['maubaninc']; 
                $tv = $_POST['visitorc']; 
                $tm = $_POST['malec']; 
                $tf = $_POST['femalec']; 
                $ts = $_POST['specialc']; 
                $sevyold = $_POST['sevenyoc']; 
                $fifyold = $_POST['fifnineyoc']; 
                $sixtyold = $_POST['sixtyyoc']; 
                $adate = $_POST['traveldate']; 
                $itr = $_POST['itinerary']; 
                $resort = $_POST['resort']; 
                //$resortopt = $_POST['oresort']; 
                $tmeans = $_POST['travelmeans']; 
                $parking = $_POST['parking']; 
                //$parkingopt = $_POST['oparking']; 
                $boating = $_POST['boat']; 
                $purpose = $_POST['purpose']; 
                //$purposeopt = $_POST['opurpose'];
                $status = $_POST['status'];
                $tid = $_POST['TouristID'];
                
                $sqlupdcmd = "UPDATE `tourist_info` SET `Email` = :email, `Fullname` = :fulln, `Contactno` = :contact, `Residence` = :residence, `Region` = :region, `Foreignerc` = :fc, `Filipinoc` = :fpc, `Maubaninc` = :mc, `TotalV` = :tv, `TotalM` = :tm, `TotalF` = :tf, `TotalS` = :ts, `Sevenyold` = :sevyold, `Fifnineyold` = :fifyold, `Sixtyold` = :sixtyold, `Arrivaldate` = :adate, `Itinerary` = :itr, `Resort` = :resort, `Travelmeans` = :tmeans, `Parking` = :parking, `Boating` = :boating, `Purpose` = :purpose, `Status` = :sts WHERE `TouristID` = :tid";
                $stmtupd = $dbc->prepare($sqlupdcmd);
                $stmtupd -> bindValue(':email', $email); 
            $stmtupd -> bindValue(':fulln', $fname);
            $stmtupd -> bindValue(':contact', $contact);
            //if ($residence == "INT") {
                //$stmtupd -> bindValue(':residence', $country);
            //} else {
                $stmtupd -> bindValue(':residence', $residence);
            //}
            $stmtupd -> bindValue(':region', $region); 
            $stmtupd -> bindValue(':fc', $fc);
            $stmtupd -> bindValue(':fpc', $fpc);
            $stmtupd -> bindValue(':mc', $mc);
            $stmtupd -> bindValue(':tv', $tv); 
            $stmtupd -> bindValue(':tm', $tm);
            $stmtupd -> bindValue(':tf', $tf);
            $stmtupd -> bindValue(':ts', $ts);
            $stmtupd -> bindValue(':sevyold', $sevyold);
            $stmtupd -> bindValue(':fifyold', $fifyold);
            $stmtupd -> bindValue(':sixtyold', $sixtyold); 
            $stmtupd -> bindValue(':adate', $adate);
            $stmtupd -> bindValue(':itr', $itr);
            //if ($resort == "O") {
                //$stmtupd -> bindValue(':resort', $resortopt); 
           // } else {
                $stmtupd -> bindValue(':resort', $resort);
            //}
                $stmtupd -> bindValue(':tmeans', $tmeans);
            //if ($parking == "O") {
                //$stmtupd -> bindValue(':parking', $parkingopt);
            //} else {
                $stmtupd -> bindValue(':parking', $parking);
            //}
            $stmtupd -> bindValue(':boating', $boating);
           // if ($purpose == "O") {
                //$stmtupd -> bindValue(':purpose', $purposeopt);
            //} else {
                $stmtupd -> bindValue(':purpose', $purpose);
           // }
            $stmtupd -> bindValue(':sts', $status);
                $stmtupd -> bindValue(':tid', $tid);
                $stmtupd -> execute();
                $sqlupdcmd = null;
                $stmtupd = null;
                echo '<script>window.alert("UPDATED APPLICATION NO. ' . $tid .' !")</script>';
                } catch(Exception $d){
                    echo '<script>window.alert("UPDATE FAILED!")</script>';
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
<!-- TO:DO FIX TABLE SIZE & SPACING AS OF 3/31/2024 -->
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
                <img class="rounded-circle" src="../img/admin/user/<?php if(!empty ($admimg)){echo $admimg;} ?>.jpg" alt="" style = "height:40px; width:40px; margin-left: -0.33rem;"/>
                <span>&nbsp;<?php if(!empty ($admin)){echo $admin;} ?></span>
                        </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Status</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Staff</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>Accounts</span>
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
                <nav class="navbar">
                <div class="form-group col-1">
                <form action = "<?php echo HTMLSPECIALCHARS($_SERVER['PHP_SELF']); ?>" method = "POST">
                    <select name = 'category' class = 'form-control-sm'>
                        <option value = "Email">Email</option>
                        <option value = "Fullname">Full Name</option>
                        <option value = "Contactno">Contact No.</option>
                        <option value = "Residence">Country</option>
                        <option value = "Region">Region</option>
                        <option value = "Foreignerc">#Foreigner</option>
                        <option value = "Filipinoc">#Filipino</option>
                        <option value = "Maubaninc">#Maubanin</option>
                        <option value = "TotalV">#Visitor</option>
                        <option value = "TotalM">#Male</option>
                        <option value = "TotalF">#Female</option>
                        <option value = "TotalS">#Special</option>
                        <option value = "Sevenyold">0-7 Y/OLD</option>
                        <option value = "Fifnineyold">13 - 59 Y/OLD</option>
                        <option value = "Sixtyold">60+ Y/OLD</option>
                        <option value = "Arrivaldate">Arrival Date</option>
                        <option value = "Itinerary">Itinerary</option>
                        <option value = "Resort">Resort</option>
                        <option value = "Travelmeans">Travel Means</option>
                        <option value = "Parking">Parking</option>
                        <option value = "Boating">Boating</option>
                        <option value = "Purpose">Purpose</option>
                        <option value = "Status">Status</option>
                    </select>
                    </div>
                    <div class="form-group col-2">
                    <input type="search" class="form-control form-control-sm" id="sbox" name="searchbox" placeholder="Search" style= "margin-left: 2.5rem;" /> 
                    </div>
                    <div class="form-group col-2">
                    <button type = "submit" name = "srchbtn" class = "btn btn-success" style= "margin-left: 0.7rem;" >SEARCH</button>
                    </form>
                    </div>
      
                    <div class="col">
                        Ratings
                    </div>
                    <div class="col">
                        Notifications
                    </div>
                </nav>
                </div>
                <div class="row">
                <div class="wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="mb-3 clearfix">
					</div>
					<?php
					try {
                    if (isset($_POST['srchbtn'])){
                        $crit = $_POST['category'];
                        $qry = $_POST['searchbox'];
                    } 
                    else {
                        $crit = 1; 
                        $qry = 1;
                    }

					$sqlcmd = "SELECT * FROM tourist_info WHERE $crit LIKE '%$qry%' ORDER BY Status DESC, ArrivalDate ASC";
                    $stmt = $dbc->prepare($sqlcmd);
                    $stmt->execute();
					if($result = $dbc->query($sqlcmd)){
                        $count = $result->rowCount();
						if($count > 0) {
							echo '<div class = "table-responsive w-auto" style="width:100%; height:82%;"><table class="table table-bordered table=striped w-auto" id = "table">';
								echo "<thead class = 'table table w-auto' id = 'thead'>";
									echo "<tr>";
                                        echo "<th>ACTION</th>";
                                        echo "<th>NO.</th>";
                                        echo "<th>STATUS</th>";
                                        echo "<th>EMAIL</th>";
                                        echo "<th>NAME</th>";
                                        echo "<th>CONTACT</th>";
                                        echo "<th>COR</th>";
                                        //echo "<th>O.COR</th>";
                                        echo "<th>REGION</th>";
                                        echo "<th><button type = 'button' id = 'cbtn' onclick = 'cheadtoggle()'>ΣV</button></th>";
                                        echo "<th class = 'chead'>FC</th>";
                                        echo "<th class = 'chead'>FP</th>";
                                        echo "<th class = 'chead'>MN</th>";
                                        echo "<th class = 'chead'>M</th>";
                                        echo "<th class = 'chead'>F</th>";
                                        echo "<th class = 'chead'>S</th>";
                                        echo "<th class = 'chead'>7+</th>";
                                        echo "<th class = 'chead'>59+</th>";
                                        echo "<th class = 'chead'>60+</th>";
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
                                   echo '<form action = "' . HTMLSPECIALCHARS($_SERVER['PHP_SELF']) . '" name="status" method ="POST">
                                   <input type = hidden name = "TouristID" value = "'. $data['TouristID'].'"></input> 
                                   <table>
                                   <tr>
                                   <td><button type = "submit" name = "stsbtn" value = 2 class = "btn actbtn" title = "APPROVE" data-toggle="tooltip" style="color: green;"><i class="lni lni-checkmark"></i></button></td>
                                   <td><button type = "submit" name = "stsbtn" value = 0 class = "btn actbtn" title = "DENY" data-toggle="tooltip" style="color: red;"><i class="lni lni-cross-circle"></i></button></td>
                                   <td><button type = "submit" name = "stsbtn" value = 1 class = "btn actbtn" title = "PENDING" data-toggle="tooltip" style="color: yellow;"><i class="lni lni-spinner-arrow"></i></button></td>
                                   <td><button type = "button" class = "btn actbtn" title = "DELETE" data-bs-toggle = "modal" data-bs-target="#actm' . $data['TouristID'] . '" style="color: red;" onclick="actmenu()"><i class="lni lni-trash-can"></i></button></td>
                                  </tr>
                                   </table>
                                   <div class ="modal fade" id = "actm' . $data['TouristID'] .'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Action Modal" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="consenttitle">DELETE APPLICATION</h1>
                                                    </div>
                                                <div class="modal-body">     
                                                    <h3>PERMANENTLY DELETE TOURIST NO. '. $data['TouristID'] . ' APPLICATION?</h3>
                                                </div> 
                                                <div class="modal-footer">
                                                    <button type="submit" name="delbtn" class="btn-success" data-bs-dismiss="modal" aria-label="YES">YES</button>
                                                    <button type="button" class="btn-danger" data-bs-dismiss="modal" style="margin-right: 200px;">NO</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                   </form>';
                                   
                                   echo "</td>";
                                        echo "<td><form action = '" . HTMLSPECIALCHARS($_SERVER['PHP_SELF']) . "' name = 'updateinfo' method = 'POST'>" . $data['TouristID'] . "<input type = hidden name = 'TouristID' value = '" . $data['TouristID']. "'></input></td>";
                                        echo "<td><span class = 'dbinfo'>" . $data['Status'] . "</span> <input type = 'text' value = '". $data['Status'] . "' name = 'status' id='tstatus' class='form-control form-control-sm updform' placeholder = 'status' required /></td>";
                                        echo "<td><span class = 'dbinfo'>" . $data['Email'] . "</span><input type = 'email' value = '". $data['Email'] . "' name = 'email' id='temail' class='form-control form-control-sm updform' placeholder = 'example@yahoo.com' required /></td>";
                                        echo "<td><span class = 'dbinfo'>" . $data['Fullname'] . "</span><input type = 'text' value = '". $data['Fullname'] . "' name = 'fullname' id='tfname' class='form-control form-control-sm updform' placeholder = 'name' required /></td>";
                                        echo "<td><span class = 'dbinfo'>" . $data['Contactno'] . "</span><input type = 'text' value = '". $data['Contactno'] . "' name = 'contactno' id='tcontact' class='form-control form-control-sm updform' placeholder = '09123456789' required /></td>";
                                        echo "<td><span class = 'dbinfo'>" . $data['Residence'] . "</span><input type = 'text' value = '". $data['Residence'] . "' name = 'country' id='tcountry' class='form-control form-control-sm updform' placeholder = 'PH' required /></td>";
                                        //echo "<td>" . $data['Country'] . "</td>";
                                        echo "<td><span class = 'dbinfo'>" . $data['Region'] . "</span><input type = 'text' value = '". $data['Region'] . "' name = 'region' id='tregion' class='form-control form-control-sm updform' placeholder = 'VII' required /></td>";
                                        echo "<td><span class = 'dbinfo'>" . $data['TotalV'] . "</span><input type = 'number' value = '" . $data['TotalV'] . "' min = '0' name = 'visitorc' id='tvisitorc' class='form-control form-control-sm updform' placeholder = '7' required /></td>";
                                        echo "<td class = 'chead'><span class = 'dbinfo'>" . $data['Foreignerc'] . "</span><input type = 'number' value = '" . $data['Foreignerc'] . "' min = '0' name = 'foreignc' id='tvisitorc' class='form-control form-control-sm updform' placeholder = '7' required /></td>";
                                        echo "<td class = 'chead'><span class = 'dbinfo'>" . $data['Filipinoc'] . "</span><input type = 'number' value = '" . $data['Filipinoc'] . "' min = '0' name = 'filipinoc' id='tvisitorc' class='form-control form-control-sm updform' placeholder = '7' required /></td>";
                                        echo "<td class = 'chead'><span class = 'dbinfo'>" . $data['Maubaninc'] . "</span><input type = 'number' value = '" . $data['Maubaninc'] . "' min = '0' name = 'maubaninc' id='tvisitorc' class='form-control form-control-sm updform' placeholder = '7' required /></td>";

                                        echo "<td class = 'chead'><span class = 'dbinfo'>" . $data['TotalM'] . "</span><input type = 'number' value = '" . $data['TotalM'] . "' min = '0' name = 'malec' id='tvisitorc' class='form-control form-control-sm updform' placeholder = '7' required /></td>";
                                        echo "<td class = 'chead'><span class = 'dbinfo'>" . $data['TotalF'] . "</span><input type = 'number' value = '" . $data['TotalF'] . "' min = '0' name = 'femalec' id='tvisitorc' class='form-control form-control-sm updform' placeholder = '7' required /></td>";
                                        echo "<td class = 'chead'><span class = 'dbinfo'>" . $data['TotalS'] . "</span><input type = 'number' value = '" . $data['TotalS'] . "' min = '0' name = 'specialc' id='tvisitorc' class='form-control form-control-sm updform' placeholder = '7' required /></td>";
                                        echo "<td class = 'chead'><span class = 'dbinfo'>" . $data['Sevenyold'] . "</span><input type = 'number' value = '" . $data['Sevenyold'] . "' min = '0' name = 'sevenyoc' id='tvisitorc' class='form-control form-control-sm updform' placeholder = '7' required /></td>";
                                        echo "<td class = 'chead'><span class = 'dbinfo'>" . $data['Fifnineyold'] . "</span><input type = 'number' value = '" . $data['Fifnineyold'] . "' min = '0' name = 'fifnineyoc' id='tvisitorc' class='form-control form-control-sm updform' placeholder = '7' required /></td>";
                                        echo "<td class = 'chead'><span class = 'dbinfo'>" . $data['Sixtyold'] . "</span><input type = 'number' value = '" . $data['Sixtyold'] . "' min = '0' name = 'sixtyyoc' id='tvisitorc' class='form-control form-control-sm updform' placeholder = '7' required /></td>";
                                        echo "<td><span class = 'dbinfo'>" . $data['Arrivaldate'] = date('m-d', strtotime($data["Arrivaldate"])) . "</span><input type = 'date' value = '" . $data['Arrivaldate'] . "' name = 'traveldate' id='tdate' class='form-control form-control-sm updform' required/></td>";
                                        echo "<td><span class = 'dbinfo'>" . $data['Itinerary'] . "</span><input type = 'text' value = '". $data['Itinerary'] . "' name = 'itinerary' id='titinerary' class='form-control form-control-sm updform' placeholder = 'ON' required /></td>";
                                        echo "<td><span class = 'dbinfo'>" . $data['Resort'] . "</span><input type = 'text' value = '". $data['Resort'] . "' name = 'resort' id='tresort' class='form-control form-control-sm updform' placeholder = 'Magic Resort' required /></td>";
                                        //echo "<td>" . $data['Resortopt'] . "</td>";
                                        echo "<td><span class = 'dbinfo'>" . $data['Travelmeans'] . "</span><input type = 'text' value = '". $data['Travelmeans'] . "' name = 'travelmeans' id='ttmeans' class='form-control form-control-sm updform' placeholder = 'Travelling' required /></td>";
                                        echo "<td><span class = 'dbinfo'>" . $data['Parking'] . " </span><input type = 'text' value = '". $data['Parking'] . "' name = 'parking' id='tparking' class='form-control form-control-sm updform' placeholder = 'Flying Parking' required /></td>";
                                        //echo "<td>" . $data['Parkingopt'] . "</td>";
                                        echo "<td><span class = 'dbinfo'>" . $data['Boating'] . " </span><input type = 'text' value = '". $data['Boating'] . "' name = 'boat' id='tboat' class='form-control form-control-sm updform' placeholder = 'Boat' required /></td>";
                                        echo "<td><span class = 'dbinfo'>" . $data['Purpose'] . " </span><input type = 'text' value = '". $data['Purpose'] . "' name = 'purpose' id='tpurpose' class='form-control form-control-sm updform' placeholder = 'Purpose' required /> <button type = 'submit' name = 'updbtn' class = 'btn actbtn updform' title = 'UPDATE' data-toggle='tooltip' style='color: green; margin-left:1rem;'><i class='lni lni-cloud-sync'></i></button> </form></td>";
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
                } catch (Exception $d) {
                    echo '<script>window.alert("Fatal Error")</script>';
                    throw $d;
                }
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

    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    
    });

    function cheadtoggle() {
            $(".chead").toggle(); 
    }

    function updtoggle() {
        $(".dbinfo").toggle();
        $(".updform").toggle();
    }


</script>
    <script src="../js/jquery-3.7.1.min.js"></script> 
    <script src=../js/bootstrap.bundle.min.js></script>
    
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
</body>
</html>

