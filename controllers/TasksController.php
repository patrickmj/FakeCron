<?php

interface FakeCron_TaskInterface
{
	
	public function run($params = null);
	
	
}

class FakeCron_TasksController extends Omeka_Controller_Action
{
	
	public function init() 
	{
		$this->_modelClass = "FakeCron_Task";
	}
	
	public function editAction()
	{
		if(isset($_POST['params'])) {
			$_POST['params'] = serialize(trim($_POST['params']) );
		}
		
		parent::editAction();
	}
	
	public function addAction()
	{
		if(isset($_POST['params'])) {
			$_POST['params'] = serialize(trim($_POST['params'] ));
		}
		
		parent::addAction();		
	}
	
	/**
	 * fakecronAction fires off the requested action
	 * 
	 * 
	 */
	
	public function fakecronAction()
	{		
		// tell Omeka not to try to make a view
		$this->_helper->viewRenderer->setNoRender();
		
		$taskId = $this->_getParam('taskId');
		$task = $this->getDb()->getTable('FakeCron_Task')->find($taskId);
		$task->last_run = date('Y-m-d G:i:s');
		$fakeCronClass = new $task->plugin_class();
				
		$fakeCronClass->run($task->params);
		$task->save();		
		

		if ($_GET['isManual']) {
			$this->redirect->goto('browse');
		}
	}	
}

?>
