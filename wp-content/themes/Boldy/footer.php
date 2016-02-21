 <script type="text/javascript">
    jQuery(document).ready(function($){
	$('form#quickContactForm').submit(function() {
		$('.errormsg').remove();
		var hasError = false;
		$('.requiredField').each(function() {
			if(jQuery.trim($(this).val()) == '') {
				$(this).parent().before('<p class="errormsg">Please enter your name, a message and a valid email address.</p>');
				hasError = true;
			} else if($(this).hasClass('email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(jQuery.trim($(this).val()))) {
					var labelText = $(this).prev('label').text();
					$(this).parent().before('<p class="errormsg">Please enter your name, a message and a valid email address.</p>');
					hasError = true;
				}
			}
		});
		if(!hasError) {
			$('form#quickContactForm .button').fadeOut('normal', function() {

			});
			var formInput = $(this).serialize();
			$.post($(this).attr('action'),formInput, function(data){
				$('form#quickContactForm').slideUp("fast", function() {
					$(this).before('<p class="successmsg">Your email has been sent! Thank you!</p>');
				});
			});
            return true;
		}
        else {
		return false;
        }
	});
});
 </script>

  <?php  if(isset($_POST['submitted'])) {
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = __("You forgot to enter your name.", "site5framework");
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}

		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = __("You forgot to enter your email address.", "site5framework");
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = __("You entered an invalid email address.", "site5framework");
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

		//Check to make sure comments were entered
		if(trim($_POST['comments']) === '') {
			$commentError = __("You forgot to enter your comments.", "site5framework");
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}

		//If there is no error, send the email
		if(!isset($hasError)) {
			$msg .= "------------User informations------------ \r\n"; //Title
			$msg .= "User IP : ".$_SERVER["REMOTE_ADDR"]."\r\n"; //Sender's IP
			$msg .= "Browser Info : ".$_SERVER["HTTP_USER_AGENT"]."\r\n"; //User agent
			$msg .= "User Come From : ".$_SERVER["HTTP_REFERER"]; //Referrer

			$emailTo = ''.of_get_option('boldy_contact_email').'';
			$subject = 'Contact Form Submission from '.$name;
			$body = "Name: $name \n\nEmail: $email \n\nMessage: $comments \n\n $msg";
			$headers = 'From: '.of_get_option('name').' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

			if(mail($emailTo, $subject, $body, $headers)) $emailSent = true;

	}

}?>

 </div>
		   <!-- END CONTENT -->
	</div>
    <!-- END WRAPPER -->

	<!-- BEGIN FOOTER -->
	<footer>
<?php if(of_get_option('boldy_footer_actions')!="no") {?>

					<?php }?>
		<div id="footerWidgets">
			<div id="footerWidgetsInner">
				<!-- BEGIN FOOTER WIDGET -->
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<?php dynamic_sidebar( 'footer-1' ); ?>
                <?php endif; ?>
				<!-- END FOOTER WIDGETS -->
				<!-- BEGIN COPYRIGHT -->
				<div id="copyright">
                    <div id="owners">
					<?php if (of_get_option('boldy_footer_copyright') <> ""){
						echo stripslashes(stripslashes(of_get_option('boldy_footer_copyright')));
						}else{
							_e("Just go to Theme Options Page and edit copyright text.", "site5framework");
						}?>
                    </div>
                   				</div>
				<!-- END COPYRIGHT -->
				</div>

		</div>
	</footer>
	<!-- END FOOTER -->
</div>
<!-- END MAINWRAPPER -->
<?php wp_footer(); ?>
</body>
</html>

