<?php

if (isset($_GET["w1"]))
{
  $name = $_GET["w1"];
}



$user = 0;
session_start();
$host = "dijkstra2.ug.bcc.bilkent.edu.tr";
$user = "muhammad.usman";
$password = "el0639xo3";
$db = "muhammad_usman";

$link = mysqli_connect($host,$user,$password,$db);

if (!$link) 
{
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
if(isset($_GET['comment']))
{

    $cnt = "SELECT * FROM Comment";
    $res = mysqli_query($link,$cnt);
    if(!$res)
    {
        die("SQL Error: " . mysqli_error($link));
    }
    $res = mysqli_query($link,$sql);
    if(!$res)
    {
        die("SQL Error: " . mysqli_error($link));
    }
    $row = mysqli_fetch_assoc($res);
    $comm = $_GET['comment_t'];
    $currentDateTime = date('Y-m-d H:i:s');
    $pieces = explode(" ", $currentDateTime);
    $date = $pieces[0];
    $time = $pieces[1];
    $sql = "INSERT INTO Comment Values(NULL,'$date','$time','$comm','$user',NULL,NULL)";
    $res = mysqli_query($link,$sql);
    if(!$res)
    {
        die("SQL Error: " . mysqli_error($link));
    }
}



?>



<html>
<head>
<title>Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
body {
    background-image: url("images/background.jpg");
    background-repeat: repeat-x;
}
</style>

<style>
div.container {
    width: 95%;
    border: 1px solid gray;
}

header, footer {
    padding: 3px;
    color: white;
    background-color: #a2abeb;
    clear: left;
    text-align: right;
}

nav {
    float: left;
    max-width: 100px;
    margin: 10;
    padding: 1em;
}

nav ul {
    list-style-type: none;
    padding: 0;
}
   
nav ul a {
    text-decoration: none;
}

article {
    margin-left: 100px;
    border-left: 1px solid gray;
    padding: 5px;
    overflow: hidden;
	font-size:16;
}
</style>

<!--Row style2-->
<style>
body {font-family: "Lato", sans-serif;}

/* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}

</style>
<style>
	.rating {
    float:left;
}

/* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
   follow these rules. Every browser that supports :checked also supports :not(), so
   it doesn’t make the test unnecessarily selective */
.rating:not(:checked) > input {
    position:absolute;
    top:-9999px;
    clip:rect(0,0,0,0);
}

.rating:not(:checked) > label {
    float:right;
    width:1em;
    padding:0 .1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:200%;
    line-height:1.2;
    color:#ddd;
    text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:before {
    content: '★ ';
}

.rating > input:checked ~ label {
    color: #f70;
    text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);
}

.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
    color: gold;
   
}

.rating > input:checked + label:hover,
.rating > input:checked + label:hover ~ label,
.rating > input:checked ~ label:hover,
.rating > input:checked ~ label:hover ~ label,
.rating > label:hover ~ input:checked ~ label {
    color: #ea0;
    text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);
}

.rating > label:active {
    position:relative;
    top:2px;
    left:2px;
}
</style>

<style>
	span {
    padding: 10px 150px 10px 150px;
    border: 1px solid #0922e6;
		
    display: inline-block;
}
	</style>
<!-- friend table style-->
<style>
table #t01{	
    font-family: arial, sans-serif;
    border: 1px solid #0922e6; 
    width: 100%;
	font-size:12px;
}

table.booktable td, table.booktable th {
    text-align: center;
    padding: 4px;
	border-collapse: collapse;
	
}

table.booktable tr:nth-child(even) {
    background-color: #a2abeb;
}
</style>
<style> 
input[type=text] {
    width: 200px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 12px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 5px 0px 5px 0px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 70%;
}
</style>
<style>
.portrait {
    height: 313px;
    width: 250px;
	}
