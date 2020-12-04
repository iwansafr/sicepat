<?php
function encrypt($string = '')
{
  $key = '';
  if (!empty($string)) {
    $key = password_hash($string, PASSWORD_DEFAULT);
  }
  return $key;
}

function decrypt($string = '', $current_key = '')
{
  $key = '';
  if (!empty($string) && !empty($current_key)) {
    $key = password_verify($string, $current_key);
  }
  return $key;
}
function alert($msg = 'danger', $alert = 'danger')
{
?>
  <div class="alert alert-<?php echo $alert; ?>" role="alert">
    <?php echo $msg; ?>
  </div>
<?php
}
