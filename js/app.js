//we need a clock in here and it should be ticking
$(function () {
	var austDay = new Date(2011, 5, 1, 9, 0, 0, 0);
	$('#countdown').countdown({until: austDay});
	$('#year').text(austDay.getFullYear());
});

$(document).ready(function(){
	visibleBool = true;
	var numberElements = $('.dialog').length;
	var sideBorders;

	var centre = {
		width: window.innerWidth/2,
		height: window.innerHeight / 2
	}	
	
	//lets handle screen ratio and dialog positioning
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
	
	
	//LETS HANDLE EVERYTHING WITH SCALING BROWSERS   
    $(window).resize(function(){
    
    //create the size of the white bars on either side
    sideBorders = (window.innerWidth - parseFloat($('#wrapper').css('width').split("px")[0]))/2;
    $('.sides').css({'width':sideBorders});
    
    //and sort out the positioning of the scrollable backgrounds on resize
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
	
	
	//lets distribute our dialog boxes relative to their optimum designed position
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
    
    
    //and we'll handle clicking to view a story on the background image
	$('#button').click( function(){	
	var fadeTime = 500;
			if(visibleBool == true){
				for (n=1;n<=numberElements;n++){
					$('#dialog' + n).parent().fadeOut(fadeTime);
				}
				$('#contentContainer').load('ajaxContent/content' + activeBG + '.html');
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
	
	
	//we'll handle repositioning the backgrounds on resize so they stay touching
	var numberBGS = $('.bg_img').length;
	var activeBG = 1;		
	$('#up').click( function(){
		if(activeBG < numberBGS){
		for (n=1;n<=numberBGS;n++){
			$('#background' + n).animate({'top':parseFloat($('#background' + n).css('top').split("px")[0]) - parseFloat($('#background' + activeBG).css('height').split("px")[0]) + "px"}, 1000)
		}
		activeBG = activeBG + 1;
		$('#background' + (activeBG - 1)).attr('src','img/bg_image' + (activeBG - 1) + '.jpg');
		$('#background' + (activeBG + 1)).attr('src','img/bg_image' + (activeBG + 1) + '.jpg');
		$('#background' + (activeBG - 1)).fullBg();
		$('#background' + (activeBG + 1)).fullBg();
		if(visibleBool == false){
			$('#contentContainer').fadeOut(500, function(){			
				$('#contentContainer').load('ajaxContent/content' + activeBG + '.html', function(){
					$('#contentContainer').fadeIn(500);
				});
			});
		}
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
		if(visibleBool == false){
			$('#contentContainer').fadeOut(500, function(){			
				$('#contentContainer').load('ajaxContent/content' + activeBG + '.html', function(){
					$('#contentContainer').fadeIn(500);
				});
			});
		}
	}
	else{
		alert('at top');
	}
	})
	
	/////END OF DEALING WITH SCREEN RESIZING
	
	//////KEY HANDLING FOR STORY
	$(document).keydown(function(event) {
  
  	/////////LEFT ARROW ///////////
  	if (event.keyCode == '37') {
  		var numberElements = $('.dialog').length;
		event.preventDefault();
        var fadeTime = 500;
		if(visibleBool == true){
			for (n=1;n<=numberElements;n++){
				$('#dialog' + n).parent().fadeOut(fadeTime);
			}
		$('#contentContainer').load('ajaxContent/content' + activeBG + '.html');
		$('#slideContent').css({'display':'block','left':window.innerWidth}).delay(fadeTime);
		$('#slideContent').animate({'left': (window.innerWidth - ($('#slideContent').css('width').split("px"))[0]) / 2}, fadeTime).delay(fadeTime);
		$('#button').html('<p>close me</p>');
		visibleBool = false;
		} 
   }
   
   ////////ESCAPE ///////////
   if (event.keyCode == '27') {	
   	 var numberElements = $('.dialog').length;
     event.preventDefault();
             var fadeTime = 500;

     for (n=1;n<=numberElements;n++){
		$('#dialog' + n).parent().delay(fadeTime).fadeIn(fadeTime);
	}
	$('#slideContent').animate({'left': window.innerWidth}, fadeTime, function() {$('#slideContent').css({'display':'none'});});
	$('#button').html('<p>open me</p>');
	visibleBool = true;
   }
   });
	
	/////WE'LL SORT OUT THE CREATION OF THE DIALOG BOXES AND THEIR INITIAL OPTIMUM POSITION
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
                
                //lets position them
                for (n=1;n<=numberElements;n++){
					$('#dialog' + n).parent().css({'left':centre.width - (parseFloat($('#dialog' + n).parent().css('width').split("px")[0])/2) + (offsets[n].x * widthRatio), 'top':centre.height - (parseFloat($('#dialog' + n).parent().css('height').split("px")[0])/2) + (offsets[n].y * heightRatio)});
				}                
            });	
});



//we'll sort out the background image on window load so we have the images to deal with
$(window).load(function() {
	var numberBGS = $('.bg_img').length;
	for (n=1;n<=numberBGS;n++){
		$('#background' + n).css({'top':(parseFloat($('#background1').css('height').split("px")[0]) * (n - 1)) + "px"});
		$("#background" + n).fullBg();
		$('#background' + n).css({'height': parseFloat($('#background1').css('height').split("px")[0])});
	}
	$('#background2').attr('src','img/bg_image2.jpg');
});