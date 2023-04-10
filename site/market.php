<?php  
 $connect = mysqli_connect("localhost", "root", "","final");  
 $query ="SELECT * FROM demand_1 ";  
 $result = mysqli_query($connect, $query);

 ?>  

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- <meta http-equiv="refresh" content="3" > -->

<link rel="shortcut icon" href="../modules/writereaddata/files/favicon_nmc.jpg" type="image/vnd.microsoft.icon" />
    <title>Nagpur Munciple Corporation - Market Management | नागपूर महानगरपालिका - बाजार व्यवस्थापन </title>
    <style type="text/css" media="all">
@import url("../modules/modules/system/style1.css");
@import url("../modules/modules/system/style2.css");
</style>
<style type="text/css" media="all">
@import url("../modules/sites/all/themes/superfine/vendor/bootstrap/css/bootstrap.min30a6.css?rej7ie");
@import url("../modules/sites/all/themes/superfine/vendor/linea_icons/css/linea_icons30a6.css?rej7ie");
@import url("../modules/sites/all/themes/superfine/vendor/animation/css/animation30a6.css?rej7ie");
@import url("../modules/sites/all/themes/superfine/vendor/animsition/css/animsition.min30a6.css?rej7ie");
@import url("../modules/sites/all/themes/superfine/vendor/slick/slick30a6.css?rej7ie");
@import url("../modules/sites/all/themes/superfine/vendor/magnific/magnific-popup30a6.css?rej7ie");
@import url("../modules/sites/all/themes/superfine/vendor/camera/camera30a6.css?rej7ie");
@import url("../modules/sites/all/themes/superfine/vendor/sharree/sharrre30a6.css?rej7ie");
@import url("../modules/sites/all/themes/superfine/assets/revolution/css/layers30a6.css?rej7ie");
@import url("../modules/sites/all/themes/superfine/assets/css/assets30a6.css?rej7ie");
@import url("../modules/sites/all/themes/superfine/assets/css/style30a6.css?rej7ie");
</style>
    <link id="theme_css" rel="stylesheet" href="sites/all/themes/superfine/assets/css/light.min.css">
    <link id="theme_css" rel="stylesheet" href="/site/style.css">
    <link id="skin_css" rel="stylesheet" href="sites/all/themes/superfine/assets/css/skins/default.min.css">
 <script type="text/javascript" src="../code.jquery.com/jquery-3.4.1.min.js"></script>
  <script type="text/javascript"> 
    var $jq = jQuery.noConflict(); 
  </script> 
</head>
<body class="html front not-logged-in no-sidebars page-indexhtml i18n-en " >
<div class="pageWrapper">
    
        <!-- <div class="top-bar main-bg">
        <div class="container">
            <div class="center-tbl">
                  <div class="region region-top-bar">
    <div id="block-block-33" class="block block-block inline-block">
                     <div class="content">
    
<!-- <script>
 var s = document.createElement('script');
 s.src = "../npci.corover.mobi/widget/res/chatbotlib.min.js";
 s.type = "text/javascript";
 document.getElementsByTagName('head')[0].appendChild(s);
</script> -->
</div>
</div>
<div id="block-block-1" class="block block-block inline-block">
                     <div class="content">
    <ul class="social-list middle-ul" style="color: blue;"><li><a href="https://www.facebook.com/nmcngp/" class="fa fa-facebook" data-tooltip="true" data-title="facebook" data-position="bottom" target="_blank"></a></li>
         <li><a href="https://www.instagram.com/nmcngp/?hl=en" class="fa fa-instagram" data-tooltip="true" data-title="linkedin" data-position="bottom" target="_blank"></a></li>
	 <li><a href="https://www.youtube.com/playlist?list=PLJ2cQThBOyTcJkxpFsdHYY1yGjhB9fsX5" class="fa fa-youtube" data-tooltip="true" data-title="skype" data-position="bottom" target="_blank"></a></li>
	<li><a href="https://twitter.com/ngpnmc" class="fa fa-twitter" data-tooltip="true" data-title="twitter" data-position="bottom" target="_blank"></a></li>
        <li><a href="https://www.linkedin.com/company/nagpur-municipal-corporation/?originalSubdomain=in" class="fa fa-linkedin" data-tooltip="true" data-title="twitter" data-position="bottom" target="_blank"></a></li>
