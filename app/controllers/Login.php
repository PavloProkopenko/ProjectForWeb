<?php 

/**
 * login class
 */
class Login extends Controller
{
	
	public function index()
	{
        $data['errors'] = [];

		$data['title'] = "Login";
        $user = new User();

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            // validate
            $row = $user->first([
                'email'=>$_POST['email'],
            ]);

            if($row)
            {
                if($row->password === $_POST['password'])
                {
                    // authenticate
                    Auth::authenticate($row);

                    redirect('home');
                }
            }

            $data['errors']['email'] = "Неправильний логін або пароль";
        }

		$this->view('login',$data);
	}
	
}