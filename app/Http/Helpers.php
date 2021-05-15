<?php 
	use App\blood_req;
	use App\contact;
	use App\setting;


	function requ()
	    {
	    	$message = blood_req::orderBy('id', 'desc')->where('status', 1)->get();

	        return $message;
	    } 
	function con()
		{
			$data = contact::orderBy('id', 'desc')->where('status', 1)->get();
			return $data;
		}
	function setting()
		{
			$data = setting::all();
			return $data;
		}
?>