</ul></div>
</div>
<!-- <div id="block-high-contrast-high-contrast-switcher" class="block block-high-contrast inline-block">
                          <h3><none></h3>
        <div class="content">
    
    <div class="high_contrast_switcher high_contrast_switcher_links">
      <p>
        <span class="high_contrast_switcher_label">Contrast:</span><span class="high_contrast_switcher_high"><a href="javascript:drupalHighContrast.enableStyles()">High</a></span><span class="high_contrast_switcher_separator">|</span><span class="high_contrast_switcher_normal"><a href="javascript:drupalHighContrast.disableStyles()">Normal</a></span></p>
    </div>
    </div>
</div> -->
<!-- <div id="block-text-resize-0" class="block block-text-resize inline-block">
                          <h3>Text Resize</h3>
        <div class="content">
    <a href="javascript:;" class="changer" id="text_resize_decrease"><sup>-</sup>A</a> <a href="javascript:;" class="changer" id="text_resize_reset">A</a> <a href="javascript:;" class="changer" id="text_resize_increase"><sup>+</sup>A</a><div id="text_resize_clear"></div></div>
</div>
<div id="block-block-31" class="block block-block inline-block">
                     <div class="content">
    <p style="color:blue ;"><a href="#block-bean-we-make-it-with-love-index">Skip to main content</a></p></div>
</div>
  </div>
            </div>
        </div>
    </div>  -->
<header class="top-head boxed-transparent dark " data-sticky="true">
    <div class="container ">
        <div class="logo">
            <h1><a href="index.html"><img alt="" src="../modules/writereaddata/files/Headerlogo_0.png" /></a></h1>
        </div>
                    <div class="f-right responsive-nav">
                  <div class="region region-navigation">
    <div id="block-system-main-menu" class="block block-system block-menu inline-block">
                     <div class="content">
    
<nav  class="top-nav">
    <ul>
        <li class="first leaf">
            <a href="index.php" title="" class="active">Home</a>
        </li>
        <li class="expanded">
            <a href="./about.php" title="">About </a>
            <!-- <ul>
                <li>
                    <a href="content/introduction.html">Introduction</a>
                </li>
                <li>
                    <a href="content/vision-and-vision-areas.html">Vision and Vision Areas</a>
                </li>
            </ul> -->
        </li>
        <li class="expanded"><a href="./home.php" title="">Market</a>
            <!-- <ul>
                <li><a href="./home.php" title="" class="active">search Area</a>
                </li>
                <li><a href="./home.php" title="" class="active">search Zone</a>
                </li>
            </ul> -->
        </li>
        <!-- <li class="leaf">
            <li class="expanded"><a href="./NMCDashBoard/commondashboard.html">Dashboard</a>
                <ul>
                    <li><a href="#" title="" class="active">Career</a>
                    </li>
                </ul>
            </li>
        </li> -->
                       <!-- <li class="last expanded">
                <a href="./feedback/index.html" title="">Feedback</a>

            </li>  -->
            <li class="last expanded">
                <a href="./account/select/select.php" title="">Login/Signup</a>
                <ul>
                    <li>
                        <a href="./admin-dashboard/" target="_self" title="">Admin Login</a>
                    </li>
                    <li>
                        <a href="./account/login/index.html" title="">Customer Login</a>
                    </li>
                </ul>
            </li> 
        </li>
    </ul>
</nav>
</div>
</div>
<div id="block-search-form" class="block block-search inline-block">
                     <div class="content">
</div>
</div>
  </div>
            </div>
            </div>
</header>        
 <div id="contentWrapper">
        
		<!-- Header end        -->
<!-- enter your code here -->
<div class="container">
    <center>
<h1 style="font-style">Market Details </h1>
</center>

<div id="toolbar">
		<select class="form-control">
				<option value="">Export Basic</option>
				<option value="all">Export All</option>
				<option value="selected">Export Selected</option>
		</select>
</div>

<table id="table" 
			 data-toggle="table"
			 data-search="true"
			 data-filter-control="true" 
			 data-show-export="true"
			 data-click-to-select="true"
			 data-toolbar="#toolbar">
	<thead >
		<tr class = "table1_header" >
			<th data-field="state" data-checkbox="true"></th>
			<th data-field="prenom" data-filter-control="input" data-sortable="true">Owners Name</th>
			<th data-field="date" data-filter-control="select" data-sortable="true">Market Name</th>
			<th data-field="examen" data-filter-control="select" data-sortable="true">Area</th>
			<!-- <th data-field="note" data-sortable="true">View</th> -->
		</tr>
	</thead>
	
		<?php  
		if(mysqli_num_rows($result)>0){

		
		while($row = mysqli_fetch_array($result))  
		{  
		  echo '  
		  <tr>  
		  <td>'.$row["id"].'</td> 
		  	   <td>'.$row["owner_name"].'</td> 
			   <td>'.$row["market_name"].'</td>  
			   <td>'.$row["zone_name"].'</td>  
		  </tr>  
		   ';  
	 }  
		}
	 ?>  

	
			
	
