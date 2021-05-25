<?php
require 'masterpage.class.php';
class ajaxx extends masterpage
{
    /**
     * وظيفة هذا الكلاس للتعامل مع جميع عمليات الاجاكس
     * create by sajjad kareem  at  2020/12/8
     */
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    /**
     * اسم الصفحة التي نجلب منها البيانات
     *
     * @var [string]
     */
    private $AjaxPageName;
    /**
     * وظيفة هذا المتغير هو لجمع البيانات  لأرسالها
     *
     * @var array
     */
    private $dataRequest = [];
    /**
     * وظيفة هذا المغير هو لتحديد المكان الذي تعرض فيه البيانات
     *
     * @var [type]
     */
    private $divShowId;
    /**
     * json وظيفة هذا المتغير هو لتحديد نوع البيانات التي نستقبلها مثلا اذا كانت
     *
     * @var [type]
     */
    private $dataType = 'text';
    /**
     *  post ,get وضيفة المتغير هو لتحديد نوع الطلب اذا كان
     *
     * @var [type]
     */
    private $typeRequest = 'post';
    /**
     *  دالة الأستدعاء الرئيسية
     * @param $event ex .. ['btn'=>'click']
     * @param $spinnerId ex ..spinner علامة جاري التحميل
     * @param [string] $pageName   اسم  صفحة الاجاكس
     * @param [string] $divShowId   معرف مكان عرض البيانات
     * @param [string] $data   ex .. ["name","age"]   البيانات
     * @param [array] $data   ex .. [["name"=>"file"]]   لارسال ملف
     * @param [string] $method   ex .. post or get
     * @param [string] $dataType   ex .. json or text
     * @return void
     */
    /**
     * وظيفة المتغير  هو ليضم اسم معرف التحميل قبل الاستجابة
     *
     * @var [string]
     */
    private $spinnerId;
public function ajax($AjaxPageName, $divShowId, $event, $loaderId = null, $data = null, $method = null, $dataType = null)
{
    $this->AjaxPageName = $AjaxPageName;
    $this->divShowId = $divShowId;
    $this->spinnerId = $loaderId;
    if ($method != null) {
        $this->typeRequest = $method;
    }
    if ($dataType != null) {
        $this->dataType = $dataType;
    }
    if ($data != null) {
        $this->dataRequest = $data;
        foreach ($event as $key => $value) {
            $this->send($key, $value);
        }
    } else if ($data == null) {
        foreach ($event as $key => $value) {
            $this->load($key, $value);
        }
    }
}
    /**
     * وظيفة هذه الدالة تقوم بارجاع النتيجة للصفحة
     *
     * @return void
     */
private function load($eventId, $event)
{
            if ($this->spinnerId != null) {
    ?>
                <script>
                    $(document).ready(function() {
                        $('#<?php echo $eventId; ?>').<?php echo $event; ?>(function() {
                            <?php if ($event == 'click') { ?>
                                $('#<?php echo $eventId; ?>').attr('disabled', 'disabled');
                                <?php  }; ?>$('#<?php echo $this->spinnerId; ?>').show();
                                $.ajax({
                                    url: "<?php echo  $this->AjaxPageName; ?>",
                                    method: "<?php echo $this->typeRequest; ?>",
                                    type: '<?php echo  $this->dataType;  ?>',
                                    success: function(data) {
                                        $('#<?php echo $this->spinnerId; ?>').append(data.data);
                                        $('#<?php echo  $this->divShowId; ?>').append().html(data);
                                        $('#<?php echo $eventId; ?>').removeAttr('disabled');
                                    }
                                }).done(function() {
                                    $('#<?php echo $this->spinnerId; ?>').hide();
                                });
                        })
                    });
                </script>
            <?php
                return true;
            } else {
            ?>
                <script>
                    $(document).ready(function() {
                        $('#<?php echo $eventId; ?>').<?php echo $event; ?>(function() {
                            <?php if ($event == 'click') { ?>
                                $('#<?php echo $eventId; ?>').attr('disabled', 'disabled');
                            <?php  }; ?>
                            $.ajax({
                                url: "<?php echo  $this->AjaxPageName; ?>",
                                method: "<?php echo $this->typeRequest; ?>",
                                type: '<?php echo  $this->dataType;  ?>',
                                success: function(data) {
                                    $('#<?php echo  $this->divShowId; ?>').append().html(data);
                                    $('#<?php echo $eventId; ?>').removeAttr('disabled');
                                }
                            })
                        })
                    });
                </script>
            <?php
                return true;
            }
    }

