<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/fedoen>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var fedoen\user\models\ResendForm $model
 */

$this->title = Yii::t('user', 'Request new confirmation message');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="d-flex justify-content-center">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <?= Html::a('<h3 class="mb-0"><b>' . Yii::$app->name . '</b></h3>', ['/site/index'], ['class' => 'link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover text-decoration-none']) ?>
        </div>
        <div class="card-body">
            <p class="login-box-msg"><?= Html::encode($this->title) ?></p>
            <?php
            $form = ActiveForm::begin([
                        'id' => 'password-recovery-form',
                        'enableAjaxValidation' => true,
                        'enableClientValidation' => false,
            ]);
            ?>
            <div class="input-group mb-3">
                <?= Html::activeTextInput($model, 'email', ['class' => 'form-control', 'placeholder' => 'Email', 'autofocus' => 'autofocus']) ?>
                <div class="input-group-text"><span class="bi bi-envelope-fill"></span></div>
            </div>
            <div clas='invalid-feedback'>
                <?= Html::error($model, 'email') ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'btn btn-primary btn-block w-100']) ?><br>
                </div>
                <!-- /.col -->
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>