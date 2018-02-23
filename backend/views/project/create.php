<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Project */

$this->title = '添加项目';
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