</table>
</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js'></script>
<script src='//rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js'></script><script  src="./script.js"></script>



        <!-- Footer start -->
    <footer  id = 'footWrapper' class = 'ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle ui-sortable-handle footer-4 ui-sortable-handle'>
<div  class = 'footer-middle'>
<div  class = 'container'>
<div  class = 'row'>
<div  class = 'first col-md-3'>
<div id="block-menu-menu-footer-menu" class="block block-menu">
                          <h3>Useful Links</h3>
        <div class="content">
    <ul class="menu-widget" ><li class="first leaf"><a href="/all-announcement" title="">Announcement</a></li><li class="leaf"><a href="/content/accessibility-statement" title="">Accessibility Statement</a></li><li class="leaf"><a href="/content/disclaimer" title="">Disclaimer</a></li><li class="leaf"><a href="/content/help" title="">Help</a></li><li class="leaf"><a href="/content/right-information" title="">Right to Information</a></li><li class="leaf"><a href="/content/terms-conditions" title="">Terms & Conditions</a></li><li class="leaf"><a href="/content/website-policies">Website Policies</a></li><li class="leaf"><a href="/sitemap" title="">Sitemap</a></li><li class="last leaf"><a href="/content/statistics-0">statistics</a></li></ul></div>
</div>

    <div  style = 'padding-top: 5px; padding-bottom: 5px; background-color: #337ab7; padding-left: 2px; padding-right: 2px;'>
        <a href="https://pgportal.gov.in/" class="cws-button redressbtn  ">
        Grievance Redressal            </a>
        </div>

    <div  style = 'padding-top: 5px; padding-bottom: 5px; background-color: #337ab7; padding-left: 2px; padding-right: 2px; margin-top: 1px; margin-bottom: 1px;'>
        <a href="/content/discussion-forum" class="cws-button redressbtn  ">
        Discussion Forum            </a>
        </div>

    <div  style = 'padding-top: 5px; padding-bottom: 5px; background-color: #337ab7; padding-left: 2px; padding-right: 2px; margin-top: 1px; margin-bottom: 1px;'>
        <a href="/content/policies" class="cws-button redressbtn  ">
        Policies            </a>
        </div>

</div>
<div  class = 'col-md-6'>
<div id="block-block-5" class="block block-block contact-widget">
                          <h3>Web Information Manager</h3>
        <div class="content">
    <ul class="details"><li><span>Sr. Director, DIC and Chief Operating Officer, NeGD</span></li>
	<li><i class="fa fa-map-marker shape new-angle"></i><span> Ministry of Electronics &amp; IT <br />(Government of India) <br />Electronics Niketan, 6, CGO Complex,<br /> Lodhi Road, New Delhi-110003</span></li>
	<li><i class="fa fa-envelope shape new-angle"></i><span>portal[at]digitalindia[dot]gov[dot]in</span></li>
	<li><i class="fa fa-phone shape new-angle"></i><span>+91-11-24301931</span></li>
</ul><div class="modal show-modal bbbp-body" style="position: inherit; bottom: 40px !important;">
    <div class="modal-content bbbp-content">
        <h1>Watch Hon'ble PM's LIVE Interaction with beneficiaries of Digital India on July 1, 2021 at 11:00am on
<a href="https://pmindiawebcast.nic.in/" target="_blank" style="color: #ed4000;">https://pmindiawebcast.nic.in/</a></h1>
    </div>
</div>

</div>
</div>

<div  style = 'margin-top: 50px;'>
    <a  href="https://apps.mgov.gov.in/appcategory.do?id=40&amp;param=category&amp;value=Social" target="_blank">
</a>
</div>

