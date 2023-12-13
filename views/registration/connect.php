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
 * @var yii\widgets\ActiveForm $form
 * @var fedoen\user\models\User $model
 * @var fedoen\user\models\Account $account
 */
$this->title = Yii::t('user', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="d-flex justify-content-center">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <?= Html::a('<h3 class="mb-0"><b>' . Yii::$app->name . '</b></h3>', ['/site/index'], ['class' => 'link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover text-decoration-none']) ?>
        </div>
        <div class="card-body">
            <div class="alert alert-info">
                <p>
                    <?=
                    Yii::t(
                            'user',
                            'In order to finish your registration, we need you to enter following fields'
                    )
                    ?>:
                </p>
            </div>
            <?php
            $form = ActiveForm::begin([
                        'id' => 'connect-account-form',
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
            <div class="input-group mb-3">
                <?= Html::activeTextInput($model, 'username', ['class' => 'form-control', 'placeholder' => 'Username']) ?>
                <div class="input-group-text"><span class="bi bi-person-fill"></span></div>
            </div>
            <div clas='invalid-feedback'>
                <?= Html::error($model, 'username') ?>
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
    <p class="text-center">
        <?=
        Html::a(
                Yii::t(
                        'user',
                        'If you already registered, sign in and connect this account on settings page'
                ),
                ['/user/settings/networks']
        )
        ?>.
    </p>
</div>