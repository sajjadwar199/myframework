<?php
session_start();
class TheDatabase
{
  private $host = 'localhost';
  private $username = 'root';
  private $password = '';
  public $database = 'test';
  protected $con;
  protected $update_array = [];
    /**
   * protection_input function
   *
   * @param [type] $input
   * $method   ex ..post, get
   * @return void
   */
  public function protection_input($input,$method="post")
  {
    if($method=='post'){
      $protect = $this->escape_string(strip_tags(htmlentities(trim(@$_POST[$input]))));
      return $protect;
    }
    if($method=='get'){
      $protect = $this->escape_string(strip_tags(htmlentities(trim(@$_GET[$input]))));
      return $protect;
    }

  }
  /**
   * وظيفة الدالة هي ارسال القيم وحمياتها
   *
   * @param [string] $postName   ex.. name  in  $_post['name']
   * @param [any ] $value     ex .. sajjad
   * @return void
   */
  public function post($postName, $value = null)
  {
    if ($value != null) {
      $_POST[$postName] = $value;
      $protect = $this->escape_string(strip_tags(htmlentities(trim(@$_POST[$postName]))));
    } else {
      $protect = $this->escape_string(strip_tags(htmlentities(trim(@$_POST[$postName]))));
    }
    return $protect;
  }


/**
 * وظيفة الدالة  تلوين الاحرف المشابهة عند البحث
 *
 * @param [type] $str    الجملة    EX..   apple banna
 * @param [type] $searchGetName ( $_GET['search']) اسم متغير البحث     $_GET['search']=>   'search'
 * @param string $color  اللون   ex.. green
 * @return void
 */
 public function colorWordSearch($text,$searchGetName,$color="yellow")
  {
    if(strlen($text) > 0 && strlen((string)$this->protection_input($searchGetName,'get')) > 0)
    {
     $spancolor="<span style='background-color:{$color}'>";
      return (str_ireplace((string)$this->protection_input($searchGetName,'get'),"$spancolor".$this->protection_input($searchGetName,'get')."</span>", $text));
    }
     return ($text);
  }