.img {
    height: 50px;
    width: 31px;
	
}
.dropdown {
    position: relative;
    display: inline-block;
}
.dropbtn {
    background-color: rgba(0,0,0,0);
   
    border: none;
    cursor: pointer;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 5px 16px;
    text-decoration: none;
    display: block;
}
.dropdown-content a:hover {background-color: #f1f1f1}
.dropdown:hover .dropdown-content {
    display: block;
}


</style>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('images/Home_home_on.png')">
<!-- Save for Web Slices (Home.psd) -->
<table id="Tablo_01" width="970" height="540" align="center" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="13">
			<img src="images/Home_01.png" width="970" height="16" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/Home_02.png" width="303" height="29" alt=""></td>
		<td>
			<img src="images/Home_03.png" width="11" height="29" alt=""></td>
		<td width="453" height="29" background="images/Home_search.png">
        <form>
          <input type="text" name="search" placeholder="Search..">
          </form>
      </td>
		<td><a href="Home.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Home','','images/Home_home_on.png',1)"><img src="images/Home_home_off.png" alt="Home" width="30" height="29" id="Home"></a></td>
		<td>
			<img src="images/Home_06.png" width="10" height="29" alt=""></td>
		<td><a href="Bookshelf.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Shelf','','images/Home_shelf_on.png',1)"><img src="images/Home_shelf_off.png" alt="Bookshelf" width="28" height="29" id="Shelf"></a></td>
		<td>
			<img src="images/Home_08.png" width="8" height="29" alt=""></td>
		<td><a href="Friends.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Friends','','images/Home_friends_on.png',1)"><img src="images/Home_friends_off.png" alt="Friends" width="31" height="29" id="Friends"></a></td>
		<td>
			<img src="images/Home_10.png" width="8" height="29" alt=""></td>
		<td><a href="Profile.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Profile','','images/Home_profile_on.png',1)"><img src="images/Home_profile_off.png" alt="Profile" width="24" height="29" id="Profile"></a></td>
		<td>
			<img src="images/Home_12.png" width="9" height="29" alt=""></td>
		
		
		
		
		<td>
		<div class="dropdown">
		  <button class="dropbtn"  onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Settings','','images/Home_settings_on.png',1)"> <img src="images/Home_settings_off.png" alt="Settings" width="25" height="29" id="Settings"> </button>
		  <div class="dropdown-content">
				<a href="AccountSettings.html">Account Settings</a>
			<a href="#help">Help</a>
			<a href="Login.html">Log out</a>
		  </div>
		</div>
		</td>
		
			<td>
			<img src="images/Home_14.png" width="30" height="29" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="images/Home_15.png" width="303" height="12" alt=""></td>
		<td>
			<img src="images/Home_16.png" width="11" height="12" alt=""></td>
		<td colspan="11">
			<img src="images/Home_17.png" width="656" height="12" alt=""></td>
	</tr>
	<tr>
		<td width="303" height="483" background="images/Home_left.png" valign="top" align="center">
			<div class="portrait">
				<img src="images/profilePicture.jpg">  
			</div>
			<br>	
        
        
        
          <p>
          <table class="booktable" id="t01"  border ="1|0" >
        <span>Friends</span> 
          <br>
          <tr>
            <td>
           <div class="img">
				<img src="images/galaksi.jpg">  
			</div>
				</td> <td>Isim Soyyisim</td> </tr>
     
     <tr>
            <td>
           <div class="img">
				<img src="images/galaksi.jpg">  
			</div>
				</td> <td>Isim Soyyisim</td> </tr>
     <tr>
            <td>
           <div class="img">
				<img src="images/galaksi.jpg">  
			</div>
				</td> <td>Isim Soyyisim</td> </tr>
      </table>
          
  

			
			</td>
		<td>
			<img src="images/Home_19.png" width="11" height="483" alt=""></td>
		<td colspan="11" valign="top" width="656" height="483" background="images/Home_right.png">
     <font size="+2.5"><b>Turac Abbaszade </b></font>  
      <p>
     Bilkent universitesi 3. sinif bilgisayar muhendisligi ogrencisiyim, bu yaz 2. zorunlu stajimi yapacagim. Daha once yurtdisinda (Azerbaycanda) yaz stajimi yapip basariyla tamamlamistim. Iyi derecede ingilizce, turkce, azerice biliyorum. Ve rusca temel konusma, anlama, yazmaya hakimim. 3 senedir ingilizce egitim goruyorum. IELTS sinavindan 6.5 puan almistim. HTML ve PHP yi lisede bilgisayar olimpiyatlarina katilirken ogrenmistim. Java, C++, C#, Phyton ve Mips Assembly dillerine hakimim. Grup islerine yatkinim, cesitli ders projelerinde dokumantasyondan uygulamaya kadar her etapta yer aldim. Her daim yeni seyler ogrenmege ve kendimi gelistirmeye acigim. 
			</p>
      
      <fieldset class="rating">
    
    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
</fieldset>
       
       <br><br><br><br>
      <br>
      <br>
      <br>
     
      
      
      
       
       
       
       
       
       <div class="tab">
          <button class="tablinks" class="active" onClick="openCity(event, 'CurrentlyReading')" id="defaultOpen">Currently Reading</button>
          <button class="tablinks" onClick="openCity(event, 'Read')">Read</button>
          <button class="tablinks" onClick="openCity(event, 'WantToRead')">Want to Read</button>
          <button class="tablinks" onClick="openCity(event, 'Favorite')">Favorite</button>
        </div>
        
        <div id="CurrentlyReading" class="tabcontent" style=display:block>
          <h3>Currently Reading</h3>
          <p>
          <table class="booktable" id="t01" >
          <tr>
            <th>Title</th> <th>Author</th> <th>Genre</th> <th>Publisher</th> <th>Edition</th> <th>Rate</th>
          </tr>
          <tr>
            <td>A</td> <td>A</td> <td>A</td> <td>A</td> <td>A</td> <td>A</td>
          </tr>
          <tr>
            <td>B</td> <td>B</td> <td>B</td> <td>B</td> <td>B</td> <td>B</td>
          </tr>
        </table> 
        <p>
       
        </div>
        
        <div id="Read" class="tabcontent">
          <h3>Read</h3>
          <p>
          <table class="booktable" id="t01">
          <tr>
            <th>Title</th> <th>Author</th> <th>Genre</th> <th>Publisher</th> <th>Edition</th> <th>Rate</th>
          </tr>
          <tr>
            <td>A</td> <td>A</td> <td>A</td> <td>A</td> <td>A</td> <td>A</td>
          </tr>
          <tr>
            <td>B</td> <td>B</td> <td>B</td> <td>B</td> <td>B</td> <td>B</td>
          </tr>
        </table>
        <p>
       
        </div>
        
        <div id="WantToRead" class="tabcontent">
          <h3>Want to Read</h3>
          <p>
          <table class="booktable" id="t01">
          <tr>
            <th>Title</th> <th>Author</th> <th>Genre</th> <th>Publisher</th> <th>Edition</th> <th>Rate</th>
          </tr>
          <tr>
            <td>A</td> <td>A</td> <td>A</td> <td>A</td> <td>A</td> <td>A</td>
          </tr>
          <tr>
            <td>B</td> <td>B</td> <td>B</td> <td>B</td> <td>B</td> <td>B</td>
          </tr>
        </table>
        <p>
       
        </div>
        
        <div id="Favorite" class="tabcontent">
          <h3>Favorite</h3>
          <p>
          <table class="booktable" id="t01">
          <tr>
            <th>Title</th> <th>Author</th> <th>Genre</th> <th>Publisher</th> <th>Edition</th> <th>Rate</th>
          </tr>
          <tr>
            <td>A</td> <td>A</td> <td>A</td> <td>A</td> <td>A</td> <td>A</td>
          </tr>
          <tr>
            <td>B</td> <td>B</td> <td>B</td> <td>B</td> <td>B</td> <td>B</td>
          </tr>
        </table>
        <p>
      
        
        </div>
       
       
       
       <br>
      <br>
      <br>
       
       
       
       
       <div class="container">

            <header>
               Date - Time
            </header>
              
            <nav>
              profile
            </nav>
            
            <article>
              <p>London is the capital city of England. It is the most populous city in the  United Kingdom, with a metropolitan area of over 13 million inhabitants.
            </article>
            
            <footer>
                <textarea rows="4" cols="84" name="comment" placeholder="Write your comment here" form="postform"></textarea>
        <br>
        <form id="postform">
            <input type="submit" value="Comment"  style="font-size:12pt;color:black;background-color:rgba(0,0,0,0);border: none;padding:3px">
        </form>
            </footer>
            
            </div>
       
       
       
       
       
        </td>
	</tr>
</table>
<!-- End Save for Web Slices -->
</body>
</html>