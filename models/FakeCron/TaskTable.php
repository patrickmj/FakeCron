<?php



class FakeCron_TaskTable extends Omeka_Db_Table
{
	
	public function filterByPluginClass($select, $plugin_class)
	{
		$select->where("plugin_class = ?", $plugin_class);
		return $select;
	}
	
	public function filterByFeedId($select, $feed_id)
	{
		$select->where("feed_id = ?", $feed_id);
		return $select;				
	}
	
	public function applySearchFilters($select, $params)
	{
		if(isset($params['plugin_class'])) {
			$this->filterByPluginClass($select, $params['plugin_class']);
		}
		
		if(isset($params['feed_id'])) {
			$this->filterByFeedId($select, $params['feed_id']);
		}			
	}
	
	public function buildTasksJSON()
	{
		$tasks = $this->findAll();
		$preJSONArray = array();
		foreach($tasks as $task) {
			if($task->interval != 0) {
				$taskJSON = $task->buildJSON();			
				//$task->buildJSON returns an encoded string, so decode it so the entire array can be safely encoded 
				$preJSONArray[] = json_decode($task->buildJSON());				
			}
		}
		return json_encode($preJSONArray);
	}
}
?>
