<?php

class FakeCron_Task extends Omeka_Record 
{
	public $id;
	public $name;
	public $description;
  public $plugin_name;
	public $plugin_class;
	public $interval;	
	public $last_run;
	


	/**
	 * buildJSON builds the JSON object for testing whether cron needs to run
	 */

	public function buildJSON() {
		$preJSON = new StdClass();
		$preJSON->taskId = $this->id;
    if($this->last_run == null) {
    	$preJSON->runNext = time();
    } else {
      $preJSON->runNext = (strtotime($this->last_run) + $this->interval) * 1000;	
    }
		
		return json_encode($preJSON);
	}
}

?>
