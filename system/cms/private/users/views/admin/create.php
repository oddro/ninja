<div class="row-fluid">
	<div class="span12">
		<div class="widget">
			<div class="widget-title">
				<h4><i class="icon-reorder"></i>Add User</h4>
				<span class="tools">
					<a href="javascript:;" class="icon-chevron-down"></a>
				</span>
			</div>
			<?php echo $message ?>
			<div class="widget-body form">
				<?php echo form_open('admin/users/create/action',array('class' => 'form-horizontal')) ?>
					<div class="control-group">
						<label class="control-label">Name</label>
						<div class="controls">
							<?php
								echo form_input(
									array(
										'name' 			=> 'user_first_name',
										'class'			=> 'span3',
										'placeholder' 	=> 'First Name',
										'value' 		=> set_value('user_first_name')
									)
								);
							?>
							<?php 
								echo form_input(
									array(
										'name'	 		=> 'user_last_name',
										'Placeholder'	=> 'Last Name', 
										'class'			=> 'span3',
										'value' 		=> set_value('user_last_name')
									)
								);
							?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Username</label>
						<div class="controls">
							<?php
								echo form_input(
									array(
										'name' 			=> 'user_username',
										'placeholder' 	=> 'Username',
										'class'			=> 'span6',
										'value'			=> set_value('user_username')
									)
								);
							?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Email</label>
						<div class="controls">
							<?php
								echo form_input(
									array(
										'name'			=> 'user_email',
										'class'			=> 'span6',
										'placeholder'	=> 'example@domain.com',
										'value' 		=> set_value('user_email')
									)
								);
							?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Password</label>
						<div class="controls">
							<?php
								echo form_password(
									array(
										'name'			=> 'user_password',
										'placeholder'	=> 'Password',
										'class'			=> 'span6',
										'value' 		=> set_value('user_password'),
										'id' 			=> 'password'
									)
								);
							?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Re Password</label>
						<div class="controls">
							<?php
								echo form_password(
									array(
										'name' 			=> 'user_repassword',
										'placeholder' 	=> 'Re Password',
										'class'			=> 'span6',
										'value' 		=> set_value('user_repassword')
									)
								);
							?>
						</div>
					</div>
					<div class="form-actions">
						<?php echo form_submit('submit', 'Submit','class="btn btn-success"'); ?>
						<?php echo form_reset('reset', 'Reset','class="btn"'); ?>
					</div>
				<?php echo form_close(); ?>
				</form>
			</div>
		</div>
	</div>
</div>