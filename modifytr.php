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
<title>csc sainte victorine</title>
<link rel="icon" type="image/ico" href="images/BOOKS.ico"/>
<meta name="keywords" content="school management system" />
<meta name="description" content="school management system" />
<link href="school.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<link href="date/htmlDatepicker.css" rel="stylesheet" />
<script language="JavaScript" src="date/htmlDatepicker.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
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
  
        <p><img src="images/ecole.PNG" width="829" height="125" /></p>
        <p>&nbsp;</p>
      </div>
      <!-- end of site_title -->
      <div id="header_right"></div>
      <div class="cleaner"></div>
    </div>
    <!-- end of header -->
    <div id="school_menubar">
      <div id="top_nav" class="ddsmoothmenu">
        <ul>
          <li><a href="?action=home" >ACUEIL</a></li>
          <li><a href="#">METTRE A JOUR </a>
            <ul>
              <li><a href='home.php?action=teacher'> NOUVEAU ENSEIGNANT</a></li>
              <li><a href='home.php?action=non'>NOUVEAU EMPLOYE</a></li>
              <li><a href='home.php?action=studentmoney'>NTRER PAYEMENT</a></li>
            </ul>
          </li>
          <li><a href="#">VOIR LES DONNEES </a>
            <ul>
              <li><a href='home.php?action=recordstudent'>LES ELVES </a></li>
              <li><a href='home.php?action=recordteacher'>LES ENSEIGANTS</a></li>
              <li><a href='home.php?action=tattend'>PRESENCE DES ENSEIGNANTS</a></li>
              <li><a href='home.php?action=recordnonstaff'>EMPLOYES</a></li>
              <li><a href='home.php?action=report'> CARTE DE RAPPORT</a></li>
              <li><a href='home.php?action=viewpay'>PAYEMENTS DE L'ELEVES</a></li>
            </ul>
          </li>
          <li><a href="#">ASSOCIATIONS</a>
            <ul>
              <li><a href='home.php?action=viewclubs'>ASSOCIATION DISPO</a></li>
              <li><a href='home.php?action=rclubs'>NOUVELLE ASSOCIATION</a></li>
              <li><a href='home.php?action=member'>ENTRER  UN ELEVE</a></li>
              <li><a href='home.php?action=clubmember'>MEMBRES</a></li>
            </ul>
          </li>
          <li><a href="cal.php">CALENDRIER</a></li>
        </ul>
      </div>
      <div id="school_search">
        <form action="?action=search" method="post">
          <select value=" " name="search" id="keyword" title="student name"  class="txt_field" required >
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
          <input type="submit" name="submit" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
        </form>
      </div>
    </div>
    <!-- END of school_menubar -->
    <div id="school_main">
      <div id="sidebar" class="float_r">
        <div class="sidebar_box"><span class="bottom"></span>
          <h3>LE  STAFF</h3>
          <div class="content"> Bouger le curseur pour PAUSEr ce slide<br/>
            <marquee behavior="scroll" direction="up"  height="150" scrollamount="1" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 2, 0);">
            <?php 
				$teacher=mysql_query("select * from teacher");
				$gets=mysql_fetch_array($teacher);
				$counts=mysql_num_rows($teacher);
				$num=1;
				echo '<font color=red> '.$num. '</font>&raquo;  ' .$gets['NAMES'].'<br/>';
				$num=2;

				while($gets=mysql_fetch_array($teacher)){

				echo '<font color=red> '.$num. '</font>&raquo;  ' .$gets['NAMES'].'<br/>';
				$num++;
				}
				?>
            </marquee>
            <br/>
          </div>
          <h3>ELEVES</h3>
          <div class="content">
            <marquee behavior="scroll" direction="up"  height="150" scrollamount="2" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 2, 0);">
            <?php 
				$student=mysql_query("select *from student");
				$gets=mysql_fetch_array($student);
				$count2=mysql_num_rows($student);
				$num=1;
				echo '<font color=red> '.$num. ' </font>&raquo;  ' .$gets['STNAME'].'<br/>';
				$num=2;
				while($gets=mysql_fetch_array($student)){

				echo '<font color=red> '.$num. '</font>&raquo;  ' .$gets['STNAME'].'<br/>';
				$num++;
				}
				?>
            </MARQUEE>
          </div>
        </div>
      </div>
       <div id="content" class="float_l">
	  <br/></br>
        <?php 
 $id=$_REQUEST['id'];
$sel=mysql_query("SELECT * FROM teacher WHERE TEACH_ID='$id'");

