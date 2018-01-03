<?php require_once(ROOT."/views/layer/header.php"); ?>
<section>
    <div class="container">
        <div class="row">
            <h1><?= $lang->get('KABINET');?></h1>
<?php if(file_exists(ROOT."/upload/".$user['id'].$user['avatar'])) {

	echo "<img class='avator' src='http://".$_SERVER['HTTP_HOST']."/upload/".$user['id'].$user['avatar']."'>";
}?>
            <h3><?php echo $lang->get('LABEL_NAME')." ".$user['name'];?></h3>
            <h3><?php echo "Email ".$user['email'];?></h3>
            <h3><?php echo $lang->get('LABEL_PASSWORD')." ".$user['password'];?></h3>
	         
<a class="logout" href="<?php echo "/cabinet/logout";?>">Выйти</a>
        </div>
    </div>
</section>
<?php require_once(ROOT."/views/layer/footer.php"); ?>