    /**
     * تقوم هذه الدالة بأرسال القيم عبر  اجاكس
     *   @param $eventId ex  ..("#btn");
     *   @param   $event  ex .. click ,keyUp,keyDown
     *   @param  [bool]     $emptyvaluesAfter   يستخدم لتفريغ الحقول بعد انتهاء طلب اجاكس ويأخذ true  تفريغ,false لا تفريغ
     *   @return void
     */
 private function send($eventId, $event,$emptyvaluesAfter=false)
{
            if ($this->spinnerId != null) {
            ?>
                <script>
                    $(document).ready(function() {
                        $('#<?php echo $eventId; ?>').<?php echo $event; ?>(function() {
                            <?php if ($event == 'click') { ?>
                                $('#<?php echo $eventId; ?>').attr('disabled', 'disabled');
                            <?php  }; ?>
                            var form_data = new FormData();
                            <?php
                            $filecount = -1;
                            foreach ($this->dataRequest  as $data) {
                                if (is_array($data)) {
                                    foreach ($data as $k => $v) {
                                        if ($v == 'file') {
                                            // فحص اذا كان post القادم هو ملف
                                            $filecount = $filecount + 1;
                            ?>
                                            var <?php echo $k; ?> = $('#<?php echo $k; ?>').prop('files')[0];
                                            <?php
                                            ?> form_data.append('<?php echo $k; ?>', <?php echo $k; ?>);
                                    <?php
                                        }
                                    }
                                } elseif (!is_array($data)) {
                                    //اذا كانت البيانات ليست ملف
                                    ?>
                                    var <?php echo $data; ?> = $('#<?php echo  $data; ?>').val();
                                    <?php
                                    //مرحلة جمع بيانات الفورم
                                    ?> form_data.append('<?php echo $data; ?>', <?php echo $data; ?>);
                            <?php
                                }
                            }
                            ?>
                            $('#<?php echo $this->spinnerId; ?>').show();
                            $.ajax({
                                url: "<?php echo  $this->AjaxPageName; ?>",
                                method: "<?php echo $this->typeRequest; ?>",
                                type: '<?php echo  $this->dataType;  ?>',
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: form_data,
                                success: function(data) {
                                    $('#<?php echo $this->spinnerId; ?>').append(data.data);
                                    $('#<?php echo  $this->divShowId; ?>').append().html(data);
                                    $('#<?php echo $eventId; ?>').removeAttr('disabled');
                                    <?php
    //if user should empty inputs
                                if($emptyvaluesAfter==true){
                                    //لافراغ مربعات النموذج بعد الارسال
                                    foreach ($this->dataRequest as $vars) {
                                    ?>
                                        <?php if (!is_array($vars)) {   ?>
                                            <?php
                                            echo $vars . ':' ?>$('#<?php echo $vars;  ?>').val('')
                                        <?php
                                        }
                                    //لافراغ مربعات الملفات بعد الارسال
                                    if(is_array($vars)){
                                        foreach($vars as $kk=>$vv){
                                            if($vv=='file'){
                                                ?>
                                        <?php echo $kk . ':' ?>$('#<?php echo $kk;  ?>').val('')
                                            <?php
                                            }
                                        }
                            }
                                    }
                                    }else if($emptyvaluesAfter==false){

                                    }
                                    ?>

                                }
                            }).done(function() {
                                $('#<?php echo $this->spinnerId; ?>').hide();
                            });
                        })
                    });
                </script>
            <?php
                return true;
            } else {
            ?>
                <script>
                    $(document).ready(function() {
                        $('#<?php echo $eventId; ?>').<?php echo $event; ?>(function() {
                            <?php if ($event == 'click') { ?>
                                $('#<?php echo $eventId; ?>').attr('disabled', 'disabled');
                            <?php  }; ?>
                            var form_data = new FormData();
                            <?php
                            $filecount = -1;
                            foreach ($this->dataRequest  as $data) {
                                if (is_array($data)) {
                                    foreach ($data as $k => $v) {
                                        if ($v == 'file') {
                                            // فحص اذا كان post القادم هو ملف
                                            $filecount = $filecount + 1;
                            ?>
                                            var <?php echo $k; ?> = $('#<?php echo $k; ?>').prop('files')[0];
                                            <?php
                                            ?> form_data.append('<?php echo $k; ?>', <?php echo $k; ?>);
                                    <?php
                                        }
                                    }
                                } elseif (!is_array($data)) {
                                    //اذا كانت البيانات ليست ملف
                                    ?>
                                    var <?php echo $data; ?> = $('#<?php echo  $data; ?>').val();
                                    <?php
                                    //مرحلة جمع بيانات الفورم
                                    ?> form_data.append('<?php echo $data; ?>', <?php echo $data; ?>);
                            <?php
                                }
                            }
                            ?>
                            $.ajax({
                                url: "<?php echo  $this->AjaxPageName; ?>",
                                method: "<?php echo $this->typeRequest; ?>",
                                type: '<?php echo  $this->dataType;  ?>',
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: form_data,
                                success: function(data) {
                                    $('#<?php echo  $this->divShowId; ?>').append().html(data);
                                    $('#<?php echo $eventId; ?>').removeAttr('disabled');
                                    <?php
                                    if($emptyvaluesAfter==true){
                                    //لافراغ مربعات النموذج بعد الارسال
                                    foreach ($this->dataRequest as $vars) {
                                    ?>
                                        <?php if (!is_array($vars)) {   ?>
                                            <?php
                                            echo $vars . ':' ?>$('#<?php echo $vars;  ?>').val('')
                                        <?php
                                        }
                                    //لافراغ مربعات الملفات بعد الارسال
                                    if(is_array($vars)){
                                                foreach($vars as $kk=>$vv){
                                                    if($vv=='file'){
                                                        ?>
                                                <? echo $kk . ':' ?>$('#<?php echo $kk;  ?>').val('')
                                                    <?php
                                                    }
                                                }
                                    }
                                    }
                                }else if($emptyvaluesAfter==false){

                                    }
                                    ?>


                                }
                            })
                        })
                    });
                </script>
            <?php
                return true;
            }
    }


