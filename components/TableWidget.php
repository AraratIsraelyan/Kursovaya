<?php
namespace app\components;
use yii\base\Widget;
use app\models\StroiUprav;
use yii\data\Pagination;

class TableWidget extends Widget{
    public function run(){
        $query = StroiUprav::find();
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
        $queries= $query->orderBy('id_uprav')
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        return  $this->render('table',['table'=>$queries, 'pagination' => $pagination]) ;
    }
}
?>
