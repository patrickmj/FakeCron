<?php

class FakeCron_CronTask implements FakeCron_CronTaskInterface
{
	
	public function run()
	{
		echo "{test: 'ok'}";
	}
}
?>
