<?php



class FakeCron_TaskTable extends Omeka_Db_Table
{
	
	public function filterByController($select, $controller)
	{
		$select->where("controller = ?", $controller);
		return $select;
	}
	public function filterByAction($select, $action)
	{
		$select->where("action = ?", $action);
		return $select;
	}
	
	public function applySearchFilters($select, $params)
	{
		if(isset($params['actionName'])) {
			$this->filterByAction($select, $params['actionName']);
		}
		
		if(isset($params['controllerName'])) {
			$this->filterByController($select, $params['controllerName']);
		}
				
	}
	public function buildTasksJSON()
	{
		$tasks = $this->findAll();
		$preJSONArray = array();
		foreach($tasks as $task) {
			//$task buildJSON returns and encoded string, so decode it 
			$preJSONArray[] = json_decode($task->buildJSON());
		}
		return json_encode($preJSONArray);
	}
}
?>
