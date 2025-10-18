<?php 
			error_reporting("E_NOTICE"); 
			?>
<?php
			////include('header.php');
			include('connection.php');
			session_start();
			
			if (!isset($_SESSION['user_id'])){
			header('location:index.php');
			}
			//
			?>
<?php
			//mag show sang information sang user nga nag login
			$user_id=$_SESSION['user_id'];
			
			$result=mysql_query("select * from users where user_id='$user_id'")or die(mysql_error);
			$row=mysql_fetch_array($result);
			
			$FirstName=$row['FNAME'];
			$LastName=$row['LNAME'];
			?>
<div style="float:right; margin-right:24px;" ;>
  <?php 
			echo '<img src="images/admin.png"><font color="orange"> &nbsp;'.$FirstName." ".$LastName .'</font>';?>
  <a href="logout.php" class="logout">Logout</a></div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSC.sainte victorine</title>
<link rel="icon" type="image/ico" href="images/BOOKS.ico"/>
<meta name="keywords" content="College registration information management system" />
<meta name="description" content="College registration information management system" />
<link href="school.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<link href="date/htmlDatepicker.css" rel="stylesheet" />
<script language="JavaScript" src="date/htmlDatepicker.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="improve/graph/js/awesomechart.js"></script>
<script type="text/javascript" src="improve/graph/js/jquery.js"></script>

<script type="text/javascript" src="js/ddsmoothmenu.js">
			
			/***********************************************
			* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
			* This notice MUST stay intact for legal use
			* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
			***********************************************/
			
			</script>
<script type="text/javascript">
			
			ddsmoothmenu.init({
				mainmenuid: "top_nav", //menu DIV id
				orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
				classname: 'ddsmoothmenu', //class added to menu's outer DIV
				//customtheme: ["#1c5a80", "#18374a"],
				contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
			})
			
			</script>
			</head>
<body>
<div id="school_body_wrapper">
  <div id="school_wrapper">
    <div id="school_header">
     <div></a> 
       <p><img src="images/ecole.png" width="1024" height="70" /></p>
       <p>&nbsp; </p>
     </div>
	
      <!-- end of site_title -->
      <div class="cleaner"></div>
  </div>
    <!-- end of header -->
    <div id="school_menubar">
      <div id="top_nav" class="ddsmoothmenu">
        <ul>
          <li><a href="?action=home" >ACUEIL</a></li>
          <li><a href="#">METTRE AJOUR </a>
            <ul>
              <li><a href='?action=teacher'> NOUVEAU ENSEIGNANT</a></li>
              <li><a href='?action=non'>NOUVEAU EMPLOYE</a></li>
              <li><a href='?action=salaryin'>PAYEMENT ENSEIGANT</a></li>
              <li><a href='?action=salarynon'>PAYEMENT EMPLOYE</a></li>
              <li><a href='?action=bursary'>ELEVE BOURSIERS</a></li>
            </ul>
          </li>
          <li><a href="#">VOIR LES DONNEES </a>
            <ul>
              <li><a href='?action=recordstudent'>ELEVES</a></li>
              <li><a href='?action=onbursary'>ELEVES BOURSIERS </a></li>
              <li><a href='?action=recordteacher'>ENSEIGNANTS</a></li>
              <li><a href='?action=tattend'>PRESENCE ENSIGNANT</a></li>
              <li><a href='?action=recordnonstaff'>EMPLOYE</a></li>
              <li><a href='?action=report'> CARTE DE RAPPORT</a></li>
			  <li><a href='?action=trans'>BULLETIN</a></li>

              <li><a href='?action=viewpay'>PAYEMENT ELVE</a></li>
              <li><a href='?action=unpaid'>ELEVE EN DETTE</a></li>
            </ul>
          </li>
          <li><a href="#">ASSOCIATIONS</a>
            <ul>
              <li><a href='?action=viewclubs'>ASSOCIATION DISPO</a></li>
              <li><a href='?action=rclubs'>NOOUVELLE ASS</a></li>
              <li><a href='?action=member'>NTER UN ELEVE</a></li>
              <li><a href='?action=clubmember'>MEMBRE</a></li>
            </ul>
          </li>
          <li><a href="improve/cal.php">CALENDRIER</a></li>
        </ul>
      </div>

 <table width="1218"  cellspacing="3" cellpadding="0">
  <tr>
    <td width="367"><div class='name'> 
  <p>&nbsp;</p>