$fetch=mysql_fetch_array($sel);


?>
        <form  method="post" name="myform">
          <table  border="0" cellspacing="3" cellpadding="5"  id='mytable'summary="registering student">
            <tr>
              <td  height="24">NOM</td>
              <td >&nbsp;</td>
              <td ><input type="hidden" name="id" value="<?php echo $fetch[0] ?>"  />
                <input type="text" name="fname" size="30" id='in'value="<?php echo $fetch[1] ?>"</td>
            </tr>
            <tr>
              <td>MOT DE PASSE </td>
              <td>&nbsp;</td>
              <td><input type="text" name="sex" size="30" id='in'value="<?php echo $fetch[2] ?>"</td>
            </tr>
            <tr>
              <td>AGE</td>
              <td>&nbsp;</td>
              <td><input type="text" name="age" size="30" id='in' value="<?php echo $fetch[3] ?>"</td>
            </tr>
			<tr>
              <td>SEX</td>
              <td>&nbsp;</td>
              <td><input type="text" name="age" size="30" id='in' value="<?php echo $fetch[3] ?>"</td>
            </tr>
            <tr>
              <td>QUALIFICATION</td>
              <td>&nbsp;</td>
              <td><input type="text" name="quality" size="30" id='in' value="<?php echo $fetch[4] ?>"</td>
            </tr>
			<tr>
              <td>SALAIRE</td>
              <td>&nbsp;</td>
              <td><input type="text" name="quality" size="30" id='in' value="<?php echo $fetch[4] ?>"</td>
            </tr>
            <tr>
              <td>STATUS</td>
              <td>&nbsp;</td>
              <td><input type="text" name="status" size="30" id='in' value="<?php echo $fetch[5] ?>"</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right"><input type="submit" name="send" id='send'value="MODIFIER" />
                <input type='reset' id='clear'name="clear" value="ANNULER"  /></td>
            </tr>
          </table>
        </form>
        <?php
					if (isset($_POST['send'])){ 
$id=$_REQUEST['id'];
$fname =$_REQUEST['fname'];
$ua=$_REQUEST['quality'];
$sex=$_REQUEST['sex'];
$age=$_REQUEST['age'];
$status=$_REQUEST['status'];

$insert= mysql_query("UPDATE teacher SET NAMES='$fname', SEX='$sex', AGE='$age', QUALITY='$ua' ,STATUS='$status' WHERE TEACH_ID='$id'") or die(mysql_query());

if($insert){
echo '<img src="images/492.png" /> &nbsp;! data updated successfully';
 echo '<meta content="2;home.php?action=recordteacher" http-equiv="refresh" />';

}else 
echo 'failed to insert data';
echo mysql_error();
//echo '<meta content="2;modifyst.php" http-equiv="refresh" />';
}else  if($action=='search'){//------------------------------------------------------------
      
 $search=$_POST['search'];
 
 
$query=mysql_query("SELECT * from student , image where image.image_id='$search' AND student.STNAME='$search'")or die(mysql_error());
$array=mysql_fetch_array($query);
$count=mysql_num_rows($query);

?>
        <table style="border: 3px double #FF6600; background:url(images/powder.gif);background-size:cover; padding:12px; color:#003366">
          <tr>
            <td scope="col" colspan="3" align="center">ECOLE MODERNE CSC SAINTE VICTORINE  </td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td width="196" height="34">NOM</td>
            <td width="230"><?php echo $array['STNAME'];?> </td>
            <td width="200" rowspan="5"><img src="<?php echo ''.$array['location']; ?>" width="200" height="200"  id="images"/></td>
          </tr>
          <tr>
            <td>SEX </td>
            <td><?php echo $array['SEX'];?></td>
          </tr>
          <tr>
            <td height="38">DATE D'INSCRIPTION </td>
            <td><?php echo $array['DATE'];?></td>
          </tr>
          <tr>
            <td height="40">NOMS DES PARENTS </td>
            <td><?php echo $array['GUARDIAN'];?> </td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" align="center"> SLOGAN</td>
          </tr>
        </table>
        <?php

}?><div class="cleaner"></div>
    </div>
    <!-- END of school_main -->
  <div id="school_footer">
          <div align=center>&copy; 2015-2016 CSC SAINTE VICTORINE </div>

  </div>
  <!-- END of school_footer -->
</div>
<!-- END of school_wrapper -->
</div>
<!-- END of school_body_wrapper -->
</ul>
</body>
</html>
