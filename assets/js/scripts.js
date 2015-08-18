$(document).ready(function(){

/*-------------------
---	TOP MENU SCROLL (https://github.com/ChrisWojcik/single-page-nav)----
-------------------*/
	// Prevent console.log from generating errors in IE for the purposes of the demo
    if( ! window.console ) console = { log: function(){} };

    $('.topmenu').singlePageNav({
        offset: $('.topmenu').outerHeight(),
        filter: ':not(.external)',
        threshold: 100,
        speed: 600,
        updateHash: false,
        currentClass: "active"
    });
//-------------TOP MENU HIGHLIGHTING---------------------------	
	$('.topmenu li').click(function()
	{
		$('.topmenu li').removeClass('active');
		$(this).addClass('active');
	});

//-------------PROGRESS BAR effect-----------------------------

	$('.progress .progress-bar').progressbar();

//-------------IF JS ENABLED-----------------------------------

	// hide block if JS doesnt enabled
	$(".ifjsenabled").attr('id','aboutme');

//-------------CONTACT FORM------------------------------------

	// if JS enabled we hide contact form
	$('.contactformblock').css({"display":"none"});

	// click link to show/hiddde and reset contact form
	$('#letswrite a').click(function(e)
	{
		e.preventDefault();

		var linkText = $('#letswrite a').text();
		
		if(linkText == 'написать письмо')
		{
			$('#letswrite a').text('отказаться');
		}
		else
		{
			$('#letswrite a').text('написать письмо');
			document.getElementById("contactform").reset();
		}

		$('.contactformblock').slideToggle("slow");

	});

	// reset form if press "Отказаться" button
	$('#resetButton').click(function(e)	
	{
		e.preventDefault();
		document.getElementById("contactform").reset();
		$('#letswrite a').text('написать письмо');
		$('.contactformblock').slideToggle("slow");
	});


	// var errorIn = erroriE = erroriC = errorIt = true;
	// $("#inputName").keypress(function()
	// {
	//    	if ($("#inputName").val() != "") errorIn = false;
	//  	});
	//  	$("#inputEmail").keypress(function()
	// {
	//    	if ($("#inputEmail").val() != "") errorIe = false;
	//  	});
	//  	$("#inputCode").keypress(function()
	// {
	//    	if ($("#inputCode").val() != "") errorIc = false;
	//  	});
	//  	$("#inputText").keypress(function()
	// {
	//    	if ($("#inputText").val() != "") errorIt = false;
	//  	});

	// if ((errorIn == true) && (erroriE = true) && (erroriC =true) && (errorIt = true)) { }

	// send email message via AJAX

	$("#contactform").submit(function(e)
	{
		e.preventDefault();
		
		var inputName = $("#inputName").val();
		var inputEmail = $("#inputEmail").val();
		var inputCode = $("#inputCode").val();
		var inputText = $("#inputText").val();
		var jsenabled = true;

		// check length of textarea
		if((inputText.length > 10) && (inputText.length < 500))
		{
			var form_data = {inputName:inputName, inputEmail:inputEmail, inputCode:inputCode, inputText:inputText, jsenabled:jsenabled};
		
			$.ajax({
				url : "assets/php/email.php",
				type : 'POST',
				data : form_data,
				success : function(data)
				{
					if($(data).filter('#sendResult').text() == "success")
					{
						$('.mailmessage').html('<div class="success"><p>Ваше сообщение отправлено!</p></div>');
						$('.mailmessage').fadeIn("slow").delay(5000).fadeOut("slow");
						document.getElementById("contactform").reset();
					}
					if($(data).filter('#sendResult').text() == "error")
					{
						$('.mailmessage').html('<div class="error"><p>Вы не верно заполнили форму!</p></div>');
						$('.mailmessage').fadeIn("slow").delay(5000).fadeOut("slow");
					}
					
				},
				error: function()
				{
					$('.mailmessage').html('<div class="error"><p>Проблема с сервером! Повторите попозже!</p></div>');
					$('.mailmessage').fadeIn("slow").delay(5000).fadeOut("slow");
				}
			});

		}
		else
		{
			if(inputText.length < 10)
			{
				$( "#inputText" ).after('<span class="errortextarea">Ваше сообщение слишком короткое!</span>');
				$('.errortextarea').fadeIn("slow").delay(5000).fadeOut("slow");
			}
			
			if(inputText.length > 500)
			{
				$( "#inputText" ).after('<span class="errortextarea">Ваше сообщение слишком длинное!</span>');
				$('.errortextarea').fadeIn("slow").delay(5000).fadeOut("slow");
			}
		}
	});

//---------------------------------------------------

});