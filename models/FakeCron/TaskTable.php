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
	
}
?>
