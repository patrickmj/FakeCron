<?php





class FakeCron_Task extends Omeka_Record
{
	public $id;
	public $name;
	public $description;
	public $interval;
	public $controller;
	public $action;
	public $last_run;
	public $data;

	public function buildJSON() {
		$preJSON = new StdClass();
		$preJSON->controller = $this->controller;
		$preJSON->action = $this->action;
		$preJSON->runNext = (strtotime($this->last_run) + $this->interval) * 1000;
		return json_encode($preJSON);
	}

}
?>
