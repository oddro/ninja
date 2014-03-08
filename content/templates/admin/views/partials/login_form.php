<?php echo form_open('admin/login/action',array('class' => 'form-signin')); ?>
  <?php echo form_hidden('url','{url}') ?>
  <h2 class="form-signin-heading">Please Log In</h2>
  <?php
    echo form_input(
      array(
        'class'       => 'form-control',
        'name'        => 'identity',
        'placeholder' => 'Username',
        'value'       => set_value('identity'),
        'autofocus'
      )
    );
  ?>
  <?php 
    echo form_password(
      array(
        'class'       => 'form-control',
        'name'        => 'password',
        'placeholder' => 'password',
        'value'       => set_value('pasword')
      )
    )
  ?>
  <label class="checkbox">
  <?php 
    echo form_checkbox(
      array(
        'name'    => 'remember',
        'value'   => '1'
      )
    )
  ?> Remember Me 
  </label>
  <?php 
    echo form_button(
      array(
        'type'    => 'submit',
        'class'   => 'btn btn-lg btn-primary btn-block',
        'content' => 'login'
      )
    )
  ?>
<?php echo form_close(); ?>