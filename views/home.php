<?php include ROOT . '/views/layer/header.php'; ?>
<main>
<h2><?= $lang->get('HELLO');?></h2>

<div class="lg_big">
	<div class="lg"><a href="lang/0"><img src="../template/img/rusland.gif" alt="Язык"></a></div>
	<div class="lg"><a href="lang/1"><img src="../template/img/england.gif" alt="Язык"></a></div>
</div>

<div class="med_block">
	<div class="rg">
		<a href="user/register"><img src="../template/img/register.png" alt="Язык"></a>
		<p><?= $lang->get('REGIST');?></p>
	</div>
	<div class="rg">
		<a href="user/login"><img src="../template/img/login.png" alt="Язык"></a>
		<p><?= $lang->get('AUTH');?></p>
	</div>
</div>










</main>
<?php include ROOT . '/views/layer/footer.php'; ?>	