</div></td>
    <td width="407"> <div class="time"><center> 
  <p>
    <?php
                        $Today = date('y:m:d');
                        $new = date('l, F d, Y', strtotime($Today));
                        echo $new;
                        ?>
  </p></td>
    <td width="424"><div class="search"><p>
	
	 <div id="school_search">
        <form action="?action=search" method="post">
          <select value=" " name="search" id="keyword" title="Student ID"   class="txt_field" required >
            <option>
            <option>
            <?php
									$result = mysql_query("SELECT STNAME FROM student ");
									while($row = mysql_fetch_array($result))
										{  
											echo '<option value="'.$row['STNAME'].'">';
											echo $row['STNAME'];
											echo '</option>';
										}
									?>
          </select>
          <input type="submit" name="submit" value=" " alt="Search" id="searchbutton" title="Student ID" class="sub_btn"  />
        </form>
      </div>   </p>
    </div></td>
  </tr>
</table>

  <p>&nbsp;</p>
  <p>&nbsp; </p>
  <div class="lefts"></div>

  <div class='aside'><div class='aside'><form name="calculator">


<table width="1008" border="1" align="center">
  <tr>
    <td width="1054">
        <div id="print_content" style="width: 1000px;">
		<p></p>
		<p>ELEVE ENREGISTRES<br/></p>
		
		<p>ECOLE MODERNE COMPLEXE SCOLAIRE SAINTE VICTORINE<br/></p>
		<p>
		p.o. Box: <br/>
		</p>
		
            <p><br />
                <?php
$sel=mysql_query("SELECT * FROM student");
echo '<table id="mytable">';
echo '<th>FNAME</th>  <th>LNAME</th>  <th>SEX</th><th>AGE</th><th>DISTRICT</th><th>PARENT</th><th>OFFERTYPE</th><th>CLASS</th>';

while($fetch=mysql_fetch_array($sel)){


echo '<tr><td>'.$fetch['1'].'</td><td>'.$fetch['2'].'</td><td>'.$fetch['SEX'].'</td><td>'.$fetch['AGE'].'</td><td>'.$fetch['DISTRICT'].'</td><td>'.$fetch['GUARDIAN'].'</td><td>'.$fetch['OFFERING'].'</td>><td>'.$fetch['CLASS'].'</td></tr>';
 
}
echo '</table>';

?>
              </p>
            <p>Date<br/></p>
			<p></p>
            <p align="center">SEAU</p>
            <p align="center"><br/>
            </p>
            <div align="center"><a href="javascript:Visionprintreceipt()">IMPRIMER</a>
		</div>
    </div></td>
  </tr>
</table>
  <p>
  <p>  
  <p>
  <table border="0" align="center" cellpadding="0" bgcolor="#8080C0" id="calc" style="border-radius:5px;">
<td align="center">
SAINTE VICTORINE<br/> CALCULATOR</td>
</tr>
<tr>
<td><div align="center">
  <input type="text" name="text" size="15" />
</div></td>
</tr>

<tr><td align="center">
<input type="button" value="1" onClick="calculator.text.value += '1'">
<input type="button" value="2" onClick="calculator.text.value += '2'">
<input type="button" value="3" onClick="calculator.text.value += '3'">
<input type="button" value="4" onClick="calculator.text.value += '4'"></td>
</tr>
<tr>
<td align="center"><input type="button" value="5" onClick="calculator.text.value += '5'">
<input type="button" value="6" onClick="calculator.text.value += '6'">
<input type="button" value="7" onClick="calculator.text.value += '7'">
<input type="button" value="8" onClick="calculator.text.value += '8'"></td>
</tr>
<tr>
<td align="center"><input type="button" value="9" onClick="calculator.text.value += '9'">
<input type="button" value="0" onClick="calculator.text.value += '0'">
<input type="button" value="+" onClick="calculator.text.value += '+'">
<input type="button" value="-" onClick="calculator.text.value += '-'"></td>
</tr>

<tr>
<td align="center"><input type="button" value="*" onClick="calculator.text.value += '* '">
<input type="button" value="/" onClick="calculator.text.value += '/ '">
<input type="reset" value="c" >
<input type="button" value="=" onClick="calculator.text.value = eval(calculator.text.value)"></td>
</tr>
<tr><td><img src="images/loader.gif" width="170" title='THIS DEVICE IS UP TO DATE'></td> </tr>
</table>
   </p>
  </form></div></div>
<div class="content">
<script language="javascript">
function Visionprintreceipt()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Inel Power System</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:12px; font-family:arial Narrow;text-shadow:0 1px 1px rgba(0,0,0,.1); border: 1px solid black;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
</div>
<div class='footer'>
  
</div>
<div align=center>&copy; 2015-2016 CSC. SAINTE VICTORINE</div>
</body>
</html>
