<?php

use kartik\widgets\StarRating;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProposalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proposals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proposal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Proposal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'file',
                'format' => 'html',
                'label' => 'File Proposal',
                'value' => function ($data){
                    return Html::a($data['file'], ['lihat', 'id' => $data['idproposal']]);
                }
            ],
            [
                'attribute' => 'dari',
                'format' => 'html',
                'label' => 'Pengirim',
                'value' => function ($data){
                    $user  = \backend\models\Users::find()->where(['username' => $data['dari']])->one();
                    return Html::a($data['dari'], ['/users/view', 'id' => $user->id]);
                }
            ],
            [
                'attribute' => 'ke',
                'format' => 'html',
                'label' => 'Penerima',
                'value' => function ($data){
                    $user  = \backend\models\Users::find()->where(['username' => $data['ke']])->one();
                    return Html::a($data['ke'], ['/users/view', 'id' => $user->id]);
                }
            ],
            [
                'attribute' => 'level',
                'format' => 'html',
                'label' => 'Ratting',
                'value' => function ($data){
                    if ($data['level'] == 0){
                        return "<i class=\"glyphicon glyphicon-star-empty\" ></i><i class=\"glyphicon glyphicon-star-empty\" ></i><i class=\"glyphicon glyphicon-star-empty\" ></i><i class=\"glyphicon glyphicon-star-empty\" ></i><i class=\"glyphicon glyphicon-star-empty\" ></i> ";
                    }elseif ($data['level'] == 1){
                        return "<i class=\"glyphicon glyphicon-star\" ></i><i class=\"glyphicon glyphicon-star-empty\" ></i><i class=\"glyphicon glyphicon-star-empty\" ></i><i class=\"glyphicon glyphicon-star-empty\" ></i><i class=\"glyphicon glyphicon-star-empty\" ></i> ";
                    }elseif ($data['level'] == 2){
                        return "<i class=\"glyphicon glyphicon-star\" ></i><i class=\"glyphicon glyphicon-star\" ></i><i class=\"glyphicon glyphicon-star-empty\" ></i><i class=\"glyphicon glyphicon-star-empty\" ></i><i class=\"glyphicon glyphicon-star-empty\" ></i> ";
                    }elseif ($data['level'] == 3){
                        return "<i class=\"glyphicon glyphicon-star\" ></i><i class=\"glyphicon glyphicon-star\" ></i><i class=\"glyphicon glyphicon-star\" ></i><i class=\"glyphicon glyphicon-star-empty\" ></i><i class=\"glyphicon glyphicon-star-empty\" ></i> ";
                    }elseif ($data['level'] == 4) {
                        return "<i class=\"glyphicon glyphicon-star\" ></i><i class=\"glyphicon glyphicon-star\" ></i><i class=\"glyphicon glyphicon-star\" ></i><i class=\"glyphicon glyphicon-star\" ></i><i class=\"glyphicon glyphicon-star-empty\" ></i> ";
                    }else {
                        return "<i class=\"glyphicon glyphicon-star\" ></i><i class=\"glyphicon glyphicon-star\" ></i><i class=\"glyphicon glyphicon-star\" ></i><i class=\"glyphicon glyphicon-star\" ></i><i class=\"glyphicon glyphicon-star\" ></i> ";
                    }
                }
            ],
            [
                'attribute' => 'status',
                'format' => 'html',
                'label' => 'Status Proposal',
                'value' => function ($data){
                    if ($data['status'] == 0){
                        return "Proposal Belum di Nilai ";
                    }elseif ($data['status'] == 1){
                        return "Proposal Belum di Nilai ";
                    }elseif ($data['status'] == 2){
                        return "Proposal Sudah dikirim ke Penerima";
                    }elseif ($data['status'] == 3){
                        return "Proposal Sudah dibaca oleh Penerima ";
                    }
                }
            ],
            [
                'attribute' => '',
                'format' => 'html',
                'label' => 'Rate',
                'value' => function ($data){
                    return Html::a('Rate', ['lihat', 'id' => $data['idproposal']], ['class' => 'btn btn-success']);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

    echo StarRating::widget([
        'name' => 'rating_35',
        'value' => 3,
        'pluginOptions' => ['displayOnly' => true]
    ]);
    ?>

</div>
