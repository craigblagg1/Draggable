<!DOCTYPE html> 
<html> 
<head> 
<title>Westfield Stratford</title> 
<script type="text/javascript" src="js/jquery-1.5.2.min.js"></script> 
<script type="text/javascript" src="js/jquery-ui-1.8.8.custom.min.js"></script>  
<script type="text/javascript" src="js/jquery.ui.multidraggable-1.8.8.js"></script>  
<link type="text/css" rel="stylesheet" href="css/style.css" />

<script type="text/javascript">
$(document).ready(function(){
	$('.module').addClass('draggable');	
	
	$(function() {
		$(".draggable").multidraggable();
	});
	
	var numberElements = $('#content').children().length;
	var numberNavElements = $('#navigation').children().length;
	var navWidth = (window.innerWidth - 150)/numberNavElements;
	//alert(navWidth);
	
	document.body.onresize = function(){
		navWidth = (window.innerWidth - 150)/6;
		for (n=1;n<=6;n++){
			$('#nav' + n).css({'width':navWidth});
		}
	};
	for (n=1;n<=numberNavElements;n++)
	{
		$('#nav'+ n).css({'width':navWidth});
	}
	var availableWidth = window.innerWidth - (numberNavElements * navWidth) - 30;
	var depth = numberElements;
	var i=0;
	var left=0;
	var top=0;
	var rightMargin = 0;
	var goUnderBool = false;
	var width=$('#wrapper').css('width').split("px");
	for (i=0;i<=numberElements;i++)
	{
		left = Math.floor(Math.random() * width[0]);
		top = Math.floor(Math.random() * window.innerHeight);
		if (left + parseFloat($('#'+i).css('width')) >= parseFloat(width[0])){
			left = width - $('#'+i).css('width');
		}
		if (top + parseFloat($('#'+i).css('height')) >= window.innerHeight){
			top = window.innerHeight - $('#'+i).css('height');
		}
		$('#' + i).css({'left':left,'top':top})
	}
	
	for (n=1;n<=numberNavElements;n++)
	{
		availableWidth = availableWidth - rightMargin;
		
		var offset = Math.floor(Math.random() * 2);
		if (offset == 0 || n == 1){
			rightMargin = Math.floor(Math.random() * availableWidth);
		}
		
		var topMargin = parseFloat(($('#nav' + n).css('height').split("px"))[0]) + parseFloat(($('#nav' + n).css('marginTop').split("px"))[0]);
		
		if (offset == 1 && n > 1 && goUnderBool == false){
			$('#nav' + n).css({'marginTop':topMargin});
			
			var goUnder = Math.floor(Math.random() * 2);
			if (goUnder == 1 && goUnderBool == false && n > 1){
				var leftMargin = parseFloat(($('#nav' + n).css('width').split("px"))[0]);
				newLeftMargin = leftMargin * -1 - rightMargin;
				$('#nav' + n).css({'marginLeft':newLeftMargin, 'marginRight':rightMargin});
			}
			goUnderBool = true;

		}	
		else{
			goUnderBool = false;
			rightMargin = Math.floor(Math.random() * availableWidth);
			$('#nav' + n).css({'marginRight':rightMargin});
		}
	}
	
	
	$('.draggable').mousedown(function(e){
		$('#' + e.target.id).css({'z-index':depth});
		depth = depth + 1;
	});
});
</script>

</head>
<body>
<div id="navigation">
	<li id="nav1">
		<a href="#">Nav 1</a>
		<ul>
			<li><a href="#">Sub nav</a></li>
			<li><a href="#">Sub nav</a></li>
		</ul>
	</li>
	<li id="nav2">
		<a href="#">Navigation 2</a>
		<ul>
			<li><a href="#">Sub nav</a></li>
			<li><a href="#">Sub nav</a></li>
			<li><a href="#">Sub nav</a></li>
		</ul>
	</li>
	<li id="nav3">
		<a href="#">Nav 3</a>
		<ul>
			<li><a href="#">Sub nav</a></li>
			<li><a href="#">Sub nav</a></li>
			<li><a href="#">Sub nav</a></li>
			<li><a href="#">Sub nav</a></li>
			<li><a href="#">Sub nav</a></li>
			<li><a href="#">Sub nav</a></li>
		</ul>
	</li>
	<li id="nav4">
		<a href="#">Nav 4</a>
		<ul>
			<li><a href="#">Sub nav</a></li>
			<li><a href="#">Sub nav</a></li>
			<li><a href="#">Sub nav</a></li>
		</ul>
	</li>
	<li id="nav5">
		<a href="#">Nav 5</a>
		<ul>
			<li><a href="#">Sub nav</a></li>
			<li><a href="#">Sub nav</a></li>
			<li><a href="#">Sub nav</a></li>
		</ul>
	</li>
	<li id="nav6">
		<a href="#">Nav 6</a>
		<ul>
			<li><a href="#">Sub nav</a></li>
			<li><a href="#">Sub nav</a></li>
		</ul>
	</li>
</div>

<div class="clearfix"></div>

<div id="wrapper">
<div id="content">
	<div id="1" class="module"></div>
	<div id="2" class="module"></div>
	<div id="3" class="module"></div>
	<div id="4" class="module"></div>
	<div id="5" class="module"></div>
	<div id="6" class="module"></div>
	<div id="7" class="module"></div>
	<div id="8" class="module"></div>
	<div id="9" class="module"></div>
	<div id="10" class="module"></div>
	<div id="11" class="module"></div>
	<div id="12" class="module"></div>
	<div id="13" class="module"></div>
	<div id="14" class="module"></div>
</div>
</div>
</body>
</html>