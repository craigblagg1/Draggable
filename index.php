
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>Westfield Stratford</title>
<script type="text/javascript" src="js/jquery-1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.fullbg.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/style.css">
<style type="text/css">
html{overflow: hidden;}

</style>
<!-- clock - home page only -->
<style type="text/css">
@import "css/jquery.countdown.css";
#countdown { width: 240px; height: 25px; }
</style>

<script type="text/javascript" src="js/jquery.countdown.js"></script>
<script type="text/javascript">
$(function () {
	var austDay = new Date(2011, 5, 1, 9, 0, 0, 0);
	$('#countdown').countdown({until: austDay});
	$('#year').text(austDay.getFullYear());
});
</script>


<script type="text/javascript">


$(document).ready(function(){
	visibleBool = true;
		
	var numberElements = $('.dialog').length;

	var centre = {
		width: window.innerWidth/2,
		height: window.innerHeight / 2
	}	
	
	var width = 1280;
	var height = 950;
	
	var widthRatio = window.innerWidth/width;
	var heightRatio = window.innerHeight/height;
	
	var maxRatio = 1.2;
	if (widthRatio >= maxRatio){
		widthRatio = maxRatio;
	}
	if (heightRatio >= maxRatio){
		heightRatio = maxRatio;
	}
	
	var sideBorders;
	    
    $(window).resize(function(){
    sideBorders = (window.innerWidth - parseFloat($('#wrapper').css('width').split("px")[0]))/2;
    $('.sides').css({'width':sideBorders});
    
    for (n=1;n<=numberBGS;n++){
        	$('#background' + n).css({'height': parseFloat($('#background1').css('height').split("px")[0])});
    		if (n < activeBG){
    		    $('#background' + n).css({'top': (parseFloat($('#background1').css('height').split("px")[0]) * (n - activeBG)) + "px"});
    		}
    		if (n == activeBG){
    		}
    		if (n > activeBG){
    		    $('#background' + n).css({'top': ((parseFloat($('#background' + activeBG).css('top').split("px")[0]) + parseFloat($('#background' + activeBG).css('height').split("px")[0])) * (n - activeBG)) + "px"});
    		}

	}
    centre.width = window.innerWidth/2;
    centre.height = window.innerHeight/2;
    widthRatio = window.innerWidth/width;
	heightRatio = window.innerHeight/height;
	if (widthRatio >= maxRatio){
		widthRatio = maxRatio;
	}
	if (heightRatio >= maxRatio){
		heightRatio = maxRatio;
	}
    
    for (n=1;n<=numberElements;n++){
		$('#dialog' + n).parent().css({'left':centre.width - (parseFloat($('#dialog' + n).parent().css('width').split("px")[0])/2) + (offsets[n].x * widthRatio), 'top':centre.height - (parseFloat($('#dialog' + n).parent().css('height').split("px")[0])/2) + (offsets[n].y * heightRatio)});
		}
    
    });
    
	$('#button').click( function(){	
	var fadeTime = 500;
			if(visibleBool == true){
				//$('.dialog').parent().fadeOut(500);
				for (n=1;n<=numberElements;n++){
					$('#dialog' + n).parent().fadeOut(fadeTime);
				}
				$('#slideContent').load('ajaxContent/content' + activeBG + '.html');
				$('#slideContent').css({'display':'block','left':window.innerWidth}).delay(fadeTime);
				$('#slideContent').animate({'left': (window.innerWidth - ($('#slideContent').css('width').split("px"))[0]) / 2}, fadeTime).delay(fadeTime);
				$('#button').html('<p>close me</p>');
				visibleBool = false;
			}
			else{
				//$('.dialog').parent().fadeIn(500);
				for (n=1;n<=numberElements;n++){
					$('#dialog' + n).parent().delay(fadeTime).fadeIn(fadeTime);
				}
				$('#slideContent').animate({'left': window.innerWidth}, fadeTime, function() {$('#slideContent').css({'display':'none'});});
				$('#button').html('<p>open me</p>');
				visibleBool = true;
			}
	});
	
	var numberBGS = $('.bg_img').length;
	var activeBG = 1;		
		
	$('#up').click( function(){
	if(activeBG < numberBGS){
	for (n=1;n<=numberBGS;n++){
		$('#background' + n).animate({'top':parseFloat($('#background' + n).css('top').split("px")[0]) - parseFloat($('#background' + activeBG).css('height').split("px")[0]) + "px"}, 1000)
		//alert($('#background' + n).css('top'));
	}
	activeBG = activeBG + 1;
	$('#background' + (activeBG - 1)).attr('src','img/bg_image' + (activeBG - 1) + '.jpg');
	$('#background' + (activeBG + 1)).attr('src','img/bg_image' + (activeBG + 1) + '.jpg');
	$('#background' + (activeBG - 1)).fullBg();
	$('#background' + (activeBG + 1)).fullBg();
	}
	else{
		alert('you are at the bottom');
	}
	})
	
	$('#down').click( function(){
	if (activeBG > 1){
	for (n=1;n<=numberBGS;n++){
		$('#background' + n).animate({'top':parseFloat($('#background' + n).css('top').split("px")[0]) + parseFloat($('#background' + activeBG).css('height').split("px")[0]) + "px"}, 1000)
	}
	activeBG = activeBG - 1;
	$('#background' + (activeBG - 1)).attr('src','img/bg_image' + (activeBG - 1) + '.jpg');
	$('#background' + (activeBG + 1)).attr('src','img/bg_image' + (activeBG + 1) + '.jpg');
	$('#background' + (activeBG - 1)).fullBg();
	$('#background' + (activeBG + 1)).fullBg();
	}
	else{
		alert('at top');
	}
	})

	var offsets = [
					// we dont use this first one to keep numbers correct
					{
						x: 0,
						y: 0,
						maxX: 0,
						maxY: 0
					},
					// we do from here
					{
						x: -273,
						y: -166,
						maxX: -50,
						maxY: 200
					},
					{
						x: -245,
						y: 203,
						maxX: -20,
						maxY: 100
					},
					{
						x: 56,
						y: -180,
						maxX: 40,
						maxY: 10
					},
					{
						x: 293,
						y: -246,
						maxX: 80,
						maxY: 120
					},
					{
						x: 390,
						y: -39,
						maxX: 200,
						maxY: -50
					},
					{
						x: 383,
						y: 261,
						maxX: 100,
						maxY: -80
					},
					{
						x: 78,
						y: 325,
						maxX: 300,
						maxY: 100
					},
					{
						x: 95,
						y: 44,
						maxX: 320,
						maxY: -10
					},
					
				]	
	
	$(function(){
                // Dialog
                
                $('#dialog1').dialog({
                    autoOpen: true,
                    width: 379,
                    height: 323,
                    position: [0,0],
                    resizable: false,
					dialogClass:'dialog-class1'
                });

                $('#dialog2').dialog({
                    autoOpen: true,
                    width: 378,
                    height: 304,
                    position: [0,0],
                    resizable: false,
					dialogClass:'dialog-class2'
                });
				
                $('#dialog3').dialog({
                    autoOpen: true,
                    width: 347,
                    height: 90,
                    position: [0,0],
                    resizable: false,
					dialogClass:'dialog-class3'
                });
                
                $('#dialog4').dialog({
                    autoOpen: true,
                    width: 279,
                    height: 149,
                    position: [0,0],
                    resizable: false,
					dialogClass:'dialog-class4'
                });
                $('#dialog5').dialog({
                    autoOpen: true,
                    width: 248,
                    height: 237,
                    position: [0,0],
                    resizable: true,
					dialogClass:'dialog-class5'
                });
                $('#dialog6').dialog({
                    autoOpen: true,
                    width: 297,
                    height: 168,
                    position: [0,0],
                    resizable: false,
					dialogClass:'dialog-class6'
                });
                $('#dialog7').dialog({
                    autoOpen: true,
                    width: 288,
                    height: 213,
                    position: [0,0],
                    resizable: false,
					dialogClass:'dialog-class7'
                });
                $('#dialog8').dialog({
                    autoOpen: true,
                    width: 328,
                    height: 332,
                    position: [0,0],
                    resizable: false,
					dialogClass:'dialog-class8'
                });           
                
                for (n=1;n<=numberElements;n++){
					$('#dialog' + n).parent().css({'left':centre.width - (parseFloat($('#dialog' + n).parent().css('width').split("px")[0])/2) + (offsets[n].x * widthRatio), 'top':centre.height - (parseFloat($('#dialog' + n).parent().css('height').split("px")[0])/2) + (offsets[n].y * heightRatio)});
				}                
            });	
});
</script>

