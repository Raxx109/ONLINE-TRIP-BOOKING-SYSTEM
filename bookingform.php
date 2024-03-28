<?php 
session_start();
$dbc = require_once 'config.php';

    if(isset($_POST['applyform'])) {
        try {
        $email = $_POST['email'];
        $fname = $_POST['fullname']; 
        $contact = $_POST['contactno']; 
        $residence = $_POST['country']; 
        $country = $_POST['origin']; 
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
        $resortopt = $_POST['oresort']; 
        $tmeans = $_POST['travelmeans']; 
        $parking = $_POST['parking']; 
        $parkingopt = $_POST['oparking']; 
        $boating = $_POST['boat']; 
        $purpose = $_POST['purpose']; 
        $purposeopt = $_POST['opurpose'];
        $pending = 'Pending';
      
        $sqlcmd = "INSERT INTO `tourist_info` (`TouristID`, `Email`, `Fullname`, `Contactno`, `Residence`, `Region`, `Foreignerc`, `Filipinoc`, `Maubaninc`, `TotalV`, `TotalM`, `TotalF`, `TotalS`, `Sevenyold`, `Fifnineyold`, `Sixtyold`, `Arrivaldate`, `Itinerary`, `Resort`, `Travelmeans`, `Parking`, `Boating`, `Purpose`, `Status`) VALUES (NULL, :email, :fulln, :contact, :residence, :region, :fc, :fpc, :mc, :tv, :tm, :tf, :ts, :sevyold, :fifyold, :sixtyold, :adate, :itr, :resort, :tmeans, :parking, :boating, :purpose, :sts)";
        $stmt = $dbc -> prepare($sqlcmd);
        $stmt -> bindValue(':email', $email); 
        $stmt -> bindValue(':fulln', $fname);
        $stmt -> bindValue(':contact', $contact);
        if ($residence == "International") {
            $stmt -> bindValue(':residence', $country);
        } else {
            $stmt -> bindValue(':residence', $residence);
        }
        $stmt -> bindValue(':region', $region); 
        $stmt -> bindValue(':fc', $fc);
        $stmt -> bindValue(':fpc', $fpc);
        $stmt -> bindValue(':mc', $mc);
        $stmt -> bindValue(':tv', $tv); 
        $stmt -> bindValue(':tm', $tm);
        $stmt -> bindValue(':tf', $tf);
        $stmt -> bindValue(':ts', $ts);
        $stmt -> bindValue(':sevyold', $sevyold);
        $stmt -> bindValue(':fifyold', $fifyold);
        $stmt -> bindValue(':sixtyold', $sixtyold); 
        $stmt -> bindValue(':adate', $adate);
        $stmt -> bindValue(':itr', $itr);
        if ($resort == "O") {
            $stmt -> bindValue(':resort', $resortopt); 
        } else {
            $stmt -> bindValue(':resort', $resort);
        }
            $stmt -> bindValue(':tmeans', $tmeans);
        if ($parking == "O") {
            $stmt -> bindValue(':parking', $parkingopt);
        } else {$stmt -> bindValue(':parking', $parking);
        }
        $stmt -> bindValue(':boating', $boating);
        if ($purpose == "O") {
            $stmt -> bindValue(':purpose', $purposeopt);
        } else {$stmt -> bindValue(':purpose', $purpose);
        }
        $stmt -> bindValue(':sts', $pending);
        $stmt -> execute();
        $dbc = null;
        $sqlcmd = null;
        $stmt = null;
        header('location:submit.php');
        } catch (Exception $e ){
            echo '<script>window.alert("APPLICATION FAILED!")</script>';
        }
        }
        
?>

