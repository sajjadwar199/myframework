<?php
require 'ajax.class.php';
class formsMaker extends ajaxx
{
    /**
     *      forms  الكلاس مخصص لانشاء نماذج       
     * @auther sajjad kareem create in 2021/6/19 at  11:03 pm 
     */
    /**
     * for start form
     * @param['string'] $action ex.. index.php 
     * @param['string'] $method ex.. post,get
     * @param ['string'] $enctype for files upload
     * @param ['string'] $attrs for  extra options
     */
    public function formStart($action, $method = 'post', $enctype = 'multipart/form-data', $attrs = null)
    {
        $form = "";
        $form .= "<form action='$action' method='$method'  $attrs>";
        echo $form;
    }
    /*** for end form*/
    public function formEnd()
    {
        $form = "";
        $form .= "</form>";
        echo $form;
    }
    /**
     * text input 
     * $attrs       وظيفة المتغير هي اذا كانت هناك خصائص اخرى يمكن اضافتها  
     * @param[string] $name  ex..   fruts  
     * @param[string] $placeholder  ex..   fruts  
     */
    public function textInput($name, $placeholder = null, $attrs = null)
    {
        $input = "";
        $input .= "<input type='text' name='$name'   placeholder='$placeholder'   class='form-control' $attrs/>";
        echo $input;
    }
    /**
     * password input 
     * $attrs      وظيفة المتغير هي اذا كانت هناك خصائص اخرى يمكن اضافتها مثل  
     * @param[string] $name  ex..   fruts
     * @param[string] $placeholder  ex..   fruts  
     */
    public function passwordInput($name, $placeholder = null, $attrs = null)
    {
        $input = "";
        $input .= "<input  name='$name'  placeholder='$placeholder' type='password' class='form-control' $attrs/>";
        echo $input;
    }
    /**
     * number input 
     * $attrs       وظيفة المتغير هي اذا كانت هناك خصائص اخرى يمكن اضافتها  
     * @param[string] $name  ex..   fruts  
     * @param[string] $placeholder  ex..   fruts  
     */
    public function numberInput($name, $placeholder = null, $attrs = null)
    {
        $input = "";
        $input .= "<input type='number' name='$name'   placeholder='$placeholder'   class='form-control' $attrs/>";
        echo $input;
    }
    /**
     * number input 
     * $attrs       وظيفة المتغير هي اذا كانت هناك خصائص اخرى يمكن اضافتها  
     * @param[string] $name  ex..   fruts  
     * @param[string] $placeholder  ex..   fruts  
     */
    public function emailInput($name, $placeholder = null, $attrs = null)
    {
        $input = "";
        $input .= "<input type='email' name='$name'   placeholder='$placeholder'   class='form-control' $attrs/>";
        echo $input;
    }
    /**
     * textarea input 
     * $attrs      وظيفة المتغير هي اذا كانت هناك خصائص اخرى يمكن اضافتها مثل  
     * @param[string] $name  ex..   fruts
     * @param[string] $placeholder  ex..   fruts  
     */
    public function textareaInput($name, $placeholder = null, $attrs = null)
    {
        $input = "";
        $input .= "<textarea class='form-control'  name='$name'  placeholder='$placeholder' type='password'   id='exampleFormControlTextarea1' rows='3' $attrs></textarea>";
        echo $input;
    }
    /**
     * file input 
     * $attrs      وظيفة المتغير هي اذا كانت هناك خصائص اخرى يمكن اضافتها مثل  
     * @param[string] $name  ex..   fruts
     * @param[string] $placeholder  ex..   fruts  
     */
    public function fileInput($name, $placeholder = null, $attrs = null)
    {
        $input = "<div class='custom-file'>";
        $input .= "<input  name='$name'  placeholder='$placeholder' type='file'  class='custom-file-input' id='customFileLangHTML'  $attrs/>";
        $input .= " <label class='custom-file-label' for='customFile'>$placeholder</label>      ";
        $input .= '</div>';
        echo $input;
    }
    /**
     * select input 
     * @param[array] $options  ex.. apple,banana
     *  @param[string] $selectedOption  ex..   please select this 
     *  @param[string] $name  ex..   fruts
     */
    public function selectInput($name, $selectedOption, $options = array())
    {
        echo "<select name='$name' class='form-control' aria-label='Default select example'>";
        $input = "<option selected disabled>$selectedOption</option>";
        foreach ($options as $op) {
            $input .= "<option value='$op' type='text' class='form-control'/>$op</option>";
        }
        echo $input;
        echo '</select>';
    }
    /**
     * checkbox input 
     * $attrs      وظيفة المتغير هي اذا كانت هناك خصائص اخرى يمكن اضافتها مثل  
     * @param[string] $name  ex..   fruts
     * @param[string] $placeholder  ex..   fruts 
     * @param[string] $value  ex..   1 or 0 or true   
     */
    public function checkboxInput($name, $value, $placeholder = null, $attrs = null)
    {
        $input = "<div class='form-check'> ";
        $input .= "<input  name='$name' class='form-check-input' type='checkbox' value='$value' id='flexCheckDefault' $attrs/>";
        $input .= "<label class='form-check-label' for='flexCheckDefault'>$placeholder</label>      ";
        $input .= '</div>';
        echo $input;
    }
    /**
     * radio input 
     * $attrs      وظيفة المتغير هي اذا كانت هناك خصائص اخرى يمكن اضافتها مثل  
     * @param[string] $name  ex..   fruts
     * @param[array] $options  ex..   ['apple','banana','tomato']  
     */
    public function radioInput($name, $options = array(), $attrs = null)
    {
        $input = "<div class='form-check form-check-inline'> ";
        foreach ($options as $op) {
            $input .= "<input class='form-check-input' type='radio' name='$name' id='inlineRadio1' value='$op'>";
            $input .= "<label class='form-check-label' for='inlineRadio1'>$op</label> ";
        }
        $input .= '</div>';
        echo $input;
    }
};
