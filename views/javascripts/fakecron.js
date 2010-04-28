

var FakeCron = {
	check : function() {
		for each(var task in FakeCron.tasks) {
			if(new Date().getTime() >= task.runNext) {
				jQuery.get(FakeCron.baseURL +  task.controller + "/" + task.action);
			}
		}		
	}
}


jQuery(document).ready(function(){
   FakeCron.check();
 });
