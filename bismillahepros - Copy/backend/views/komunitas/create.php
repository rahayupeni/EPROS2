<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Komunitas */

$this->title = 'Create Komunitas';
$this->params['breadcrumbs'][] = ['label' => 'Komunitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="komunitas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
