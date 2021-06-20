<?php
class user extends core
{ 

    /**
     * لتركيب القالب على الصفحة بداية
     *
     * @return void
     */
    private $validate_array = [
        "name" => ["name:الاسم", "require", "max:255"],
        "age" => ["name:العمر", "require", "max:255", "number"],
        "city" => ["name:المدينة", "require", "max:255"]
    ];
    public $update_id;
  
    public $delete_id;
    public function __construct()
    {
        $this->gets();
        $this->pageuser();
        if ($this->delete_id != '') {
            $this->when_delete($this->delete_id);
        }
        if (!isset($_GET['action'])) {
            echo ' <a  id="" class="btn btn-success" href="index.php?action=add" role="button">add </a>';
        }
    }
   
    private function gets()
    {
        if (isset($_GET['action']) and $_GET['action'] == 'delete') {
            $delete_id = $_GET['id'];
            $this->delete_id = $delete_id;
        }
        if (isset($_GET['action']) and $_GET['action'] == 'update') {
            $update_id = $_GET['id'];
            $this->update_id = $update_id;
        }
    }
    public function when_delete($id)
    {
        if ($this->number_query('user', "where id='$this->delete_id'") >= 1) {
            $this->delete('user', 'id', $id, 'تم الحذف بنجاح');
            $this->redir('index.php');
        }
    }
    public function masterPageStart()
    {
        $this->master('المستخدمين', '../../public/assets/includes/header', '../../public/assets/includes/footer', '../../public/assets/template/', '../../public/views/');
        $this->startSection();
        echo '<br>';
    }
    /**
     * لتركيب القالب على الصفحة نهاية
     *
     * @return void
     */
    public function masterPageEnd()
    {
        $this->endSection();
    }

    public function form()
    {
        if (isset($_POST['adduser'])) {
            $this->adduser();
            $this->printMessage();
        }
        if (isset($_POST['updateuser'])) {
            $this->updateuser();
            $this->printMessage();
        }
        if (isset($_GET['action'])) {
            if (isset($_GET['action']) && $_GET['action'] == 'update' and $this->number_query('user', "where id='$this->update_id'") >= 1) {
                foreach ($this->show('user', "where id='$this->update_id'") as $users) {
                    $name =  $users->name;
                    $age =  $users->age;
                    $city =  $users->city;
                }
                $form = "<Div class='container'>";
                $form .= "<form action='index.php?action=update&&id=$this->update_id' method='post'>";
                $form .= "<input   placeholder='name'  value='$name' name='name' type='text'class='form-control'/><br>";
                $form .= "<input    placeholder='age' value='$age'  name='age' type='text' class='form-control'/> <br>";
                $form .= "<input    placeholder='city'  value='$city'  name='city' type='text' class='form-control'/> <br> ";
                $form .= "<input  type='submit'  value='updateuser' name='updateuser' class='btn btn-success'/> ";
                $form .= '</form> </div>';
                echo   ' <a  class="btn btn-primary" href="index.php" role="button">reset </a> <br><br> ';
                echo $form;
            } else if (isset($_GET['action']) && $_GET['action'] == 'delete') {
                $deleteid = (int)$_GET['id'];
            }
        }
        if (isset($_GET['action']) and $_GET['action'] == 'add') {
            $form = '<Div class="container">';
            $form .= '<form action="index.php" method="post">';
            $form .= '<input   placeholder="name" name="name" type="text" class="form-control"/><br>';
            $form .= '<input    placeholder="age" name="age" type="text" class="form-control"/> <br>';
            $form .= '<input    placeholder="city" name="city" type="text" class="form-control"/> <br> ';
            $form .= '<input  type="submit"  value="adduser" name="adduser" class="btn btn-success"/> ';
            $form .= '</form> </div>';

            echo   ' <a  class="btn btn-primary" href="index.php" role="button">reset </a> <br><br> ';
            echo $form;
        }
    }
    public function pageuser()
    {
          $this->masterPageStart();
          $this->form();
    }
    public function adduser()
    {
        if ($this->setValidate() == true) {
            $this->insert('user', ["name" => "name", "age" => "age", "city" => "city"], 'تمت الاضافة بنجاح');
        } else {
            $this->errors_validate();
        }
    }
    public function updateuser()
    {
        if ($this->setValidate() == true) {
            $this->update('user', ["name" => "name", "age" => "age", "city" => "city"], "id='$this->update_id'", 'تم التعديل بنجاح');
        } else {
            $this->errors_validate();
        }
    }
    public function fetchusers()
    {
        $this->paginate_option('user', 'index.php', 4, 'order by id desc');
        $this->paginate_links();
        $i = 1;
        foreach ($this->show_with_pagination() as $users) {
            $id = $users->id;
            $u = '<tr>';
            $u .= '<td>' . $i++ . '</td>';
            $u .= '<td>' . $users->name . '</td>';
            $u .= '<td>' . $users->age . '</td>';
            $u .= '<td>' . $users->city . '</td>';
            $u .= "<td><a class='btn btn-success' href='index.php?action=update&&id=$users->id'" . '/>تعديل</td>';
            $u .= "<td><a class='btn btn-danger' href='index.php?action=delete&&id=$users->id'" . '/>حذف</td>';
            $u .= '</tr>';
            echo $u;
        }
    }
    /**
     * @auther sajjad kareem 
     *   @return void
     */
    private function setValidate()
    {
        $this->validation($this->validate_array);
        return $this->test_validate();
    }
};
