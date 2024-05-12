<?php 

/**
 * admin class
 */
class Admin extends Controller
{
	
	public function index()
	{
        if(!Auth::logged_in())
        {
            message('Будь-ласка, увійдіть до аккаунту для доступу');
            redirect('login');
        }


		$data['title'] = "Dashboard";

		$this->view('admin/dashboard',$data);
	}

    public function profile($id = null)
    {
        if(!Auth::logged_in())
        {
            message('Будь-ласка, увійдіть до аккаунту для доступу');
            redirect('login');
        }


        $id = $id ?? Auth::getId();

        $user = new User();
        $data['row']= $row = $user->first(['id'=>$id]);

        if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
        {
            $folder = "uploads/images/";
            if(!file_exists($folder))
            {
                mkdir($folder, 0777, true);
            }
            file_put_contents($folder."index.php", "<?php //silence");
            file_put_contents("uploads/index.php","<?php //silence");
            $allowed = ['image/jpeg', 'image/png'];

            if (!empty($_FILES['image']['name']))
            {
                if($_FILES['image']['errors'] == 0)
                {
                    if(in_array($_FILES['image']['type'], $allowed))
                    {
                        // everything good
                        $destination = $folder.time().$_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'], $destination);

                        $_POST['image'] = $destination;
                        if(file_exists($row->image)){
                            unlink($row->image);
                        }
                    }else {
                        $user->errors['image'] = "Даний тип файлу заборонений";
                    }
                } else {
                    $user->errors['image'] = "Неможливо завантажити фото";
                }
            }
            $user->update($id, $_POST);

            redirect('admin/profile/'.$id);
        }

        $data['title'] = "Profile";


        $this->view('admin/profile',$data);
    }
	
}