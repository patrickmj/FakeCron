<?php

//TODO: find a way to automatically dig up the plugin info calling these functions

function fake_cron_register_task($params) 
{
  if( ! isset($params['name']) ) {
  	throw new Exception('Task Name must be provided for fake cron tasks');
  }
  
  if( ! isset($params['plugin_class']) ) {
    throw new Exception('plugin_class must be provided for fake cron tasks');
  }
  
  if( ! class_exists($params['plugin_class']) ) {
    $class = $params['plugin_class'];
  	throw new Exception("Class $class for FakeCron does not exist.");
  }

  if( ! isset($params['interval']) ) {
    throw new Exception('Interval for FakeCron Task must be set.');
  }
  
  if( ! isset($params['plugin_name']) ) {
    throw new Exception('Plugin Name for FakeCron Task must be set.');
  }
  
	$newTask = new FakeCron_Task();
  $newTask->name = $params['name'];
  if(isset($params['description'])) {
    $newTask->description = $params['description'];	
  }
  
  if(isset($params['plugin_name'])) {
  	$newTask->plugin_name = $params['plugin_name'];
  }
  $newTask->plugin_name = $params['plugin_name'];
  $newTask->plugin_class = $params['plugin_class'];
  $newTask->interval = $params['interval'];  
  $newTask->save();
    
}

function fake_cron_unregister_tasks($params)
{
  if(isset($params['plugin_name'])) {
	  $tasks = get_db()->getTable('FakeCron_Task')->findBy(array('plugin_name'=>$params['plugin_name']));
    foreach($tasks as $task) {
    	$task->delete();
    }
  }
  if(isset($params['plugin_class'])) {
    $tasks = get_db()->getTable('FakeCron_Task')->findBy(array('plugin_class'=>$params['plugin_class']));
    foreach($tasks as $task) {
      $task->delete();
    }
  }
    
}
