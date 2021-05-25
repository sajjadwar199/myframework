<?php
require 'backupData.class.php';
/* CLASS CREATE BY SAJJAD KAREEM
*create in 2020/11/27    12:57 pm
*وظيفة الكلاس هي جعل الصفحات ماستر بيج
* طريقة الاستدعاء
*   ex: $OBJ->master('main','../dashbord/header','../dashbord/footer','../../public/template/');
*/
class masterpage extends backupData
{
  /* عنوان الصفحة */
  private $titlePage;
  /* مكان ملفات القالب */
  private $templateFileUrl;
  /* مكان عنوان الجزء الاول من الماستر بيج */
  private $startSectionName;
  /* عنوان مكان الجزء الثاني من الماستر بيج */
  private $endSectionName;
  /* الدالة الرئيسية للاستدعاء */
  //urlDir  امتداد روابط الصفحات      ex ../views/home
  private $urlDir;
  public function master($titlePage, $startSectionName, $endSectionName, $templateFileUrl, $urlDir = null)
  {
    $this->templateFileUrl = $templateFileUrl;
    $this->titlePage = $titlePage;
    $this->startSectionName = $startSectionName;
    $this->endSectionName = $endSectionName;
  }
  /* دالة تخصص عنوان الصفحة */
  public  function setTitle()
  {
    return define('title', $this->titlePage);
  }
  /* دالة تخصص امتداد الروابط مثل ../../ */
  public function setUrlDir()
  {
    return define('Dir', $this->templateFileUrl);
  }
  /* دالة تخصص الجزء الاول للقالب  */
  public function startSection()
  {
    $this->setTitle();
    $this->setUrlDir();
    define('urlDir', $this->urlDir);
    return   include    $this->startSectionName . '.php';
  }
  /* دالة تخصص الجزء الثاني للقالب  */
  public function endSection()
  {

    return include  $this->endSectionName . '.php';
  }
};
