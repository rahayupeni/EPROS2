<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Aktifitas */

$this->title = 'Create Aktifitas';
$this->params['breadcrumbs'][] = ['label' => 'Aktifitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aktifitas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
