<?php session_start () ; ?>
<?php require 'header.php'; ?>

<?php
if (isset ($_SESSION['user'])) {
unset ($_SESSION['user']);
echo'ログアウトしました。';
} else {
echo'すでにログアウトしています。';
}
?>
<?php require '../footer.php'; ?>