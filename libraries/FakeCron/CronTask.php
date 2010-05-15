<?php

class FakeCron_CronTask implements FakeCron_CronTaskInterface
{
	
	public function run($params = null)
	{
		echo "{test: 'ok'}";
	}
}
?>
