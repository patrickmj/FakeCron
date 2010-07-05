<?php

$head = array('body_class' => 'fake-cron primary', 
              'title'      => 'Fake Cron',
              'content_class' => 'vertical-nav');
              
              
head($head);
?>



<h1>Browse Fake Cron Tasks</h1>
<?php echo flash(); ?>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Interval</th>
			<th>Last Run</th>
      <th>Plugin Name</th>
			<th>Plugin Class for FakeCron job</th>
			<th>Edit?</th>
			<th>Fire now?</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($fakecron_tasks as $task): ?>
		<tr>
		<td><?php echo $task->name; ?></td>
		<td><?php echo $task->description; ?> </td>	
		<td><?php echo $task->interval; ?> </td>	
		<td><?php echo $task->last_run; ?></td>
    <td><?php echo $task->plugin_name; ?></td>	
		<td><?php echo $task->plugin_class; ?></td>		

			
		<td><a href="<?php echo uri('fake-cron/tasks/edit/id/' . $task->id); ?>">Edit</a></td>	
		<td><a href="<?php echo uri("fake-cron/tasks/fakecron/$task->id?isManual=true"); ?>">Fire</a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>

</table>



<?php foot(); ?>