<?php
    include 'includes/headers.php';
    include 'includes/login_check.php';
    include 'includes/write_constraint.php';
?>
<?php date_default_timezone_set('Asia/Kolkata'); ?>
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

<body onload="document.getElementById('menuEntryDataEntry').className += 'current';">
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
          <h2>Flight Entry</h2>
            <p>Enter the data below regarding the flight</p>
            <form action="utility.php" method="post">
            	
            	<div>
            		<div style="width:150px; display:inline-block"><p>Aircraft Regn. No.*</p></div>
            		<div style="width:430px; display:inline-block"><p><input onkeyup="changeToUpperCase(this)" class="contact" type="text" style="text-transform:uppercase" size="3" maxlength="3" name="aircraft_regno" pattern="[A-Za-z]{3}" title="Three letter registration code" value="" required/></p></div>
            	</div>

            	<div>
            		<div style="width:150px; display:inline-block"><p>Flight Date*</p></div>
            		<div style="width:430px; display:inline-block"><p><input class="contact" type="date" name="entry_date" value="<?php echo date("Y-m-d");?>" required/></p></div>
            	</div>

            	<div>
            		<div style="width:150px; display:inline-block"><p>Entry Time*</p></div>
            		<div style="width:430px; display:inline-block"><p><input class="contact" type="time" name="entry_time" placeholder="hrs:mins" value="<?php echo date("H:i"); ?>" required/></p></div>
            	</div>

            	<div>
            		<div style="width:150px; display:inline-block"><p>Station*</p></div>
            		<div style="width:430px; display:inline-block"><p><input class="contact" type="text"  onkeyup="changeToUpperCase(this)" name="station" value="" size="3" maxlength="3" style="text-transform:uppercase" required/></p></div>
            	</div>

            	<div>
            		<div style="width:150px; display:inline-block"><p>Region*</p></div>
            		<!-- <div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="region" value="" size="4" maxlength="4"  onkeyup="changeToUpperCase(this)"  style="text-transform:uppercase" required/></p></div> -->
                    <div style="width:430px; display:inline-block;">
                        <p><select required name="region">
                            <option value=""></option>
                            <option value="NR">NR</option>
                            <option value="SR">SR</option>
                            <option value="ER">ER</option>
                            <option value="WR">WR</option>
                        </select>
                        </p>
                    </div>
            	</div>

            	<div>
            		<div style="width:150px; display:inline-block"><p>Status*</p></div>
            		<div style="width:430px; display:inline-block">
            			<p><select required name="status">
            				<option value=""></option>
            				<option value="snag">Snag</option>
            				<option value="cf">C/F</option>
            				<option value="delay">Delay</option>
            				<option value="rampReturn">Ramp Return</option>
            				<option value="aog">AOG</option>
            				<option value="ifsd">IFSD</option>
            				<option value="refueling">Refueling</option>
            				<option value="airTurnback">Air Turnback</option>
            				<option value="incident">Incident</option>
            				<option value="majorMaint">Major Maintainence</option>
            				<option value="diversion">Diversion</option>
            			</select></p>
            		</div>
            	</div>

            	<div>
            		<div style="width:150px; display:inline-block"><p>Incoming Flight No.</p></div>
            		<div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="incoming_flight_no" value="" size="6" maxlength="6" onkeyup="changeToUpperCase(this)" style="text-transform:uppercase" pattern="[0-9]{3,4}"/></p></div>
            	</div>

            	<div>
            		<div style="width:150px; display:inline-block"><p>Outgoing Flight No.*</p></div>
            		<div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="outgoing_flight_no" value="" size="6" maxlength="6" onkeyup="changeToUpperCase(this)" style="text-transform:uppercase" pattern="[0-9]{3,4}" required/></p></div>
            	</div>

                <div>
                    <div style="width:150px; display:inline-block"><p>Sector</p></div>
                    <div style="display:inline-block"><p><input class="contact" type="text" onkeyup="changeToUpperCase(this)" maxlength="3" size="3" style="text-transform:uppercase" name="source" value=""/></p></div> - 
                    <div style="display:inline-block"><p><input class="contact" type="text" onkeyup="changeToUpperCase(this)"maxlength="3" size="3" style="text-transform:uppercase" name="destination" value=""/></p></div>
                </div>

                <div>
                    <div style="width:150px; display:inline-block"><p>ETD</p></div>
                    <div style="width:430px; display:inline-block"><p><input class="contact" type="time" name="etd" value=""/></p></div>
                </div>

                <div>
                    <div style="width:150px; display:inline-block"><p>ATD</p></div>
                    <div style="width:430px; display:inline-block"><p><input class="contact" type="time" name="atd" value=""/></p></div>
                </div>

                <div>
                    <div style="width:150px; display:inline-block"><p>Engineering Delay</p></div>
                    <div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="engg_delay" size="5" value="" pattern="[0-9]([0-9]+):[0-5][0-9]" title="hh:mm"/>
                    <small>(entry format hh:mm )</small></p></div>
                </div>

            	<div>
            		<div style="width:150px; display:inline-block; vertical-align:top;"><p>Snag</p></div>
            		<div style="width:430px; display:inline-block"><p><textarea class="contact textarea" rows="8" cols="50" name="snag"></textarea></p></div>
            	</div>

            	<div>
            		<div style="width:150px; display:inline-block"><p>ATA Code</p></div>
            		<div style="width:430px; display:inline-block"><p><input class="contact" type="number" min="1" max="100" name="ata_code"/></p></div>
            	</div>

            	<div>
            		<div style="width:150px; display:inline-block"><p>Delay Code</p></div>
            		<div style="width:430px; display:inline-block"><p><input class="contact" type="text" name="delay_code"/></p></div>
            	</div>

            	<div>
            		<div style="width:150px; display:inline-block; vertical-align:top;"><p>Rectification</p></div>
            		<div style="width:430px; display:inline-block"><p><textarea class="contact textarea" rows="4" cols="50" name="rectification"></textarea></p></div>
            	</div>

            	<div>
            		<div style="width:150px; display:inline-block"><p>C/F Expiry date</p></div>
            		<div style="width:430px; display:inline-block"><p><input class="contact" type="date" name="cf_expiry_date" value="" /></p></div>
            	</div>

            	<div>
            		<div style="width:150px; display:inline-block; vertical-align:top;"><p>Remarks</p></div>
            		<div style="width:430px; display:inline-block"><p><textarea class="contact textarea" rows="4" cols="50" name="remarks"></textarea></p></div>
            	</div>

	            <div style="padding-left:150px;"><p style="padding-top: 15px"><input style="width:83px; height:27px;" class="submit" type="submit" name="data_submit" value="Submit" /></p></div>
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