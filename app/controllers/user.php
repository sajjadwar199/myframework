<?php
class user extends core
{
/**
 * لتركيب القالب على الصفحة بداية
 *
 * @return void
 */
    public function masterPageStart()
    {
        $this->master('المستخدمين', '../../public/includes/header', '../../public/includes/footer', '../../public/template/', '../../public/views/');
        $this->startSection();
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
    /**
     * محتوى الصفحة
     *
     * @return void
     */
    public function content()
    {

    }
};
