<?php
    include 'includes/headers.php';
    include 'includes/login_check.php';
    include 'includes/read_constraint.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	
<head>
  <title>MCC Air India</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
  <script type="text/javascript" src="main.js"></script>
</head>

<body onload="document.getElementById('menuEntrySearchRecords').className += 'current';">
  <div id="header_container">  
    <div id="header">
	  <div id="banner">
	    <h1><span>MCC</span> Air India</h1>
	  </div><!--close banner-->	
	  <div id="banner_slogan">
        <img src="images/airindia-logo.png" alt="Air India" title="Air India" height="69" width="208">
	  </div><!--close banner_slogan-->
      <div style="clear:both;"></div>	
      
      <?php
      include 'includes/menubar.php';
      ?>
      
      <!-- Login Area -->
      <?php
      include 'includes/login_area.php';
      ?>
      <div style="clear:both;"></div>
    </div><!--close header-->  
  </div><!--close header_container-->  
  <div id="main">
	<div id="site_content">	
	  
	  <div id="content">
        <div class="content_item">
          <h2>Edit Entry</h2>
            <p>Enter the data below regarding the flight entry you what to edit</p>
            <form action="utility.php" method="post">
            	<div style="display:none;"><input class="contact" type="text" name="sno" value="<?php echo $_POST['sno']; ?>"/></div>

            	<div>
            	<div style="width:150px; display:inline-block"><p>Aircraft Regn. No.</p></div>
            	<div style="width:430px; display:inline-block"><p><input onkeyup="changeToUpperCase(this)" class="contact" type="text" style="text-transform:uppercase" size="3" maxlength="3" name="aircraft_regno" pattern="[A-Za-z]{3}" title="Three letter registration code" value="<?php echo $_POST['aircraft_regno']; ?>" required/></p></div>
            	</div>

            	<div>
            	<div style="width:150px; display:inline-block"><p>Flight Date</p></div>
            	<div style="width:430px; display:inline-block"><p><input class="contact" type="date" name="entry_date" value="<?php echo $_POST['entry_date']; ?>" required/></p></div>
            	</div>

            	<div>
	            <div style="width:150px; display:inline-block"><p>Station</p></div>
				<div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="station" value="<?php echo $_POST['station']; ?>" size="3" maxlength="3" required/></p></div>
				</div>

				<div>
				<div style="width:150px; display:inline-block"><p>Region</p></div>
				<!-- <div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="region" size="4" maxlength="4" value="<?php echo $_POST['region']; ?>" required/></p></div> -->
				<div style="width:430px; display:inline-block;">
                        <p><select required name="region">
                            <option value=""></option>
                            <option value="NR" <?php if($_POST['region']=="NR"){echo "selected";} ?>>NR</option>
                            <option value="SR" <?php if($_POST['region']=="SR"){echo "selected";} ?>>SR</option>
                            <option value="ER" <?php if($_POST['region']=="ER"){echo "selected";} ?>>ER</option>
                            <option value="WR" <?php if($_POST['region']=="WR"){echo "selected";} ?>>WR</option>
                        </select>
                        </p>
                    </div>
				</div>
				
				<div>
	            <div style="width:150px; display:inline-block"><p>Status</p></div>
				<div style="width:430px; display:inline-block">
					<p><select required name="status">
						<option value=""></option>
						<option value="snag" <?php if($_POST['status']=="SNAG"){echo "selected";} ?>>Snag</option>
						<option value="cf" <?php if($_POST['status']=="CF"){echo "selected";} ?>>C/F</option>
						<option value="delay" <?php if($_POST['status']=="DELAY"){echo "selected";} ?>>Delay</option>
						<option value="rampReturn" <?php if($_POST['status']=="RAMPRETURN"){echo "selected";} ?>>Ramp Return</option>
						<option value="aog" <?php if($_POST['status']=="AOG"){echo "selected";} ?>>AOG</option>
						<option value="ifsd" <?php if($_POST['status']=="IFSD"){echo "selected";} ?>>IFSD</option>
						<option value="refueling" <?php if($_POST['status']=="REFUELING"){echo "selected";} ?>>Refueling</option>
						<option value="airTurnback" <?php if($_POST['status']=="AIRTURNBACK"){echo "selected";} ?>>Air Turnback</option>
						<option value="incident" <?php if($_POST['status']=="INCIDENT"){echo "selected";} ?>>Incident</option>
						<option value="majorMaint" <?php if($_POST['status']=="MAJORMAINT"){echo "selected";} ?>>Major Maintainence</option>
						<option value="diversion" <?php if($_POST['status']=="DIVERSION"){echo "selected";} ?>>Diversion</option>
					</select></p>
				</div>
				</div>

				<div>
					<div style="width:150px; display:inline-block"><p>Incoming Flight No.</p></div>
					<div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="incoming_flight_no" size="6" maxlength="6" onkeyup="changeToUpperCase(this)" style="text-transform:uppercase" value="<?php echo $_POST['incoming_flight_no']; ?>"/></p></div>
				</div>

				<div>
					<div style="width:150px; display:inline-block"><p>Outgoing Flight No.</p></div>
					<div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="outgoing_flight_no" size="6" maxlength="6" onkeyup="changeToUpperCase(this)" style="text-transform:uppercase" value="<?php echo $_POST['outgoing_flight_no']; ?>" required/></p></div>
				</div>

				<div>
					<div style="width:150px; display:inline-block"><p>Sector</p></div>
					<div style="display:inline-block"><p><input class="contact" type="text" onkeyup="changeToUpperCase(this)" maxlength="3" size="3" style="text-transform:uppercase" name="source" value="<?php echo substr($_POST['sector'],0,3); ?>"/></p></div> - 
					<div style="display:inline-block"><p><input class="contact" type="text" onkeyup="changeToUpperCase(this)"maxlength="3" size="3" style="text-transform:uppercase" name="destination" value="<?php echo substr($_POST['sector'],4,3); ?>"/></p></div>
				</div>

				<div>
					<div style="width:150px; display:inline-block"><p>ETD</p></div>
					<div style="width:430px; display:inline-block"><p><input class="contact" type="time" name="etd" value="<?php echo $_POST['etd']; ?>"/></p></div>
				</div>

				<div>
					<div style="width:150px; display:inline-block"><p>ATD</p></div>
					<div style="width:430px; display:inline-block"><p><input class="contact" type="time" name="atd" value="<?php echo $_POST['atd']; ?>"/></p></div>
				</div>

				<div>
					<div style="width:150px; display:inline-block"><p>Engineering Delay</p></div>
					<div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="engg_delay" size="5" pattern="[0-9]([0-9]+):[0-5][0-9]" title="hh:mm" value="<?php echo substr($_POST['engg_delay'],0,strlen($_POST['engg_delay']) - 3); ?>"/>
					<small>(entry format hh:mm )</small></p></div>
				</div>

				<div>
					<div style="width:150px; display:inline-block; vertical-align:top;"><p>Snag</p></div>
					<div style="width:430px; display:inline-block"><p><textarea class="contact textarea" rows="8" cols="50" name="snag"><?php echo $_POST['snag']; ?></textarea></p></div>
				</div>

				<div>
					<div style="width:150px; display:inline-block"><p>ATA Code</p></div>
					<div style="width:430px; display:inline-block"><p><input class="contact" type="number" min="0" max="100" name="ata_code" value="<?php echo $_POST['ata_code']; ?>" /></p></div>
				</div>

				<div>
					<div style="width:150px; display:inline-block"><p>Delay Code</p></div>
					<div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="delay_code" value="<?php echo $_POST['delay_code']; ?>" /></p></div>
				</div>

				<div>
					<div style="width:150px; display:inline-block; vertical-align:top;"><p>Rectification</p></div>
					<div style="width:430px; display:inline-block"><p><textarea class="contact textarea" rows="4" cols="50" name="rectification"><?php echo $_POST['rectification']; ?></textarea></p></div>
				</div>

				<div>
					<div style="width:150px; display:inline-block"><p>C/F Expiry date</p></div>
					<div style="width:430px; display:inline-block"><p><input class="contact" type="date" name="cf_expiry_date" value="<?php echo $_POST['cf_expiry_date']; ?>" /></p></div>
				</div>

				<div>
					<div style="width:150px; display:inline-block; vertical-align:top;"><p>Remarks</p></div>
					<div style="width:430px; display:inline-block"><p><textarea class="contact textarea" rows="4" cols="50" name="remarks"><?php echo $_POST['remarks']; ?></textarea></p></div>	
				</div>

	            <div style="padding-left:150px;"><p style="padding-top: 15px"><input style="width:83px; height:27px;" class="submit" type="submit" name="update_flight_record_submit" value="Update" /></p></div>
	        </form>
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->
  </div><!--close main-->  
  <div id="footer_container">     
	<div id="footer">
      <footer> <small>&copy; Copyright 2015, MCC Air India</small> </footer>
    </div><!--close footer-->
  </div><!--close footer_container-->   
</body>
</html>
