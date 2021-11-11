<?php
namespace App\Models;
use Yii;
use yii\base\Model;

class Zapros1 extends Model{
    public $id_sotrudnika;
    public $uprav_name;
    public $object_name;
    public $date_nachalo;
    public $date_end;
    public $date_cdachi;
    public $job_name;
    public $check;


    public function rules()
    {
        return[[['id_sotrudnika', 'uprav_name','object_name', 'date_nachalo', 'date_end', 'date_cdachi', 'job_name','check'],'required'],];
    }


}