<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BranchesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branches-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'branch_name') ?>

    <?= $form->field($model, 'branch_address') ?>

    <?= $form->field($model, 'branch_status') ?>

    <?= $form->field($model, 'branch_created_time') ?>

    <?php // echo $form->field($model, 'companies_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
