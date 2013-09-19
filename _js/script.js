var registration = { 
    init : function() {
	    $("#registration").submit(function(event) {
	    	event.preventDefault();
			var email = $(this).find("#email").val();
			var name = $(this).find("#name").val();
			var state = $(this).find("#state").val();
	    	request = $.ajax({
	    		url: $("#registration").attr("action") + "?ajax=true",
	    		type: "POST",
	    		data: $("#registration").serialize()
	    	});
	    	request.done(function() {
		    });
		    request.fail(function() {
		    	alert("error");
		    });
		    request.always(function() {
				return false;
			});

			$("#register").fadeOut(100);

			// change the hidden email input to the registrant's email address
			$("#questions li").each(function() {
				var email = $("#registration #email").val();
				$(this).find("input.email").val(email);
			});
			setTimeout(function() {questions.init()}, 200);
	    });
    }
};



var questions = {
	
	init: function() {
		$("#questions").fadeIn(100);
		$("#questions li:first").fadeIn(100);
		questions.submit();
		questions.options();
	},
	
	submit: function() {
		
		var q = $("#questions li").length;
		var count = 0;
		var email = $("#email").val();
	   
		$("#questions form.survey-questions").submit(function(event) {
	    	event.preventDefault();
	    	request = $.ajax({
	    		url: $(this).attr("action") + "?ajax=true",
	    		type: "POST",
	    		data: $(this).serialize()
	    	});
	    	request.done(function() {
		    });
		    request.fail(function() {
		    	alert("error");
		    });
		    request.always(function() {
				return false;
			});

			count++;
			if (count < q) {
				$(this).parent().fadeOut(100);
				$(this).parent().next().delay(100).fadeIn(100);
			} else {
				$(this).parent().fadeOut(100);
				$("#thanks").delay(100).fadeIn(100);
			};
			return false;

	    });

	},
	
	options: function() {
		$("#q-affiliation").change(function() {
			if ($("#q-affiliation-04").is(":checked")) {
				$("#q-affiliation-other").show();
			} else {
				$("#q-affiliation-other").hide();
			};
		});
	}	

};



$(document).ready(function() {
	registration.init();
});

$(window).resize(function() {
});