{alert_login_flash_data()}
  {if $template.message}
    {$template.message}
  {elseif validation_errors()}
    {validation_errors()}
  {/if}
<?php echo $template['partials']['form'] ?>