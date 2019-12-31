 $(document).ready(function(){
        $('#submit').click(function(e){
            
            //Stop form submission & check the validation
            e.preventDefault();
            
            // Variable declaration
            var error = false;
            var name = $('#name').val();
            var email = $('#email').val();
			var number = $('#number').val();
            var date = $('#date').val();
            var location = $('#location').val();
            var reference = $('#reference').val();
			
			$('#name,#email,#numnber,#date,#location,#reference').click(function(){
				$(this).removeClass("error_input");
			});
            
         	// Form field validation
            if(name.length == 0){
                var error = true;
                $('#name').addClass("error_input");
            }else{
                $('#name').removeClass("error_input");
            }
            if(email.length == 0 || email.indexOf('@') == '-1'){
                var error = true;
                $('#email').addClass("error_input");
            }else{
                $('#email').removeClass("error_input");
            }
			if(!$('#number').val()) {
                var error = true;
                $('#number').addClass("error_input");
            }else{
                $('#number').removeClass("error_input");
            }
            if(!$('#date').val()) {
                var error = true;
                $('#date').addClass("error_input");
            }else{
                $('#date').removeClass("error_input");
            }
            if(!$('#location').val()) {
                var error = true;
                $('#location').addClass("error_input");
            }else{
                $('#location').removeClass("error_input");
            }
            if(!$('#reference').val()) {
                var error = true;
                $('#reference').addClass("error_input");
            }else{
                $('#reference').removeClass("error_input");
            }
			
			
            // If there is no validation error, next to process the mail function
            if(error == false){
               // Disable submit button just after the form processed 1st time successfully.
                $('#submit').attr({'disabled' : 'true', 'value' : 'Sending...' });
                
				/* Post Ajax function of jQuery to get all the data from the submission of the form as soon as the form sends the values to email.php*/
                $.post("rsvp.php", $("#contact_form").serialize(),function(result){
                    //Check the result set from email.php file.
                    if(result == 'sent'){
                        //If the email is sent successfully, remove the submit button
                         $('#submit').remove();
                        //Display the success message
                        $('#mail_success').fadeIn(500);
                    }else{
                        //Display the error message
                        $('#mail_fail').fadeIn(500);
                        // Enable the submit button again
                        $('#submit').removeAttr('disabled').attr('value', 'Try Again');
                    }
                });
            }
        });    
    });