<style type="text/css">
/*demo page css*/
#dialog_link {
	padding: 0;
	text-decoration: none;
	position: relative;
}


.ui-dialog {
	border:1px solid black;
}

#dialog1 {
	background:red;
}
#dialog2 {
	background:gainsboro;
}
#dialog3 {
	background:#000;
}
#dialog4 {
	background:#6fcdf4;
}
#dialog5 {
	background:gainsboro;
}
#dialog6 {
	background:gainsboro;
}
#dialog7 {
	background:gainsboro;
}
#dialog8 {
	background:gainsboro;
}

/*title bar*/
</style>
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />

</head>
<body>
<nav class="clearfix">
	<ul id="navigation">
		<li id="nav1"> <a href="#"> Home </a>
			<ul>
				<li> <a href="#"> Sub nav </a> </li>

				<li> <a href="#"> Sub nav </a> </li>
			</ul>
		</li>
		<li id="nav2"> <a href="#"> What's Here </a>
			<ul>

				<li> <a href="#"> Sub nav </a> </li>
				<li> <a href="#"> Sub nav </a> </li>
				<li> <a href="#"> Sub nav </a> </li>

			</ul>
		</li>
		<li id="nav3"> <a href="#"> Celebrating Reinvention </a>
			<ul>
				<li> <a href="#"> Sub nav </a> </li>

				<li> <a href="#"> Sub nav </a> </li>
				<li> <a href="#"> Sub nav </a> </li>
				<li> <a href="#"> Sub nav </a> </li>

				<li> <a href="#"> Sub nav </a> </li>
				<li> <a href="#"> Sub nav </a> </li>
			</ul>
		</li>
		<li id="nav4"> <a href="#"> Explore the Area </a>

			<ul>
				<li> <a href="#"> Sub nav </a> </li>
				<li> <a href="#"> Sub nav </a> </li>
				<li> <a href="#"> Sub nav </a> </li>

			</ul>
		</li>
		<li id="nav5"> <a href="#"> Get the List </a>
			<ul>
				<li> <a href="#"> Sub nav </a> </li>

				<li> <a href="#"> Sub nav </a> </li>
				<li> <a href="#"> Sub nav </a> </li>
			</ul>
		</li>
	</ul>

