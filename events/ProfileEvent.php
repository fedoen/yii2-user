<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/fedoen/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace fedoen\user\events;

use fedoen\user\models\Profile;
use yii\base\Event;

/**
 * @property Profile $model
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class ProfileEvent extends Event
{
    /**
     * @var Profile
     */
    private $_profile;

    /**
     * @return Profile
     */
    public function getProfile()
    {
        return $this->_profile;
    }

    /**
     * @param Profile $form
     */
    public function setProfile(Profile $form)
    {
        $this->_profile = $form;
    }
}
