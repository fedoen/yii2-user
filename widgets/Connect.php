<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/fedoen>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace fedoen\user\widgets;

use Yii;
use yii\authclient\ClientInterface;
use yii\authclient\widgets\AuthChoice;
use yii\authclient\widgets\AuthChoiceAsset;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class Connect extends AuthChoice
{

    /**
     * @var array|null An array of user's accounts
     */
    public $accounts;

    /**
     * @inheritdoc
     */
    public $options = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        AuthChoiceAsset::register(Yii::$app->view);
        if ($this->popupMode) {
            Yii::$app->view->registerJs("\$('#" . $this->getId() . "').authchoice();");
        }
        $this->options['id'] = $this->getId();
        echo Html::beginTag('div', $this->options);
    }

    /**
     * @inheritdoc
     */
    public function createClientUrl($provider)
    {
        if ($this->isConnected($provider)) {
            return Url::to(['/user/settings/disconnect', 'id' => $this->accounts[$provider->getId()]->id]);
        } else {
            return parent::createClientUrl($provider);
        }
    }

    /**
     * Checks if provider already connected to user.
     *
     * @param ClientInterface $provider
     *
     * @return bool
     */
    public function isConnected(ClientInterface $provider)
    {
        return $this->accounts != null && isset($this->accounts[$provider->getId()]);
    }

    /**
     * Renders the main content, which includes all external services links.
     * @return string the rendering result.
     */
    protected function renderMainContent()
    {
        $items = [];
        foreach ($this->getClients() as $externalService) {
            if ($externalService->getName() === 'facebook') {
                $items[] = $this->renderCustomFacebookButton($externalService);
            } elseif ($externalService->getName() === 'google') {
                $items[] = $this->renderCustomGoogleButton($externalService);
            } else {
                $items[] = $this->clientLink($externalService);
            }
        }
        return Html::tag('div', implode('', $items), ['class' => 'social-auth-links text-center mb-3 d-grid gap-2']);
    }

    /**
     * Renders a custom Facebook button.
     * @param \yii\authclient\ClientInterface $client the external auth client instance.
     * @return string the rendering result
     */
    protected function renderCustomFacebookButton($client)
    {
        $title = Yii::t('user', 'Connect with Facebook');
        $icon = '<i class="bi bi-facebook me-2"></i>'; // Adjust icon HTML as needed
        $url = $this->createClientUrl($client);

        return Html::a($icon . ' ' . Html::encode($title), $url, [
                    'class' => 'btn btn-primary btn-facebook',
                        // Add any other options for the link here
        ]);
    }

    /**
     * Renders a custom Google button.
     * @param \yii\authclient\ClientInterface $client the external auth client instance.
     * @return string the rendering result
     */
    protected function renderCustomGoogleButton($client)
    {
        $title = Yii::t('user', 'Connect with Google');
        $icon = '<i class="bi bi-google me-2"></i>'; // Adjust icon HTML as needed
        $url = $this->createClientUrl($client);

        return Html::a($icon . ' ' . Html::encode($title), $url, [
                    'class' => 'btn btn-danger btn-google',
        ]);
    }
}
