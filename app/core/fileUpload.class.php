<?php
require 'Database.class.php';
class fileUpload extends TheDataBase
{
  /*
    *  class by sajjad kareem
    * create in 2020/11/1 9: 57pm
    */
  /* هذا الميزة تفيد في تشغيل طباعة رسالة الصح   */
  private $SuccessMessage = true;
  /* اسم الملف للرفع */
  private $fileName;
  /* الحجم المسموح به */
  private $sizeAllow;
  /* نوعية الملف المسموح به للرفع */
  private $typeFileAllow = [];
  /* اسم الملف الذي نريد ان نرفع له  */
  private $uploadTo;
  /* الاخطاء الخاصة بفحص الملف */
  private $e = array();
  /* صيغ الملفات القياسية المسموح لرفعها */
  private const standrTypefile = array('jpeg', 'jpg', 'png', 'gif', 'jfif');
  // بداية الرسالة الخطأ بوتستراب
  private $startMessageBootstrab = "<h6  align='right' style='color:red'>";
  // نهاية الرسالة الخطأ بوتستراب
  private $endMessageBootstrab = "</h6>";
  // بداية الرسالة الصح بوتستراب
  private $startMessageBootstrabSuccess = "<h6  align='right' style='color:green'>";
  // نهاية الرسالة  الصح بوتستراب
  private $endMessageBootstrabSuccess = "</h6>";
  //الحجم القياسي لرفع الملفات
  private const standrSizeFile = 20000000000;
  //رسالة الخطأ الخاصة بنوع الملف
  private const messageTypeFile = "الملف الذي رفعته لا يطابق الصيغة المطلوبة";
  //رسالة الخطأ الخاصة بحجم الملف
  private const messageSizeFile = "الملف الذي رفعته اكبر من الحجم المطلوب";
  //رابط الملف بعد الرفع
  public $filePathAfterUpload;
  //الرسالة الخاصة عند نجاح عملية الرفع
  private $messageSuccess;
  /*
  * الاستدعاء الرئيسي لدالة رفع الملفات
  */
  /**
   * Undocumented function
   *
   * @param [type] $fileName
   * @param [type] $uploadTo
   * @param [type] $messageSuccess
   * @param [type] $typeFileAllow
   * @param [type] $sizeAllow
   * @return void
   */
  public function uploadFile($fileName, $uploadTo, $messageSuccess = null, $typeFileAllow = null, $sizeAllow = null)
  {
    $this->messageSuccess = $messageSuccess;
    $this->fileName       = $fileName;
    $this->sizeAllow      = $sizeAllow;
    $this->typeFileAllow  = $typeFileAllow;
    $this->uploadTo       = $uploadTo;
    $this->setErrors();
    $this->checkUpload();
    //لقص امتداد الملف (../) من رابط الملف
    return   str_replace('../', '', $this->filePathAfterUpload);
  }
  /*
* جلب نوعية الملف
*/
  private function getFileType()
  {
    if (isset($_FILES[$this->fileName]['name'])) {
      $fileName = $_FILES[$this->fileName]['name'];
    }
    /* صيغة الملف */
    if (isset($_FILES[$this->fileName]['name'])) {
      $file_extension = pathinfo($fileName, PATHINFO_EXTENSION);
      return $file_extension;
    }
  }
  /*
      * وظيفة هذه الدالة هي فحص الملف اذا كان بلصيغة المطلوبة
      *
      */
  /**
   * Undocumented function
   *
   * @return void
   */
  private  function checkAllowType()
  {
    if (!empty($this->typeFileAllow)) {
      $typeCheck = in_array($this->getFileType(), $this->typeFileAllow);
    } else if (empty($this->typeFileAllow)) {
      $typeCheck = in_array($this->getFileType(), self::standrTypefile);
    }
    if ($typeCheck == false) {
      return false;
    } else {
      return true;
    }
  }
  /*
* وظيفة هذه الدالة هي فحص حجم الملف
*/
  /**
   * Undocumented function
   *
   * @return void
   */
  private function checkAllowSize()
  {
    if (!empty($this->sizeAllow)) {
      if ($_FILES[$this->fileName]['size'] > $this->sizeAllow) {
        return false;
      } else {
        return true;
      }
    } else if (empty($this->sizeAllow)) {
      if ($_FILES[$this->fileName]['size'] > self::standrSizeFile) {
        return false;
      } else {
        return true;
      }
    }
  }
  /*
  * وظيفة هذه الدالة هي وضع الاخطاء الناتجة عن فحص الملف
  */
  /**
   * Undocumented function
   *
   * @return void
   */
  private function setErrors()
  {
    /* فحص نوع الملف الذي سوف يرفع */
    if ($this->checkAllowType() == false) {
      $this->e[] = $this->startMessageBootstrab . self::messageTypeFile . $this->endMessageBootstrab;
    }
    /* فحص حجم الملف الذي سوف يرفع */
    if ($this->checkAllowSize() == false) {
      $this->e[] = $this->startMessageBootstrab . self::messageSizeFile . $this->endMessageBootstrab;
    }
  }
  /*
* وظيفة هذه الدالة عمل امتداد للملف وارجاعه
*/

