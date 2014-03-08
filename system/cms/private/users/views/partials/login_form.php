<?php echo form_open('users/login/action'); ?>
    <?php echo form_hidden('url',$url) ?>
    <fieldset> <!-- to make two field float next to one another, adjust values accordingly -->
      <label>Username</label>
      <?php
        echo form_input(
          array(
            'style'       => 'width:92%;',
            'name'        => 'identity',
            'placeholder' => 'Username',
            'value'       => set_value('identity')
          )
        );
      ?>
      <label>Password</label>
      <?php 
        echo form_password(
          array(
            'style'       => 'width:92%;',
            'name'        => 'password',
            'placeholder' => 'password',
            'value'       => set_value('pasword')
          )
        )
      ?>
      <div style="float: left; clear: both; width: 100%; margin: 10px;">
      <?php 
        echo form_checkbox(
          array(
            'id'      => 'remember',
            'name'    => 'remember',
            'value'   => '1'
          )
        )
      ?>
      Remember
      </div>
      <div class="submit_link">
      Rendered in {elapsed_time} sec. using {memory_usage}MB.&nbsp;&nbsp;&nbsp;&nbsp;
      <?php 
        echo form_button(
          array(
            'type'    => 'submit',
            'class'   => 'alt_btn',
            'content' => 'login'
          )
        )
      ?>
      </div>
    </fieldset>
<?php echo form_close(); ?>

