<?php

namespace tests\_fixtures;

use yii\test\ActiveFixture;

class ProfileFixture extends ActiveFixture
{
    public $modelClass = 'fedoen\user\models\Profile';

    public $depends = [
        'tests\_fixtures\UserFixture'
    ];
}