</div>
<div  class = 'last contact-widget col-md-3'>
<div  style = 'i.fa.fa-koo { border: 1px solid; padding: 11px 4px;}i.fa.fa-koo:after { content: 'Koo' class = ' wow ="""=""' data-wow-delay = '="""=""ms' data-wow-duration = '="""=""ms'>
                <div class="heading sub-head">
                                    <h3 class="head  " >            <span class="main-color">SOCIAL MEDIA</span>&nbsp;                         </h3>                                </div>
    
    </div>

<div  style = 'i.fa.fa-koo {border: 1px solid;padding: 11px 4px;}i.fa.fa-koo:after {content: 'Koo';}' class = ' wow ="""="" fa-koo' data-wow-delay = '="""=""ms' data-wow-duration = '="""=""ms'><ul class="siconul"><li><a href="https://www.facebook.com/OfficialDigitalIndia/"><i class="fa fa-facebook sicon"></i>&nbsp;&nbsp;&nbsp;Digital India FACEBOOK</a></li><li><a href="https://twitter.com/_DigitalIndia"><i class="fa fa-twitter sicon"></i>&nbsp;&nbsp;Digital India TWITTER</a></li><li><a href="https://www.youtube.com/digitalindiaofficial"><i class="fa fa-youtube sicon"></i>&nbsp;&nbsp;Digital India's YouTube Page</a></li> <li><a href="https://www.instagram.com/officialdigitalindia/"><i class="fa fa-instagram sicon"></i>&nbsp;&nbsp;Digital India INSTAGRAM</a></li> <li><a href="https://www.kooapp.com/profile/digitalindia"><i style="border: 1px solid #fff; padding: 6px;" class="fa fa-koo"><img width="20px" src="https://digitalindia.gov.in/writereaddata/files/koo.png"></i>&nbsp;&nbsp;Digital India KOO</a></li> <li><a href="https://www.linkedin.com/company/9341137"><i class="fa fa-linkedin sicon"></i>&nbsp;&nbsp;Digital India LINKEDIN</a></li></ul><!-- <ul class="siconul"><li><a href="https://www.facebook.com/OfficialDigitalIndia"><i class="fa fa-facebook sicon"></i>&nbsp;&nbsp;facebook.com/OfficialDigitalIndia</a></li><li><a href="https://twitter.com/_DigitalIndia"><i class="fa fa-twitter sicon"></i> &nbsp;&nbsp;_DigitalIndia</a></li><li><a href="https://www.youtube.com/user/MyNeGP"><i class="fa fa-youtube sicon"></i>&nbsp;&nbsp;user/MyNeGP</a></li> <li><a href="https://www.instagram.com/officialdigitalindia/"><i class="fa fa-instagram sicon"></i>&nbsp;&nbsp;officialdigitalindia</a></li> <li><a href="https://in.linkedin.com/company/digital-india"><i class="fa fa-linkedin sicon"></i>&nbsp;&nbsp;digital-india</a></li></ul> --></div>
</div>
</div>
</div>
</div>
<div  class = 'footer-bottom'>
<div  class = 'container'>
<div  class = 'row'>
Content owned &amp; provided by the respective Central Government Departments and the Programme coordinated by Ministry of Electronics &amp; Information Technology, Government Of India. This portal is designed and developed by Ministry of Electronics &amp; Information Technology, Government of India / NIC.
<p>This Website belongs to Ministry of Electronics and IT, Government of India</p>
</div>
</div>
</div>
</footer>
 
    </div>
