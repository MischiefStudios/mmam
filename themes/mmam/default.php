<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

<?php $this->inc('elements/header_top.php'); ?>

<body <?php   if ($c->isEditMode()) { ?> class="editmode" <?php   } ?> id="pageid<?php  print $c->getCollectionID(); ?>">

<?php $this->inc('elements/header.php'); ?>

<main>
    <?php
    $a = new GlobalArea('Main');
    $a->display();
    ?>
</main>

<?php $this->inc('elements/footer.php'); ?>
