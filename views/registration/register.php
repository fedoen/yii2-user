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
 * @var fedoen\user\models\User $model
 * @var fedoen\user\Module $module
 */
$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="d-flex justify-content-center">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <?= Html::a('<h3 class="mb-0"><b>' . Yii::$app->name . '</b></h3>', ['/site/index'], ['class' => 'link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover text-decoration-none']) ?>
        </div>
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <?php
            $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'enableAjaxValidation' => true,
                        'enableClientValidation' => false,
                        'validateOnBlur' => false,
                        'validateOnType' => false,
                        'validateOnChange' => false,
                    ])
            ?>
            <div class="input-group mb-3">
                <?= Html::activeTextInput($model, 'email', ['class' => 'form-control', 'placeholder' => 'Email', 'autofocus' => 'autofocus']) ?>
                <div class="input-group-text"><span class="bi bi-envelope-fill"></span></div>
            </div>
            <div clas='invalid-feedback'>
                <?= Html::error($model, 'email') ?>
            </div>
            <div class="input-group mb-3">
                <?= Html::activeTextInput($model, 'username', ['class' => 'form-control', 'placeholder' => 'Username']) ?>
                <div class="input-group-text"><span class="bi bi-person-fill"></span></div>
            </div>
            <div clas='invalid-feedback'>
                <?= Html::error($model, 'username') ?>
            </div>
            <div class="input-group mb-3">
                <?= Html::activePasswordInput($model, 'password', ['class' => 'form-control', 'placeholder' => 'Password']) ?>
                <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            </div><!--begin::Row-->
            <div clas='invalid-feedback'>
                <?= Html::error($model, 'password') ?>
            </div>

            <div class="row">
                <div class="col-12">
                    <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-primary btn-block w-100']) ?><br>
                </div>
            </div><!--end::Row-->
            <div class="row">
                <!-- /.col -->
            </div>
            <?php ActiveForm::end(); ?>
        </div><!-- /.register-card-body -->
        <p class="text-center">
            <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
        </p>
    </div>
</div>