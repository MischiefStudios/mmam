<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

<?php $this->inc('elements/header_top.php'); ?>

<body <?php   if ($c->isEditMode()) { ?> class="editmode" <?php   } ?> id="pageid<?php  print $c->getCollectionID(); ?>">

<?php $this->inc('elements/header.php'); ?>

<main>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php
				View::element('system_errors', [
					'format' => 'block',
					'error' => isset($error) ? $error : null,
					'success' => isset($success) ? $success : null,
					'message' => isset($message) ? $message : null,
				]);
				echo $innerContent;
				?>
                <?php $a = new Area('Main'); $a->enableGridContainer(); $a->display($c); ?>
			</div>
		</div>
	</div>
</main>

<?php $this->inc('elements/footer.php'); ?>