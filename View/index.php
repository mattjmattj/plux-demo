<?php
/**
 * @author Matthias Jouan <matthias.jouan@gmail.com>
 * @license FreeBSD License (http://opensource.org/licenses/BSD-2-Clause)
 */ 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>plux : demo</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundation/5.4.6/css/foundation.css" type="text/css" />
		<style type="text/css">
			ul {
				list-style-position: inside;
				list-style-type: none;
			}
		</style>
	</head>
	<body>
		<?php $header->render() ?>
		<div class="row">
		<?php $flash->render() ?>
		</div>
		<div class="row">
				<?php $addform->render() ?>
		</div>
		<div class="row">
			<section id="items" class="large-4 columns">
				<?php $todolist->render() ?>
			</section>
			<section id="log" class="large-8 columns">
				<?php $log->render() ?>
			</section>
		</div>
		<?php $footer->render() ?>
	</body>
</html>
