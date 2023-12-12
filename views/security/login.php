<?php
/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/fedoen>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use fedoen\user\models\LoginForm;
use fedoen\user\Module;
use fedoen\user\widgets\Connect;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var View $this
 * @var LoginForm $model
 * @var Module $module
 */
$this->title = Yii::t('user', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<div class="card card-outline card-primary">
    <div class="card-header"><a href="../index2.html" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
            <h1 class="mb-0"><b><?= Yii::$app->name ?></b>
            </h1>
        </a></div>
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
            <?php
            echo Html::activeTextInput($model, 'login', ['class' => 'form-control', 'placeholder' => 'Utilizator', 'autofocus' => 'autofocus']);
            echo Html::error($model, 'login');
            ?>
            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
        </div>
        <div class="input-group mb-3">
            <?php
            echo Html::activePasswordInput($model, 'password', ['class' => 'form-control', 'placeholder' => 'Utilizator']);
            echo Html::error($model, 'password');
            ?>
            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
        </div><!--begin::Row-->
        <div class="row">
            <div class="col-8">
                <div class="form-check">
                    <?=
                    Html::activeCheckbox($model, 'rememberMe', ['class' => 'form-check-input'])
                    ?>
                </div>
            </div><!-- /.col -->
            <div class="col-4">
                <div class="d-grid gap-2">
                    <?=
                    Html::submitButton(
                            Yii::t('user', 'Sign in'),
                            ['class' => 'btn btn-primary btn-block', 'tabindex' => '4']
                    )
                    ?>
                </div>
            </div><!-- /.col -->
        </div><!--end::Row-->
        <?php ActiveForm::end(); ?>
        <p class="text-center">- OR -</p>
        <?=
        Connect::widget([
            'baseAuthUrl' => ['/user/security/auth'],
        ])
        ?>
        <!-- /.social-auth-links -->
        <p class="mb-1"><?=
            $module->enablePasswordRecovery ?
                    Html::a(
                            Yii::t('user', 'Forgot password?'),
                            ['/user/recovery/request'],
                            ['tabindex' => '5']
                    ) : ''
            ?>
        </p>

        <?php if ($module->enableConfirmation): ?>
        <p class="mb-1">
                <?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
            </p>
        <?php endif ?>

            <?php if ($module->enableRegistration): ?>
                <p class="mb-0">
                    <?= Html::a(Yii::t('user', 'Don\'t have an account? Sign up!'), ['/user/registration/register']) ?>
                </p>
            <?php endif ?>
    </div><!-- /.login-card-body -->
</div>