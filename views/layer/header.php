<?php

// Подключаем файл который получает язык по умолчанию

require_once("get_language.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $lang->get('TITLE_MAIN');?></title>

	<!-- Подключаем стили -->
	<link rel="stylesheet" type="text/css" href="../template/css/style.css"/>

	<!-- Подключаем JQuery -->
	<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

	<!-- Подключаем валидацию формы в js -->
	<script type="text/javascript" src="../template/js/jquery.validate.js"></script>


<?php $vars=include_once(ROOT.'/languages/js_lang.php');

?>
<script type="text/javascript">
var logreg = <?=$vars["VAL_LOGREQ"];?>;


</script>
	<script type="text/javascript" src="../template/js/my_verify.js"></script>
</head>
<body>
	<div id="VAL_LOGREQ" class="hid"><?= $lang->get('VAL_LOGREQ');?></div>
	<div id="VAL_LOGMINLEN" class="hid"><?= $lang->get('VAL_LOGMINLEN');?></div>
	<div id="VAL_LOGMAXLEN" class="hid"><?= $lang->get('VAL_LOGMAXLEN');?></div>
	<div id="VAL_PASREQ" class="hid"><?= $lang->get('VAL_PASREQ');?></div>
	<div id="VAL_PASMINLEN" class="hid"><?= $lang->get('VAL_PASMINLEN');?></div>
	<div id="VAL_PASMAXLEN" class="hid"><?= $lang->get('VAL_PASMAXLEN');?></div>
	<div id="VAL_MAIL_TRUE" class="hid"><?= $lang->get('VAL_MAIL_TRUE');?></div>
	<div id="VAL_MAIL_ENTER" class="hid"><?= $lang->get('VAL_MAIL_ENTER');?></div>
	<div id="NAME_FILE" class="hid"><?= $lang->get('NAME_FILE');?></div>

	<footer><a href="/"><?= $lang->get('TO_MAIN');?></a></footer>