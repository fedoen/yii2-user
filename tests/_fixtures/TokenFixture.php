<?php

namespace tests\_fixtures;

use yii\test\ActiveFixture;

class TokenFixture extends ActiveFixture
{
    public $modelClass = 'fedoen\user\models\Token';

    public $depends = [
        'tests\_fixtures\UserFixture'
    ];
}
