<?php

$head = array('body_class' => 'fake-cron primary', 
              'title'      => 'Fake Cron',
              'content_class' => 'vertical-nav');
              
              
head($head);
?>



<h1><?php echo $fakecron_task->name ;?></h1>
<?php echo flash(); ?>

<p>Description: <?php echo $fakecron_task->description; ?></p>
<p>Last Run: <?php echo $fakecron_task->last_run; ?></p>
<p>Interval (in seconds): <?php echo $fakecron_task->interval; ?></p>
<p>Plugin Name: <?php echo $fakecron_task->plugin_name; ?></p>
<p>Plugin Class: <?php echo $fakecron_task->plugin_class; ?></p>


<?php foot(); ?>