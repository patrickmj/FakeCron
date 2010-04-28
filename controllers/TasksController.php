<?php





class FakeCron_TasksController extends Omeka_Controller_Action
{
	
	public function init() 
	{
		$this->_modelClass = "FakeCron_Task";
	}
	
	/**
	 * fakecronAction fires off the requested action
	 * 
	 * 
	 */
	
	public function fakecronAction()
	{
		
		$request = $this->getRequest();
		$response = $this->getResponse();
		
		// tell Omeka not to try to make a view
		$this->_helper->viewRenderer->setNoRender();
		
		$controllerName = $this->_getParam('con');
		$actionName = $this->_getParam('act');
		$tasks = $this->getDb()->getTable('FakeCron_Task')->findBy(array('controllerName'=>$controllerName, 'actionName'=>$actionName));

		foreach($tasks as $task) {
			$task->last_run = date('Y-m-d G:i:s');				
			$task->save();		
			$controller = new $controllerName($request, $response);
			$controller->$actionName($task);							
		}
		

		if ($_GET['isManual']) {
			$this->redirect->goto('browse');
		}
	}

	/**
	 * testAction just lets me test things
	 */
	public function testAction($task = null)
	{
		$this->_helper->viewRenderer->setNoRender();
		echo "{fakecron: {test: 'result'}}";
	}	
}
?>
