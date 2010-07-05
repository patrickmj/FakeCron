<?php

$head = array('body_class' => 'fake-cron primary', 
              'title'      => 'Fake Cron',
              'content_class' => 'vertical-nav');
              
              
head($head);
?>



<h1>Edit Fake Cron Task "<?php echo $fakecron_task->name ; ?>"</h1>
<?php echo flash(); ?>

<fieldset class="set">
<form method="post" enctype="multipart/form-data" id="item-form">

<div class="input">
<?php echo text(array('name'=>'name'), $fakecron_task->name, 'Name'); ?>
</div>
<div class="input">
<?php echo textarea(array('name'=>'description'), $fakecron_task->description, 'Description'); ?>
</div>
<div class="input">
<?php echo text(array('name'=>'interval'), $fakecron_task->interval, 'Interval'); ?> seconds
</div>
<div>
<p style="font-weight: bold; width: 198px; float: left;">Plugin Name</p><p><?php echo $fakecron_task->plugin_name; ?></p>
</div>
<div>
<p style="font-weight: bold; width: 198px; float: left;">Plugin Class</p><p><?php echo $fakecron_task->plugin_class; ?></p>
</div>


<?php echo submit(array('class'=>'submit')); ?>


</form>
</fieldset>
<?php foot(); ?>