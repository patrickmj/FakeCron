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
<?php echo text(array('name'=>'name'), $fakecron_task->name, 'Name'); ?>
</div>
<div class="input">
<?php echo textarea(array('name'=>'description'), $fakecron_task->description, 'Description'); ?>
</div>
<div class="input">
<?php echo text(array('name'=>'interval'), $fakecron_task->interval, 'Interval'); ?>
</div>
<div class="input">
<?php echo text(array('name'=>'plugin_class'), $fakecron_task->plugin_class, 'Class for handling your cron task'); ?>
</div>


<?php echo submit(array('class'=>'submit')); ?>

<p id="delete_item_link">
	<a class="delete" href="<?php echo uri('delete') . $fakecron_task->id ?>">Delete This Task</a>       
</p>
</form>
</fieldset>
<?php foot(); ?>