    /**
     *وظيفة الدالة هي لعمل تعديل للبيانات   وارسال  id  الجدول
    *
    * @param [string] $editBtnclassName   ex.. $('.edit_data').click()    = >  .edit_data
    * @param [string] $pageUrl  'ajax/edit'
    * @param [string] $method  ex ..post  ,get
    * @param [string] $idNamePost  اسم  post id للصفحة الثانية   ex  id   او   n_id idNamePost='id' ,idNamePost='u_id'
    * @param assocarray $inputsupdateIDs     حقول ادخال التعديل     ["(<input id='city') الخاص بلمدخل  (id)المعرف  "=>"name of cols in table database"]  ex ["name2"=>'name',"age2"=>'age',"city3"=>'city']
    * @return void
    */
public function AjaxupdateSendId($editBtnclassName,$pageUrl,$idNamePost,$inputsupdateIDs=array(),$method='post'){
    ?>
    <script>
    $(document).ready(function() {
                        $('.<?php echo $editBtnclassName;?>').click(function() {
            var id = $(this).attr("id");
            $.ajax({
                    url:"<?php  echo $pageUrl; ?>",
                    method:"<?php echo  $method; ?>",
                    data:{<?php  echo $idNamePost; ?>:id},
                    dataType:"json",
                    success:function(data){
                        <?php
                                                //  $valueinputsName اسم ايدي  مربع الادخال فيhtml  $colTableinputNameاسم حقل المدخل في جدول قاعدة البيانات
                        foreach($inputsupdateIDs as $valueinputsName =>$colTableinputName){
                            ?>
                            $('#<?php echo $valueinputsName; ?>').val(data.<?php echo $colTableinputName; ?>);
                            <?php
                        }
                        ?>
                    }
                })
                    });
                });
    </script>

    <?php
}
/**
 *  وظيفة الدالة هي لارسال id معين
 * لاستقبال قيمة معينة من اجل الحذف او العرض 
 *
 * @param [type] $BtnclassName  ex ..  .showcards
 *  @param [type] $showDivId id div الخاص بلعرضالعنصر
 * @param [type] $pageUrl 'ajax/edit'
 * @param [type] $loader   loader ajax  ex.. loaderdata
 * @param [type] $idNamePost اسم  post id للصفحة الثانية   ex  id   او   n_id idNamePost='id' ,idNamePost='u_id'
 * @param string $method   post,get
 * @return void
 */
public function AjaxSendId($BtnclassName,$pageUrl,$idNamePost,$showDivId,$loader=null,$method='post'){
    if($loader!=null){
    ?>

    <script>
    $(document).ready(function() {
                        $('.<?php echo $BtnclassName;?>').click(function() {
            var id = $(this).attr("id");
            $('#<?php echo $loader; ?>').show();

            $.ajax({
                    url:"<?php  echo $pageUrl; ?>",
                    method:"<?php echo  $method; ?>",
                    data:{<?php  echo $idNamePost; ?>:id},
                    dataType:"json",
                    success:function(data){
                        $('#<?php  echo $showDivId; ?>').append().html(data);
                    }
                }).done(function() {
                                $('#<?php echo $loader; ?>').hide();
                            });
                    });
                });
    </script>

    <?php
    }else if($loader==null){
        ?>

        <script>
        $(document).ready(function() {
                            $('.<?php echo $BtnclassName;?>').click(function() {
                var id = $(this).attr("id");
                $.ajax({
                        url:"<?php  echo $pageUrl; ?>",
                        method:"<?php echo  $method; ?>",
                        data:{<?php  echo $idNamePost; ?>:id},
                        dataType:"json",
                        success:function(data){
                            $('#<?php  echo $showDivId; ?>').append().html(data);
                        }
                    })
                        });
                    });
        </script>

        <?php

    }
}