</nav>
<div id="maincontent">
	<div id="wrapper">
		<div id="content">
			<div id="dialog1" class="dialog" title="d1">
				<img src="fashion.jpg">
			</div>
			<!-- /dialog -->
			<div id="dialog2" class="dialog" title="d2">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

			</div>
			<!-- /dialog -->
			<div id="dialog3" class="dialog" title="d3">
				<div id="countdown">
					here ...
				</div>
			</div>
			<!-- /dialog -->
			<div id="dialog4" class="dialog" title="d4">

				<div id="countdown">
					here ...
				</div>
			</div>
			<!-- /dialog -->
			<div id="dialog5" class="dialog" title="d5">
				<div id="countdown">
					here ...
				</div>
			</div>

			<!-- /dialog -->
			<div id="dialog6" class="dialog" title="d6">
				<div id="countdown">
					here ...
				</div>
			</div>
			<!-- /dialog -->
			<div id="dialog7" class="dialog" title="d7">
				<div id="countdown">

					here ...
				</div>
			</div>
			<!-- /dialog -->
			<div id="dialog8" class="dialog" title="d8">
				<div id="countdown">
					here ...
				</div>
			</div>
			<!-- /dialog -->

		</div>
			<!-- /content -->
	</div>
			<!-- /wrapper -->
	<img src="img/bg_image1.jpg" alt="" id="background1" class="bg_img"/>
<img src="" alt="" id="background2" class="bg_img"/>
<img src="" alt="" id="background3" class="bg_img"/>
<img src="" alt="" id="background4" class="bg_img"/>
<img src="" alt="" id="background5" class="bg_img"/>		
		
	<div id="slideContent"></div>
			<!-- /slideContent -->
	<div id="up">
		<p>up</p>
	</div>
	<div id="down">
		<p>down</p>
	</div>
	
	<div id="button">
		<p>open me</p>
	</div>

			<!-- /button -->
			

</div>
<footer>
	<p>This is the footer area</p>
</footer>
			<!-- /footer -->
<script type="text/javascript">
$(window).load(function() {
	//$("#background1").fullBg();		
	var numberBGS = $('.bg_img').length;
	for (n=1;n<=numberBGS;n++){
			$('#background' + n).css({'top':(parseFloat($('#background1').css('height').split("px")[0]) * (n - 1)) + "px"});
			$("#background" + n).fullBg();
			
			$('#background' + n).css({'height': parseFloat($('#background1').css('height').split("px")[0])});

	}

	$('#background2').attr('src','img/bg_image2.jpg');

});

</script>
</body>
</html>