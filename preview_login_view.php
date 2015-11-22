<h1 class="center">Online Dressing Room</h1>

    <div class="login" style='background-color: black'>
        <h2 style='color:white;text-align: center;'>User Login</h2>
		<?php 
		//    echo validation_errors();
			
			echo form_open('user_login/preview_validate_login');
			echo "<hr />";
			
			echo "<h5 style='color:white'>Username :";
		 	echo "<input type='text' name='username' id='preview_username'>";
			echo form_error('username');
			echo "</h5>";
			
			echo "<h5 style='color:white'>Password :";
			echo "<input type='password' name='password' id='preview_password'>";
			echo form_error('password');
			echo "</h5>";
			
			if(isset($message))	
			   {
			    	echo "<h5><div class='error'>".$message."</div></h5>";
		       }
                ?>
			<a id="preview_login" class="form_button" style="text-decoration: none;color:#000000;margin-left: 115px;"> Login </a>
            <a href="<?php echo base_url();?>index.php?/register_user" class="form_button" style="text-decoration: none;color:#000000"> Register </a>
			
		 <?php
		 	echo form_close(); 
		 ?>
	</div>
    
    <script>
    
     $("#preview_login").click(function(){
 var usernm = $('#preview_username').val();
//set
// alert(usernm)
//$('#preview_username').val('');
var userpass = $('#preview_password').val();
var uspass = 'username='+ usernm  + '&password='+ userpass;
//set
// alert(userpass)

    			
					$.ajax({
						url: "<?php echo site_url('user_login/preview_validate_login'); ?>",
						type: 'POST',
						data: { 
                        username: usernm,
                        password:userpass
						},
						success: function(msg) {
					//		alert(msg)
                   		$('#toPopup').html(msg).fadeIn(100);
                       //disablePopup(); 
                      //   $('#toPopup').hide();
                    //    $('#toPopup').fadeOut('slow');
                     //       $('#backgroundPopup').fadeOut('slow');
                             $('#post_login').show();
                             $('#welcome_msg').show();
						}
						
					});
                   
                   });     
    </script>