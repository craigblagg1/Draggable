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
	$('#content div').addClass('draggable');	
	
	$(function() {
		$(".draggable").multidraggable();
	});
	
	var numberElements = $('#content').children().length;
	var depth = numberElements;
	var i=0;
	var left=0;
	var top=0;
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
	
	$('.draggable').mousedown(function(e){
		$('#' + e.target.id).css({'z-index':depth});
		depth = depth + 1;
	});
});
</script>

</head>
<body>
<div id="wrapper">
<div id="navigation"></div>
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
</body>
</html>