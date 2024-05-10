<?php 

/**
 * signup class
 */
class Signup extends Controller
{
	
	public function index()
	{
        $user = new User();
        $result = $user->validate($_POST);

		$data['title'] = "Signup";

		$this->view('signup',$data);
	}
	
}