  private function getFilePath()
  {
    if ($this->checkAllowType() != false && $this->checkAllowSize() != false) {
      $rand                      = substr(md5(uniqid(rand(), true)), 3, 10);
      $path                      = $this->uploadTo . '/' . $rand . '_' . time() . '.' . $this->getFileType();
      $this->filePathAfterUpload = $path;
      return $path;
    } else {
      return false;
    }
  }
  /*
* وظيفة هذه الدالة هي طباعة الاخطاء الناتجة عن فحص الملف
*/
  public function checkUpload()
  {
    if (isset($_FILES[$this->fileName]['error'])) {
      if ($_FILES[$this->fileName]['error'] > 0) {
        if ($_FILES[$this->fileName]["name"] == "") {
          echo  $this->startMessageBootstrab . "الرجاء اختيار ملف " . $this->endMessageBootstrab;
        } else {
          echo  $this->startMessageBootstrab . "هناك أخطاء مجهولة عددها:" . $_FILES[$this->fileName]['error'] . $this->endMessageBootstrab;
        }
        return false;
      }
    }
    if (!empty($this->e)) {
      foreach ($this->e as $errors) {
        echo  $errors;
      }
      return false;
    }
    //رفع الملف اذا لم تكن هناك اخطاء
    if ($this->checkAllowType() != false && $this->checkAllowSize() != false) {
      // بدء عملية الرفع
      $this->filePathAfterUpload = $this->getFilePath();
      $okUpload                  = move_uploaded_file($_FILES[$this->fileName]['tmp_name'], $this->filePathAfterUpload);
      if ($okUpload && $this->SuccessMessage == true) {
        echo  $this->startMessageBootstrabSuccess . $this->messageSuccess . $this->endMessageBootstrabSuccess;
      }
      echo  ' <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      </script>';
      return true;
    }
  }

  /**
   * دالة لتحديث الملفات
   *
   * @param [type] $table اسم الجدول
   * @param [String] $where  الشرط
   * @param [type] $oldUrl اسم حقل الرابط في قاعدة البيانات
   * @param [type] $newUrl اسم الملف المرسل ex ..  <input name="file" type="file" />    name = file  الاسم
   * @param [type] $uploadTo اسم المجلد الذي تريد الرفع اليه
   * @param [type] $SuccessMessage
   * @return void
   */
  public function updateFile($table, $where, $oldUrl, $newUrl, $uploadTo,$dirOldUrl='../', $SuccessMessage = null)
  {
    //عمل whereللشرط الثاني للتحديث في قاعدة البيانات
    $pos = strpos($where, "where");
    /*custom name */
    $where2 = substr($where, $pos + 5);

    // جلب الملف القديم
    $oldPath=$dirOldUrl;
    foreach ($this->show($table, $where) as $old) {
      $oldPath .= $old->$oldUrl;
    }
    //رفع الملف الجديد بدل القديم
    $newPath = $this->uploadFile($newUrl, $uploadTo, $SuccessMessage);

    $_POST['new'] = $newPath;

    $this->update($table, [$oldUrl => 'new'], $where2);
    //حذف القديم بعد الرفع
    if ($newPath != false) {
      if ($oldPath != null and file_exists($oldPath)) {
        $this->deleteFiles($oldPath);
        // عمل تحديث للرابط
      }
      return $newPath;
    } else {
      echo  '<div class="alert alert-warning">لم يتم تحديث الملف </div>';
      $_POST['new'] = $oldPath;
      $this->update($table, [$oldUrl => 'new'], $where2);
      return $oldPath;
    }
  }

  /*
* وظيفة هذه الدالة هي لحذف الملفات
*/
  public function deleteFiles($urlFile, $message = null)
  {
    if (unlink($urlFile) and $message != null) {
      echo  $this->startMessageBootstrabSuccess . $message . $this->startMessageBootstrabSuccess;
    };
  }
};