    /**
     * وظيفة الدالة هي لتحميل البيانات عند تحميل الصفحة
     *
     * @param [type] $divShowId
     * @param [type] $ajaxPageName
     * @param string $method
     * @param string $type
     * @param string $loaderId
     * @param bool $liveload ex  .. true or false  لجعل تحميل اجاكس في الوقت الحالي
     * @param number $timeajaxload ex  ..الوقت المستغرق لتحميل صفحة اجاكس   مثلا كل ثانية 1000
     *
     * @return void
     */
    public function ajaxLoad($ajaxPageName, $divShowId, $loaderId = null,$liveload=false,$timeajaxload=1000, $method = null, $type = null)
    {
        if ($method == null) {
            $method = 'get';
        }
        if ($type == null) {
            $type = 'text';
        }
        if ($loaderId != null) {
        ?>
            <script>
                $(document).ready(function() {
                    $(window).ready(function() {
                        $('#<?php echo $loaderId; ?>').show();
                         <?php  if($liveload==true){?>
                            setInterval(function(){
                                $.ajax({
                            url: "<?php echo  $ajaxPageName; ?>",
                            method: "<?php echo $method; ?>",
                            type: "<?php echo $type; ?>",
                            success: function(data) {
                                $('#<?php echo $loaderId; ?>').append(data.data);
                                $('#<?php echo $divShowId; ?>').append().html(data);
                            }
                        }).done(function() {
                            $('#<?php echo $loaderId; ?>').hide();
                        });
                            },<?php echo $timeajaxload;?>)

<?php }else{?>
    $.ajax({
                    url: "<?php echo  $ajaxPageName; ?>",
                            method: "<?php echo $method; ?>",
                            type: "<?php echo $type; ?>",
                            success: function(data) {
                                $('#<?php echo $loaderId; ?>').append(data.data);
                                $('#<?php echo $divShowId; ?>').append().html(data);
                            }
                        }).done(function() {
                            $('#<?php echo $loaderId; ?>').hide();
                        });

    <?php } ?>
                    });
                });
            </script>
        <?php
        } else if ($loaderId == null) {
        ?>
            <script>
                $(document).ready(function() {
                    $(window).ready(function() {

 <?php if($liveload==true){ ?>
    setInterval(function(){
                        $.ajax({
                            url: "<?php echo  $ajaxPageName; ?>",
                            method: "<?php echo $method; ?>",
                            type: "<?php echo $type; ?>",
                            success: function(data) {
                                $('#<?php echo $divShowId; ?>').append().html(data);
                            }
                        });
                    },<?php echo $timeajaxload;?>);
<?php }else {?>
    $.ajax({
                            url: "<?php echo  $ajaxPageName; ?>",
                            method: "<?php echo $method; ?>",
                            type: "<?php echo $type; ?>",
                            success: function(data) {
                                $('#<?php echo $divShowId; ?>').append().html(data);
                            }
                        });

    <?php } ?>
                    });
                });
            </script>
<?php
        }
    }
};
