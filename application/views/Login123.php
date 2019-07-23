

            <div class="tygh-content clearfix">
                
				
				<div class="container-fluid  content-grid">

                <section class="ath_gird-section th_benefits">
                <div class="ath_container clearfix">
                <div class="row-fluid ">
                <div class="span16 ">
                <div class="ty-wysiwyg-content" data-ca-live-editor-object-id="0" data-ca-live-editor-object-type="">
                <div class="th_benefits th_benefits--tt col_3">


                <h1 class="ty-mainbox-title"></h1>
                <div class="ty-mainbox-body">
                                                


                <div class="ty-account">
                <?php echo "<div class='error_strings'>"; if(isset($error_message)) { echo $error_message; } "</div>"; ?>
                
				<form name="members" id="members" action="<?php echo base_url();?>Home/signin" method="post">
                

                <div class="ty-control-group">
                <label for="login_popup253" class="ty-login__filed-label ty-control-group__label cm-required cm-trim cm-email">E-mail</label>
                <input type="text" id="email" name="email" size="30" class="ty-login__input cm-focus" />
				<span class="error_strings"><?php echo form_error('email'); ?></span>
                </div>
				

                <div class="ty-control-group">
                <label for="psw_popup253" class="ty-login__filed-label ty-control-group__label ty-password-forgot__label">Password</label>
				<input type="password" id="password" name="password" class="ty-login__input" maxlength="32" />
                <span class="error_strings"><?php echo form_error('password'); ?></span>
				</div>
				

                <div class="ty-login-reglink ty-center">
                <a href="#" class="ty-password-forgot__a" tabindex="5">Forgot your password?</a>
                </div>


                <div class="buttons-container clearfix">
				
				<div class="ty-float-right">
				<input type="submit" value="Login" name="save" id="save" class="ty-btn__login ty-btn__secondary ty-btn">
                </div>
                
				<div class="ty-login__remember-me">
				<label for="remember_me_popup253" class="ty-login__remember-me-label">
				<input class="checkbox" type="checkbox" name="remember_me" id="remember_me_popup253" value="Y" />Remember me</label>
				</div>
				
				</div>


                
                </form>
				
				
				
                </div>

                </div>
				</div>
				</div>
				</div>
                </section>   
                    

                </div>
				
				
				
				
				
				
				
				
				
				
				
            </div>

            