</div><!-- Back to top Link -->
<a id="to-top"><span class="fa fa-chevron-up shape main-bg"></span></a>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
var highContrast = {"link":"<a href=\"\/\" class=\"element-invisible element-focusable\" rel=\"nofollow\">Toggle high contrast<\/a>","cssFilePath":"https:\/\/digitalindia.gov.in\/writereaddata\/files\/high_contrast_current.css"};var drupalHighContrast={};!function(){document.write("<script type='text/javascript' id='high-contrast-css-placeholder'>\x3C/script>");var e=document.getElementById("high-contrast-css-placeholder");!function(e){if("function"==typeof define&&define.amd)define(e);else if("object"==typeof exports)module.exports=e();else{var t=window.Cookies,n=window.Cookies=e();n.noConflict=function(){return window.Cookies=t,n}}}(function(){function e(){for(var e=0,t={};e<arguments.length;e++){var n=arguments[e];for(var o in n)t[o]=n[o]}return t}function t(n){function o(t,r,i){var a;if(arguments.length>1){if(i=e({path:"/"},o.defaults,i),"number"==typeof i.expires){var d=new Date;d.setMilliseconds(d.getMilliseconds()+864e5*i.expires),i.expires=d}try{a=JSON.stringify(r),/^[\{\[]/.test(a)&&(r=a)}catch(c){}return r=encodeURIComponent(String(r)),r=r.replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g,decodeURIComponent),t=encodeURIComponent(String(t)),t=t.replace(/%(23|24|26|2B|5E|60|7C)/g,decodeURIComponent),t=t.replace(/[\(\)]/g,escape),document.cookie=[t,"=",r,i.expires&&"; expires="+i.expires.toUTCString(),i.path&&"; path="+i.path,i.domain&&"; domain="+i.domain,i.secure?"; secure":""].join("")}t||(a={});for(var l=document.cookie?document.cookie.split("; "):[],s=/(%[0-9A-Z]{2})+/g,u=0;u<l.length;u++){var f=l[u].split("="),h=f[0].replace(s,decodeURIComponent),g=f.slice(1).join("=");'"'===g.charAt(0)&&(g=g.slice(1,-1));try{if(g=n&&n(g,h)||g.replace(s,decodeURIComponent),this.json)try{g=JSON.parse(g)}catch(c){}if(t===h){a=g;break}t||(a[h]=g)}catch(c){}}return a}return o.get=o.set=o,o.getJSON=function(){return o.apply({json:!0},[].slice.call(arguments))},o.defaults={},o.remove=function(t,n){o(t,"",e(n,{expires:-1}))},o.withConverter=t,o}return t()});var t=function(e){var t={option:[1,"<select multiple='multiple'>","</select>"],legend:[1,"<fieldset>","</fieldset>"],area:[1,"<map>","</map>"],param:[1,"<object>","</object>"],thead:[1,"<table>","</table>"],tr:[2,"<table><tbody>","</tbody></table>"],col:[2,"<table><tbody></tbody><colgroup>","</colgroup></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:[1,"<div>","</div>"]};t.optgroup=t.option,t.tbody=t.tfoot=t.colgroup=t.caption=t.thead,t.th=t.td;var n=document.createElement("div"),o=/<\s*\w.*?>/g.exec(e);if(null!=o){var n,r=o[0].replace(/</g,"").replace(/>/g,""),i=t[r]||t._default;e=i[1]+e+i[2],n.innerHTML=e;for(var a=i[0]+1;a--;)n=n.lastChild}else n.innerHTML=e,n=n.lastChild;return n};!function(){function e(){if(!o.isReady){try{document.documentElement.doScroll("left")}catch(t){return void setTimeout(e,1)}o.ready()}}var t,n,o=function(e,t){},r=(window.jQuery,window.$,!1),i=[];o.fn={ready:function(e){return o.bindReady(),o.isReady?e.call(document,o):i&&i.push(e),this}},o.isReady=!1,o.ready=function(){if(!o.isReady){if(!document.body)return setTimeout(o.ready,13);if(o.isReady=!0,i){for(var e,t=0;e=i[t++];)e.call(document,o);i=null}o.fn.triggerHandler&&o(document).triggerHandler("ready")}},o.bindReady=function(){if(!r){if(r=!0,"complete"===document.readyState)return o.ready();if(document.addEventListener)document.addEventListener("DOMContentLoaded",n,!1),window.addEventListener("load",o.ready,!1);else if(document.attachEvent){document.attachEvent("onreadystatechange",n),window.attachEvent("onload",o.ready);var t=!1;try{t=null==window.frameElement}catch(i){}document.documentElement.doScroll&&t&&e()}}},t=o(document),document.addEventListener?n=function(){document.removeEventListener("DOMContentLoaded",n,!1),o.ready()}:document.attachEvent&&(n=function(){"complete"===document.readyState&&(document.detachEvent("onreadystatechange",n),o.ready())}),window.jQuery=window.$=o}();var n=function(){var e=document.getElementById("block-delta-blocks-logo"),t=highContrast.logoPath;if(document.querySelectorAll&&"undefined"!=typeof t&&null!==e){var n=e.querySelectorAll("img");"undefined"==typeof n[0].logoPathOriginal&&(n[0].logoPathOriginal=n[0].src),n[0].src=t}},o=function(){var e=document.getElementById("block-delta-blocks-logo"),t=highContrast.logoPath;if(document.querySelectorAll&&"undefined"!=typeof t&&null!==e){var n=e.querySelectorAll("img");"undefined"!=typeof n[0].logoPathOriginal&&(n[0].src=n[0].logoPathOriginal)}},r=function(){var o=highContrast.cssFilePath;if("undefined"!=typeof o){var r=document.getElementById("high-contrast-css");null===r&&(r=t('<link type="text/css" id="high-contrast-css" rel="stylesheet" href="'+o+'" media="screen" />')),e.parentNode.insertBefore(r,e.nextSibling)}n(),Cookies.set("highContrastActivated","true","/")},i=function(){var e=document.getElementById("high-contrast-css");null!==e&&e.parentNode.removeChild(e),o(),Cookies.set("highContrastActivated","false","/")},a=function(){var e=Cookies.get("highContrastActivated");return"undefined"==typeof e?!1:"false"===e?!1:!0},d=function(){a()?(i(),Cookies.set("highContrastActivated","false","/")):(r(),Cookies.set("highContrastActivated","true","/"))},c=function(){var e=highContrast.link;e=t(e),e.onclick=function(){return d(),this.blur(),!1},document.getElementById("skip-link").appendChild(e)};drupalHighContrast.enableStyles=r,drupalHighContrast.disableStyles=i,drupalHighContrast.toggleHighContrast=d,a()&&r(),$.fn.ready(function(){a()&&n(),c()})}();

//--><!]]>
</script>
<script type="text/javascript" src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
window.jQuery || document.write("<script src='/sites/all/modules/contrib/jquery_update/replace/jquery/3.3/jquery.min.js'>\x3C/script>")
//--><!]]>
</script>
<script type="text/javascript" src="https://digitalindia.gov.in/misc/jquery.once.js?v=1.2"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/misc/drupal.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/modules/contrib/jquery_update/replace/ui/external/jquery.cookie.js?v=67fb34f6a866c40d0570"></script>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
jQuery(window).load(function(){ jQuery("input[id^='edit-search-block-form']").removeClass('form-control ');jQuery("#search-block-form input[type='submit']").parent('.form-wrapper').contents().unwrap(); });
//--><!]]>
</script>
<script type="text/javascript">
<!--//--><![CDATA[//><!--

(function($) {
  var form = $.fn.form = function() {
    return;
  };
})(jQuery);

//--><!]]>
</script>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
var text_resize_scope = "pageWrapper";
          var text_resize_minimum = "14";
          var text_resize_maximum = "25";
          var text_resize_line_height_allow = 0;
          var text_resize_line_height_min = "16";
          var text_resize_line_height_max = "36";
//--><!]]>
</script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/modules/contrib/text_resize/text_resize.js?rej7ie"></script>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
jQuery(window).load(function(){ jQuery("input[id^='edit-search-block-form']").removeClass('form-control ');jQuery("#search-block-form input[type='submit']").parent('.form-wrapper').contents().unwrap(); });
//--><!]]>
</script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/modules/custom/mod_background_page/js/jquery.fullscreenBackground.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/modules/custom/mod_background_page/js/mod_background.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/modules/custom/mod_block_twitter/theme_twitter/js/jquery.tweet.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/modules/custom/mod_block_twitter/theme_twitter/js/script.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/modules/contrib/password_encrypt/js/password_encrypt.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/libraries/CryptoJS/aes.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/libraries/CryptoJS/aes-json-format.js?rej7ie"></script>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyDmj-tJRlVsYZo7ef4nDIzY8U7t0Sefp_A&amp;libraries=places"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/modules/custom/nd_visualshortcodes/modules/progressive_shortcodes/vendor/circliful/jquery.circliful.min.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/themes/superfine/assets/js/jquery-migrate-3.0.0.min.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/themes/superfine/vendor/bootstrap/bootstrap.min.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/themes/superfine/vendor/modernizr/modernizr.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/themes/superfine/vendor/stellar/jquery.stellar.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/themes/superfine/vendor/slick/slick.min.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/themes/superfine/vendor/jflickrfeed/jquery.jflickrfeed.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/themes/superfine/vendor/magnific/jquery.magnific-popup.min.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/themes/superfine/vendor/waypoints/jquery.waypoints.min.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/themes/superfine/vendor/isotope/isotope.pkgd.min.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/themes/superfine/vendor/imagesloaded/imagesloaded.pkgd.min.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/themes/superfine/vendor/camera/camera.min.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/themes/superfine/vendor/sharree/jquery.sharrre.min.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/themes/superfine/vendor/spectrum/spectrum.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/themes/superfine/vendor/cookie/jquery.cookie.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/themes/superfine/assets/js/assets.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/themes/superfine/assets/js/script.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/themes/superfine/assets/js/active.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/themes/superfine/assets/js/particle.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/themes/superfine/assets/js/swithcer.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/modules/custom/nd_visualshortcodes/modules/progressive_shortcodes/vendor/wow/wow.min.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/modules/custom/nd_visualshortcodes/modules/progressive_shortcodes/js/jquery.easing.1.3.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/modules/custom/nd_visualshortcodes/modules/progressive_shortcodes/vendor/owl_carousel/owl.carousel.min.js?rej7ie"></script>
<script type="text/javascript" src="https://digitalindia.gov.in/sites/all/modules/custom/nd_visualshortcodes/modules/progressive_shortcodes/js/shortcodes_load.js?rej7ie"></script>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
jQuery.extend(Drupal.settings, {"basePath":"\/","pathPrefix":"","ajaxPageState":{"theme":"superfine","theme_token":"zeZxSrBbgIS7aQbtV3-dRpzAgvkKVieK9G9Yp6DZOsE","js":{"0":1,"\/\/code.jquery.com\/jquery-3.3.1.min.js":1,"1":1,"misc\/jquery.once.js":1,"misc\/drupal.js":1,"sites\/all\/modules\/contrib\/jquery_update\/replace\/ui\/external\/jquery.cookie.js":1,"2":1,"3":1,"4":1,"sites\/all\/modules\/contrib\/text_resize\/text_resize.js":1,"5":1,"sites\/all\/modules\/custom\/mod_background_page\/js\/jquery.fullscreenBackground.js":1,"sites\/all\/modules\/custom\/mod_background_page\/js\/mod_background.js":1,"sites\/all\/modules\/custom\/mod_block_twitter\/theme_twitter\/js\/jquery.tweet.js":1,"sites\/all\/modules\/custom\/mod_block_twitter\/theme_twitter\/js\/script.js":1,"sites\/all\/modules\/contrib\/password_encrypt\/js\/password_encrypt.js":1,"sites\/all\/libraries\/CryptoJS\/aes.js":1,"sites\/all\/libraries\/CryptoJS\/aes-json-format.js":1,"\/\/maps.googleapis.com\/maps\/api\/js?key=AIzaSyDmj-tJRlVsYZo7ef4nDIzY8U7t0Sefp_A\u0026libraries=places":1,"sites\/all\/modules\/custom\/nd_visualshortcodes\/modules\/progressive_shortcodes\/vendor\/circliful\/jquery.circliful.min.js":1,"sites\/all\/themes\/superfine\/assets\/js\/jquery-migrate-3.0.0.min.js":1,"sites\/all\/themes\/superfine\/vendor\/bootstrap\/bootstrap.min.js":1,"sites\/all\/themes\/superfine\/vendor\/modernizr\/modernizr.js":1,"sites\/all\/themes\/superfine\/vendor\/stellar\/jquery.stellar.js":1,"sites\/all\/themes\/superfine\/vendor\/slick\/slick.min.js":1,"sites\/all\/themes\/superfine\/vendor\/jflickrfeed\/jquery.jflickrfeed.js":1,"sites\/all\/themes\/superfine\/vendor\/magnific\/jquery.magnific-popup.min.js":1,"sites\/all\/themes\/superfine\/vendor\/waypoints\/jquery.waypoints.min.js":1,"sites\/all\/themes\/superfine\/vendor\/isotope\/isotope.pkgd.min.js":1,"sites\/all\/themes\/superfine\/vendor\/imagesloaded\/imagesloaded.pkgd.min.js":1,"sites\/all\/themes\/superfine\/vendor\/camera\/camera.min.js":1,"sites\/all\/themes\/superfine\/vendor\/sharree\/jquery.sharrre.min.js":1,"sites\/all\/themes\/superfine\/vendor\/spectrum\/spectrum.js":1,"sites\/all\/themes\/superfine\/vendor\/cookie\/jquery.cookie.js":1,"sites\/all\/themes\/superfine\/assets\/js\/assets.js":1,"sites\/all\/themes\/superfine\/assets\/js\/script.js":1,"sites\/all\/themes\/superfine\/assets\/js\/active.js":1,"sites\/all\/themes\/superfine\/assets\/js\/particle.js":1,"sites\/all\/themes\/superfine\/assets\/js\/swithcer.js":1,"sites\/all\/modules\/custom\/nd_visualshortcodes\/modules\/progressive_shortcodes\/vendor\/wow\/wow.min.js":1,"sites\/all\/modules\/custom\/nd_visualshortcodes\/modules\/progressive_shortcodes\/js\/jquery.easing.1.3.js":1,"sites\/all\/modules\/custom\/nd_visualshortcodes\/modules\/progressive_shortcodes\/vendor\/owl_carousel\/owl.carousel.min.js":1,"sites\/all\/modules\/custom\/nd_visualshortcodes\/modules\/progressive_shortcodes\/js\/shortcodes_load.js":1},"css":{"modules\/system\/system.base.css":1,"modules\/system\/system.menus.css":1,"modules\/system\/system.messages.css":1,"modules\/system\/system.theme.css":1,"modules\/comment\/comment.css":1,"sites\/all\/modules\/contrib\/date\/date_api\/date.css":1,"sites\/all\/modules\/contrib\/date\/date_popup\/themes\/datepicker.1.7.css":1,"modules\/field\/theme\/field.css":1,"modules\/node\/node.css":1,"modules\/search\/search.css":1,"modules\/user\/user.css":1,"sites\/all\/modules\/contrib\/views\/css\/views.css":1,"sites\/all\/modules\/contrib\/ckeditor\/css\/ckeditor.css":1,"sites\/all\/modules\/contrib\/ctools\/css\/ctools.css":1,"sites\/all\/modules\/contrib\/high_contrast\/high_contrast.css":1,"sites\/all\/modules\/contrib\/panels\/css\/panels.css":1,"sites\/all\/modules\/contrib\/text_resize\/text_resize.css":1,"sites\/all\/modules\/custom\/mod_background_page\/css\/mod_background.css":1,"sites\/all\/modules\/custom\/nd_visualshortcodes\/modules\/progressive_shortcodes\/css\/animate_progressive.css":1,"sites\/all\/modules\/custom\/nd_visualshortcodes\/modules\/progressive_shortcodes\/css\/shortcodes.css":1,"sites\/all\/modules\/custom\/nd_visualshortcodes\/modules\/progressive_shortcodes\/vendor\/circliful\/jquery.circliful.css":1,"sites\/all\/modules\/custom\/nd_visualshortcodes\/modules\/progressive_shortcodes\/vendor\/owl_carousel\/owl.carousel.css":1,"sites\/all\/modules\/custom\/nd_visualshortcodes\/modules\/progressive_shortcodes\/vendor\/owl_carousel\/owl.theme.css":1,"sites\/all\/modules\/custom\/nd_visualshortcodes\/modules\/progressive_shortcodes\/vendor\/owl_carousel\/owl.transitions.css":1,"sites\/all\/libraries\/fontawesome\/css\/font-awesome.css":1,"sites\/all\/themes\/superfine\/vendor\/bootstrap\/css\/bootstrap.min.css":1,"sites\/all\/themes\/superfine\/vendor\/FontAwesome\/font-awesome.min.css":1,"sites\/all\/themes\/superfine\/vendor\/linea_icons\/css\/linea_icons.css":1,"sites\/all\/themes\/superfine\/vendor\/animation\/css\/animation.css":1,"sites\/all\/themes\/superfine\/vendor\/animsition\/css\/animsition.min.css":1,"sites\/all\/themes\/superfine\/vendor\/slick\/slick.css":1,"sites\/all\/themes\/superfine\/vendor\/magnific\/magnific-popup.css":1,"sites\/all\/themes\/superfine\/vendor\/camera\/camera.css":1,"sites\/all\/themes\/superfine\/vendor\/sharree\/sharrre.css":1,"sites\/all\/themes\/superfine\/assets\/revolution\/css\/layers.css":1,"sites\/all\/themes\/superfine\/assets\/css\/assets.css":1,"sites\/all\/themes\/superfine\/assets\/css\/style.css":1}},"mod_block_animation":{"disable_mobile":false},"urlIsAjaxTrusted":{"\/home.html":true},"twitter_account":"cmsbluetheme","twitter_num":"5","password_encrypt":{"password_encrypt_passkey":"c739f95988e1ea81d17b74c15230db7c"},"baseTheme":"sites\/all\/themes\/superfine","superfine":{"page_transition":0,"tools_switcher":0,"theme_color":"light","color_skin":"12","layout":"wide","style_shapes":"new-angle","box_background":"","box_background_img":"","rtl_layout":0,"logo":"https:\/\/digitalindia.gov.in\/writereaddata\/files\/Headerlogo_0.png","logo_sticky":"https:\/\/digitalindia.gov.in\/writereaddata\/files\/superfine\/Headerlogo.png"},"clientsideValidation":{"general":{"months":{"January":1,"Jan":1,"February":2,"Feb":2,"March":3,"Mar":3,"April":4,"Apr":4,"May":5,"June":6,"Jun":6,"July":7,"Jul":7,"August":8,"Aug":8,"September":9,"Sep":9,"October":10,"Oct":10,"November":11,"Nov":11,"December":12,"Dec":12}}}});
//--><!]]>
</script>
</body>

</html>