<?php

$head = array('body_class' => 'fake-cron primary', 
              'title'      => 'Fake Cron',
              'content_class' => 'vertical-nav');
              
              
head($head);
?>



<h1><?php echo $fakecron_task->name ;?></h1>
<?php echo flash(); ?>

<p><?php echo $fakecron_task->description; ?></p>
<p><?php echo $fakecron_task->last_run; ?></p>
<p><?php echo $fakecron_task->interval; ?></p>
<p><?php echo $fakecron_task->plugin_class; ?></p>
<p><?php print_r(unserialize($fakecron_task->params) ) ; ?></p>

<?php foot(); ?>