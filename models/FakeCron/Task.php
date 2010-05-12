<?php

interface FakeCron_CronTaskInterface
{
	
	public function run($task = null);
	
} 


class FakeCron_Task extends Omeka_Record 
{
	public $id;
	public $name;
	public $description;
	public $plugin_class;
	public $interval;	
	public $last_run;
	public $params; //params for the action run 


	/**
	 * buildJSON builds the JSON object for testing whether cron needs to run
	 */

	public function buildJSON() {
		$preJSON = new StdClass();
		$preJSON->taskId = $this->id;
		$preJSON->runNext = (strtotime($this->last_run) + $this->interval) * 1000;
		return json_encode($preJSON);
	}
}

class FakeCron_CronTask implements FakeCron_CronTaskInterface
{
	
	public function run($params = null)
	{
		echo "{test: 'ok'}";
	}
}
?>