<!DOCTYPE HTML>
<html lang="en">

    <head>
        
        <title>CAGBALETE ISLAND BOOKING FORM</title>
    <meta charset = "UTF-8">
    <meta name = "description" content = "Booking Form">
    <meta name = "keywords" content = "Booking, Online, Cagbalete">
    <meta name = "author" content = "SLSU CIT 3RD YEAR CAPSTONE">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/webdesign.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    </head>
            <body>
                
                <div class ="modal fade" id = "consentm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Consent Modal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="consenttitle">Data Collection Consent Form</h1>
                            </div>
                            <div class="modal-body">     
                    
                    <h5>I have read the Data Privacy Statement and express my consent for the Municipal Tourism Office of Mauban to collect, record, organize, update or modify, retrieve, consult, use, consolidate, block, erase or destruct my personal data as part of my information. 
                        <br><br>
                        I hereby affirm my right to be informed, object to processing, access and rectify, suspend or withdraw my personal data, and be indemnified in case of damages pursuant to the provisions of the Republic Act No. 10173 of the Philippines, Data Privacy Act of 2012 
                        and its corresponding Implementing Rules and Regulations.
                    </h5>
                            </div> 
                            <div class="modal-footer">
                                <button type="button" class="btn-success" data-bs-dismiss="modal" aria-label="YES">YES</button>
                                <button type="button" class="btn-danger" onclick="disagree()" style="margin-right: 200px;">NO</button>
                            </div>
                        </div>
                       
                    </div>
                </div>

                <div class="container">
                    <div class="row">

                        <h4>CAGBALETE ISLAND TOURIST REGISTRATION FORM
                        </h4>

                        <div class="col-12">

                        <p>Mabuhay! This online registration is the first step of seamless registration. 
                            Before accomplishing this form, be sure that you have already booked an accommodation in Cagbalete Island, parking area (if any), and boat transfer.
                            Kindly complete this form and present the confirmation to the front desk at the Mauban Tourist Port before paying the environmental and tourism administrative fee (ETAF)
                            and proceeding to the next step.
                        </p>

                        </div>
                        
                    </div>
                            <form name="AppForm" id="Rform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" novalidate>
                    <div class="row">
                        <h5>Tourist Information</h5>
                            <div class ="form-floating col">
                                <input type = "email" name = "email" id="temail" class="form-control" placeholder = "example@email.com" required />
                                <label for="temail">&nbsp;&nbsp; Email Address</label>
                                <span id="temailfail"></span>
                            </div>
                            <div class ="form-floating col">
                               <input type = "text" name = "fullname" id="tfname" class="form-control" placeholder = "John Doe" pattern="([A-zÀ-ž.\s]){2,} ([A-zÀ-ž.\s]){2,}" required />
                                <label for="tfname">&nbsp;&nbsp; Full Name</label>
                                <span id="tfnamefail"></span>
                            </div>
                            <div class ="form-floating col">
                                <input type = "tel" name = "contactno" id="tcontact" class="form-control" placeholder = "09912563847" pattern="[09]{2}[0-9]{9}" required />
                                <label for="tcontact">&nbsp;&nbsp; Contact No.</label>
                                <span id="tcontactfail"></span>
                            </div>
                    </div>
                    <br>
                    <div class="row">
                        <h5>Region</h5>
                        <div class ="form-floating col">
                            <select name = "country" id="tcountry" class="form-control" onchange = "countrycheck()" required> 
                                <option value="" disabled selected>Select Country of Residence</option>
                                <option value="Philippines">Philippines</option>
                                <option value="International">International</option>
                            </select>
                            <label for="tcountry">&nbsp;&nbsp; Country of Residence</label>
                        </div>
                        <div class ="form-floating col" id="optorigin" style="display: none;">
                            <input type = "text" name = "origin" id="torigin" class="form-control" placeholder = "USA" pattern="([A-z0-9À-ž\s]){3,}" required />
                            <label for="torigin">&nbsp;&nbsp; Enter Country</label>
                            <span id="toriginfail"></span>
                        </div>
                        <div class ="form-floating col" id = "optregion">
                            <select name = "region" id="tregion" class="form-control" required> 
                                <option value="" disabled selected>Select a Region</option>
                                <option value="I">Region I - Ilocos Region</option>
                                <option value="II">Region II - Cagayan Valley</option>
                                <option value="III">Region III - Central Luzon</option>
                                <option value="CALABARZON">CALABARZON Region</option>
                                <option value="MIMAROPA">MIMAROPA Region</option>
                                <option value="V">Region V -  Bicol Region</option>
                                <option value="VI">Region VI - Western Visayas</option>
                                <option value="VII">Region VII - Central Visayas</option>
                                <option value="VIII">Region VIII - Eastern Visayas</option>
                                <option value="IX">Region IX -  Zamboanga Peninsula</option>
                                <option value="X">Region X - Northern Mindanao</option>
                                <option value="XI">Region XI -  Davao Region</option>
                                <option value="XII">Region XII -  SOCCSKSARGEN</option>
                                <option value="XIII">Region XIII - Caraga</option>
                                <option value="NCR">NCR - National Capital Region</option>
                                <option value="CAR">CAR - Cordillera Administrative Region</option>
                                <option value="BARMM">BARMM-Bangsamoro Autonomous Region in Muslim Mindanao</option>
                                <option value="N/A" hidden>N/A</option>
                            </select>
                            <label for="tregion">&nbsp;&nbsp; Region</label>
                        </div>
                    </div>
                    <br>
                    <div class="row gy-2">
                        <h5>Type of Visitors</h5>
                        <div class ="form-floating col-sm-2 col-4 ">
                            <input type = "number" name = "foreignc" min="0" id="tforeignc" class="form-control" placeholder = "123456789" required />
                            <label for="tforeignc">&nbsp;&nbsp; # of Foreigners</label>
                            <span id="tforeigncfail"></span>
                        </div>
                        <div class ="form-floating col-sm-2 col-4 ">
                            <input type = "number" name = "filipinoc" min="0" id="tfilipinoc" class="form-control" placeholder = "123456789" required />
                            <label for="tfilipinoc">&nbsp;&nbsp; # of Filipinos</label>
                            <span id="tfilipinocfail"></span>
                        </div>
                        <div class ="form-floating col-sm-2 col-4 ">
                            <input type = "number" name = "maubaninc" min="0" id="tmaubaninc" class="form-control" placeholder = "123456789" required />
                            <label for="tmaubaninc">&nbsp;&nbsp; # of Maubanins</label>
                            <span id="tmaubanincfail"></span>
                        </div>
                        <div class ="form-floating col-sm-2 col-4 ">
                            <input type = "number" name = "visitorc" min="0" id="tvisitorc" class="form-control" placeholder = "123456789" required />
                            <label for="tvisitorc">&nbsp;&nbsp; Total # of Visitors</label>
                            <span id="tvisitorcfail"></span>
                        </div>
                        <div class ="form-floating col-sm-2 col-4 ">
                            <input type = "number" name = "malec" min="0" id="tmalec" class="form-control" placeholder = "123456789" required />
                            <label for="tmalec">&nbsp;&nbsp; Total # of Male</label>
                            <span id="tmalecfail"></span>
                        </div>
                        <div class ="form-floating col-sm-2 col-4 ">
                            <input type = "number" name = "femalec" min="0" id="tfemalec" class="form-control" placeholder = "123456789" required />
                            <label for="tfemalec">&nbsp;&nbsp; Total # of Female</label>
                            <span id="tfemalecfail"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row gy-2">
                        <h5>Age Segregation</h5>
                        <div class ="form-floating col-sm-3 col-6">
                            <input type = "number" min="0" name = "specialc" id="tspecialc" class="form-control" placeholder = "123456789" required />
                            <label for="tspecialc">&nbsp;&nbsp; Total # of Senior, PWD, Below 7y/o </label>
                            <span id="tspecialcfail"></span>
                        </div>
                        <div class ="form-floating col-sm-3 col-6">
                            <input type = "number" name = "sevenyoc" min="0" id="tsevenyoc" class="form-control" placeholder = "123456789" required />
                            <label for="tsevenyoc">&nbsp;&nbsp; Total # of 0 - 7 y/o</label>
                            <span id="tsevenyocfail"></span>
                        </div>
                        <div class ="form-floating col-sm-3 col-6">
                            <input type = "number" name = "fifnineyoc" min="0" id="tfifnineyoc" class="form-control" placeholder = "123456789" required />
                            <label for="tfifnineyoc">&nbsp;&nbsp; Total # of 13 - 59 y/o</label>
                            <span id="tfifnineyocfail"></span>
                        </div>
                        <div class ="form-floating col-sm-3 col-6">
                            <input type = "number" name = "sixtyyoc" min="0" id="tsixtyoc" class="form-control" placeholder = "123456789" required />
                            <label for="tsixtyyoc">&nbsp;&nbsp; Total # of 60 y/o and above</label>
                            <span id="tsixtyyocfail"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <h5>Travel Preference</h5>
                        <div class ="form-floating col">
                            <input type = "date" name = "traveldate" id="tdate" class="form-control" min = "<?php echo date('Y-m-d') ?>" required/>
                            <label for="tdate">&nbsp;&nbsp; Arrival Date</label>
                            <span id = "tdatefail"></span>
                        </div>
                        <div class ="form-floating col">
                            <select name = "itinerary" id="titinerary" class="form-control" required> 
                                <option value="" disabled selected>Select an Itinerary</option>
                                <option value="DT">Day Tour</option>
                                <option value="ON">Overnight</option>
                                <option value="2N">2 Nights</option>
                                <option value="3N">3 Nights</option>
                                <option value="4N">4 Nights</option>
                                <option value="5N">5 Nights and above</option>
                            </select>
                            <label for="titinerary">&nbsp;&nbsp; Travel Itinerary</label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <h5>Resort Accommodation</h5>
                        <p>Registered Resorts as of February 12, 2024</p>
                        <div class ="form-floating col">
                            <select name = "resort" id="tresort" class="form-control" onchange = "resortcheck()" required>
                                <option value="" disabled selected>Select a Resort Accommodation</option>
                                <option value ="AHR">Aquazul Hotel and Resort (09237428368/092347826015)</option>
                                <option value ="DCCR">Dona Choleng Camping Resort (09108823346/ 09266549958)</option>
                                <option value="RDSBR">Rio del Sol Beach Resort (09776932453)</option>
                                <option value="JR">Jovencio's Resort (09564135204)</option>
                                <option value="MVTSNBR">MVT Sto. Niño Beach Resort (09176787080)</option>
                                <option value="NDCR">Nilandingan Cove Resort (09151443094)</option>
                                <option value="VC">Villa Cleofas (Cagbalete Island Camping Resort) 09178143475</option>
                                <option value="VECB">Villa Escaparde Camping and Beach Resort (09073700888)</option>
                                <option value="VNBR">Villa Noe Beach Resort (09065197126/09126914340)</option>
                                <option value="VPBR">Villa Pilarosa Beach Resort (09496608865/09959376995)</option>
                                <option value="TPBR">Tita Pinay Beach Resort (09108070864)</option>"
                                <option value="APBR">Aguho Playa Beach Resort (09670061937)</option>"
                                <option value="TP">Tent Place (09988845443 / 09100956370)</option>"
                                <option value="OBR">Orlan Beach Resort (09707100945)</option>"
                                <option value="O">Other</option>
                            </select>
                            <label for="tresort">&nbsp;&nbsp; Resort Accommodation</label>
                        </div>
                        <div class ="form-floating col" id = "optresort" style="display: none;">
                            <input type ="text" name ="oresort" id="toresort" class="form-control" placeholder="Magic Resort" pattern="([A-z0-9À-ž\s]){4,}" required />
                            <label for="toresort">&nbsp;&nbsp; Enter Resort</label>
                            <span id="toresortfail"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <h5>Means of Travel</h5>
                        <div class ="form-floating col">
                            <select name = "travelmeans" id="tmeans" class="form-control" required>
                                <option value="" disabled selected>Select Means of Travel</option>
                                <option value ="PV">Private Vehicle</option>
                                <option value ="PUV">Public Utility Vehicle</option>
                            </select>
                            <label for="tmeans">&nbsp;&nbsp; Means of Travel</label>
                        </div>
                        <div class ="form-floating col">
                            <select name = "parking" id="tparking" class="form-control" onchange = "parkingcheck()" required>
                                <option value="" disabled selected>Select a Parking Option</option>
                                <option value ="LRPS">La Riche Parking Space</option>
                                <option value="DPR">Don's Parking Rental ( 09171581808)</option>
                                <option value="MPCIPS">Metro Park Cagbalete Island Parking Space (09460335938/09109141363)</option>
                                <option value="O">Other</option>
                            </select>
                            <label for="tparking">&nbsp;&nbsp; Parking Space</label>
                        </div>
                        <div class ="form-floating col" id = "optparking" style="display: none;">
                            <input type ="text" name ="oparking" id="toparking" class="form-control" placeholder="Magic parking" pattern="([A-z0-9À-ž\s]){4,}" required />
                            <label for="toparking">&nbsp;&nbsp; Parking Option</label>
                            <span id="toparkingfail"></span>
                        </div>
                        <div class ="form-floating col">
                            <select name = "boat" id="tboat" class="form-control" required>
                                <option value="" disabled selected>Select a Boating Option</option>
                                <option value ="PBSPO">Public Boat (P100/ride/head) Sabang Port Only</option>
                                <option value ="PVTB">Private Boat (Rates depend on the capacity)</option>
                                <option value="BPBR">Boat Provided by Resort (As confirmed by both guests and resort)</option>
                            </select>
                            <label for="tboat">&nbsp;&nbsp; Boat Classification</label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <h5>Purpose of Visit to Mauban</h5>
                        <div class ="form-floating col-6">
                            <select name = "purpose" id="tpurpose" class="form-control" onchange = "purposecheck()" required>
                                <option value="" disabled selected>Select a Purpose</option>
                                <option value ="LE">Leisure</option>
                                <option value ="BS">Business</option>
                                <option value ="O">Other</option>
                            </select>
                            <label for="tpurpose">&nbsp;&nbsp; Purpose of Visit</label>
                        </div>
                        <div class ="form-floating col" id = "optpurpose" style="display: none;">
                            <input type ="text" name ="opurpose" id="topurpose" class="form-control" placeholder="Magic purpose" pattern="([A-z0-9À-ž\s]){4,}" required />
                            <label for="topurpose">&nbsp;&nbsp; Enter Purpose</label>
                            <span id="topurposefail"></span>
                        </div>
                    </div>
                            <br>
                            <input type ="submit" name="applyform" class="btn-success" />
                            </form>
                </div>
                
                <script src="./js/bootstrap.bundle.min.js"></script>      
                <script src="./js/jquery-3.7.1.min.js"></script> 
            </body>
           
            <script>

                //show consent modal
             $(document).ready(function() {
                $('#consentm').modal('show');
            });

                //basic form validation
            const form = document.querySelector('form');
    
            form.addEventListener('submit', e => {
            if (!form.checkValidity()) {
            e.preventDefault()
            }


            form.classList.add('was-validated');
            })

                //Element Id Variables
            var regionopt = document.getElementById("optregion");
            var resortopt = document.getElementById("optresort");
            var parkingopt = document.getElementById("optparking");
            var purposeopt = document.getElementById("optpurpose");
            var originopt = document.getElementById("optorigin");
            var regionint = document.getElementById("tregion");
            var originint = document.getElementById("torigin");
            var resortint = document.getElementById("toresort");
            var parkingint = document.getElementById("toparking");
            var purposeint = document.getElementById("topurpose");

            /* visitor counts
            var vstc = document.getElementsById('tvisitorc');
            var fgrc = document.getElementsById('tforeignerc');
            var fpoc = document.getElementsById('tfilipinoc');
            var mbnc = document.getElementsById('tmaubaninc');
            var malec = document.getElementsById('tmalec');
            var femalec = document.getElementsById('tfemalec');
            var specialc = document.getElementsById('tspecialc');
            var sevenyoc = document.getElementsById('tsevenyoc');
            var fiftyc = document.getElementsById('tfifnineyoc');
            var sixtyc = document.getElementsById('tsixtyoc');
            */
            
                //functions for optional input fields and redirects
            function disagree() {
                window.location.href="index.html";
            }

            /* visitor count function
            function count() {
                vstc.value = (fgrc.value + fpoc.value)
            }
        */

            function countrycheck() {
                var countryselect = document.getElementById("tcountry").value;
                if (countryselect == "International") {
                originopt.style.display = "block"; 
                regionopt.style.display = "none";
                $('#tregion').prop('selectedIndex', 18);
                $('#tregion').attr('value', 'N/A');
                originint.value= "";    
                } 
    
                else {
                originopt.style.display = "none";
                regionopt.style.display = "block";
                $('#tregion').prop('selectedIndex', 0);
                originint.value = "NONE";
                }
            }
         
            function resortcheck() {
                var resortselect = document.getElementById("tresort").value;
                if (resortselect == "O") {
                resortopt.style.display = "block"; 
                resortint.value= "";    
                } 
    
                else {
                resortopt.style.display = "none";
                resortint.value = "NONE";
                }
            }
    
            function parkingcheck() {
                var parkselect = document.getElementById("tparking").value;
    
                if (parkselect == "O") {
                parkingopt.style.display = "block"; 
                parkingint.value = "";    
                } 
    
                else {
                parkingopt.style.display = "none";
                parkingint.value = "NONE";
                }
            }
    
            function purposecheck() {
                var purposeselect = document.getElementById("tpurpose").value;
                if (purposeselect == "O") {
                purposeopt.style.display = "block"; 
                purposeint.value = "";    
                } 
    
                else {
                purposeopt.style.display = "none";
                purposeint.value = "NONE";
                }
            }

            </script>
         
</html>