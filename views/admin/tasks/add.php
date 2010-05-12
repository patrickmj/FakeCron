<?php

$head = array('body_class' => 'fake-cron primary', 
              'title'      => 'Fake Cron',
              'content_class' => 'vertical-nav');
              
              
head($head);
?>



<h1>Add A Fake Cron Task</h1>
<?php echo flash(); ?>


<fieldset class="set">
<form method="post" enctype="multipart/form-data" id="item-form">

<div class="input">
<?php echo text(array('name'=>'name'), '', 'Name'); ?>
</div>
<div class="input">
<?php echo textarea(array('name'=>'description'), '', 'Description'); ?>
</div>
<div class="input">
<?php echo text(array('name'=>'interval'), '', 'Interval'); ?>
</div>
<div class="input">
<?php echo text(array('name'=>'plugin_class'), '', 'Class for handling your cron task'); ?>
</div>
<div class="input">
<?php echo textarea(array('name'=>'params'), '', 'Params as data to be serialized'); ?>
</div>

<?php echo submit(array('class'=>'submit')); ?>
</form>
</fieldset>

<?php foot(); ?>