  /**
   * فائدة الدالة لاعادة التوجيه
   *
   * @param [type] $page
   * @return void
   */
  public function redir($page){
  ?>
  <script>
      window.location.replace("<?php echo $page; ?>");
  </script>
<?php
  }
  /**
   *    وظيفة الدالة هي استقبال القيم وحمايتها
   *
   * @return void
   */
  public function get()
  {
  }
  public function getProdectionInt($getName)
  {
    if (isset($_GET["$getName"])) {
      return  filter_var($_GET["$getName"], FILTER_VALIDATE_INT);
    }
  }
  /**
   * Undocumented function
   *
   * @return void
   */
  public function connectPdo()
  {
    $connect = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
    return $connect;
  }
  /**
   * connect function
   * @return void
   */
  public function connect()
  {
    $con = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    mysqli_set_charset($con, "utf8");
    if (!$con) {
      echo "لم يتم الاتصال";
    } else {
      echo "";
    }
    return $con;
  }
  public function escape_string($value)
  {
    $conn = $this->connect();
    return mysqli_real_escape_string($conn, $value);
  }
  public function insert($table_name, $assoc_array, $successmsg = null)
  {
    $keys = array();
    $values = array();
    foreach ($assoc_array as $key => $value) {
      $keys[] = $key;
      $values[] = $this->escape_string(strip_tags(htmlentities(@$_POST[$value])));
    }
    $query = "INSERT INTO `$table_name`(`" . implode("`,`", $keys) . "`) VALUES('" . implode("','", $values) . "')";
    $conn = $this->connect();
    $q =  mysqli_query($conn, $query);
    if ($q) {
      $_SESSION['success_message'] =   '<div class="alert alert-dismissible alert-success text-right direction-rtl" role="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>' . $successmsg . '</strong>.
    </div>';
      echo  '     <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
       }
    </script>';
return true;
    } else {
      $_SESSION['error_massage'] = 'هناك خطا  ';
      return false;
    }
  }
  /**
   * Undocumented function
   *
   * @param [type] $table
   * @param [type] $array_update
   * @param [type] $where
   * @param [type] $successmsg
   * @return void
   */
  public function update($table, $array_update, $where, $successmsg = null)
  {
    foreach ($array_update as  $key => $value) {
      $value = $this->protection_input($value);
      array_push($this->update_array, $key . '=' . "'$value'");
    }
    $value_update = implode(",", $this->update_array);
    $sql = "UPDATE $table SET $value_update   WHERE $where";
    $conn = $this->connect();
    $q =  mysqli_query($conn, $sql);
    if ($q) {
if($successmsg!=null){
      $_SESSION['success_message'] =   '<div class="alert alert-dismissible alert-success text-right direction-rtl" role="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>' . $successmsg . '</strong>.
    </div>';
}
      echo  '     <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
       }
    </script>';

    return true;
    } else {
      $_SESSION['error_massage'] = 'هناك خطا  ';
      return false;
    }
  }
  /**
   *  تستخدم لحذف البيانات من قاعدة البيانات
   *
   * @param [type] $table   اسم الجدول
   * @param [type] $idname    اسم المتغير الحقل في جدول قاعدة البيانات
   * @param [type] $id   رقم المعرف
   * @param [type] $successmsg   الرسالة
   * @return void
   */
  public function delete($table, $idname, $id, $successmsg = null)
  {
    $query = "DELETE FROM $table WHERE $idname = $id";
    $conn = $this->connect();
    $q = mysqli_query($conn, $query);
    if ($q) {
      if($successmsg!=null){
      $_SESSION['success_message'] =   '<div class="alert alert-dismissible alert-success text-right direction-rtl" role="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>' . $successmsg . '</strong>.
    </div>';
     }
      echo  '     <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
       }
    </script>';
    return true ;
    } else {
      $_SESSION['error_massage'] = 'هناك خطا  ';
      return false ;
    }
  }
  public function show($table, $where = null)
  {
    $query = "SELECT * FROM $table   $where  ";
    $conn = $this->connect();
    $q = mysqli_query($conn, $query);
    if ($q == false) {
      return false;
    }
    $rows = array();
    while ($row = mysqli_fetch_object($q)) {
      $rows[] = $row;
    }
    return $rows;
  }
  /**
   * number query function
   *
   * @param [type] $table
   * @param [type] $where
   * @return void
   */
  public function number_query($table, $where = null)
  {
    $conn = $this->connect();
    $query = "SELECT * FROM $table  $where  ";
    $q = mysqli_query($conn, $query);
    if ($q == false) {
      return false;
    }
    $num = mysqli_num_rows($q);
    return $num;
  }
  public function fetch($q)
  {
    $row = mysqli_fetch_array($q);
    return $row;
  }
  public function query($sql)
  {
    $conn = $this->connect();
    $query = mysqli_query($conn, $sql);
    if (!$query) {
      /*  $_SESSION['error_massage'] = 'åäÇß ÎØÇ Ýí ÇáÇÓÊÚáÇã'; */
    } else {
      echo "";
    }
    return $query;
  }
  /**
   * model function
   *
   * @param [type] $sql2
   * @param [type] $alert
   * @param [type] $page
   * @return void
   */
  public function model($sql2, $alert = null, $page = null)
  {
    $conn = $this->connect();
    @$query = mysqli_query($conn, $sql2);
    if ($query and $alert != "" and $page != "") {
      echo "<script>alert('$alert')</script>";
      echo "<Script>window.open('$page','_self')</Script>";
    } else if ($alert != "" and $page != "") {
      echo "<script>alert('åäÇß ÎØÇ ')</script>";
      echo "<Script>window.open('$page','_self')</Script>";
    }
  }
  /**
   * insert_last_id function
   *
   * @param [type] $table_name
   * @param [type] $assoc_array
   * @param [type] $successmsg
   * @param [type] $echo_id
   * @return void
   */
  public function insert_last_id($table_name, $assoc_array, $successmsg = null, $echo_id = null)
  {
    $keys = array();
    $values = array();
    foreach ($assoc_array as $key => $value) {
      $keys[] = $key;
      $values[] = $this->escape_string(strip_tags(htmlentities($_POST[$value])));
    }
    $query = "INSERT INTO `$table_name`(`" . implode("`,`", $keys) . "`) VALUES('" . implode("','", $values) . "')";
    $conn = $this->connect();
    $q =  mysqli_query($conn, $query);
    if ($q) {
      $last = $conn->insert_id;
      if ($echo_id == true) {
        $_SESSION['success_message'] = $successmsg . $last;
      } else {
        $_SESSION['success_message'] = $successmsg;
      }
      echo  '     <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
    </script>';
      return $last;
    } else {
      $_SESSION['error_massage'] = 'هناك خطا  ';
    }
  }

  /**
   * delete_multi function
   *
   * @param [type] $table
   * @param [type] $idname
   * @param [type] $check_boxs_input
   * @param [type] $successmsg
   * @return void
   */
  public function delete_multi($table, $idname, $check_boxs_input, $successmsg = null)
  {
    if (isset($_POST["$check_boxs_input"])) {
      foreach ($_POST["$check_boxs_input"]  as $id) {
        $q = $this->delete($table, $idname, $id, $successmsg);
      }
    }
  }
};
