<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/bird-staff/admins/index.php'));
}
$id = $_GET['id'];

$admin = Admin::find_by_id($id);
if($admin == false) {
  redirect_to(url_for('/bird-staff/admins/index.php'));
}

if(is_post_request()) {

  $result = $admin->delete();

  $_SESSION['message'] = 'The bird was deleted successfully.';
  redirect_to(url_for('/bird-staff/admins/index.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete Admin'; ?>
<?php include(SHARED_PATH . '/bird-staff-header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/bird-staff/admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="Admin delete">
    <h1>Delete Bird</h1>
    <p>Are you sure you want to delete this bird?</p>
    <p class="item"><?php echo h($admin->common_name); ?></p>

    <form action="<?php echo url_for('/bird-staff/admins/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Bird" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/bird-staff-footer.php'); ?>
