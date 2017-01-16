<?php

namespace vekqaam;

use Yii;
use yii\base\Module;
use yii\i18n\PhpMessageSource;

class QaaManager extends Module
{
    /**
     * Имя компонента соединения с БД
     *
     * @var string
     */
    public $db = 'db';

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function init()
    {
        parent::init();

        $this->defaultRoute = 'main';
        $this->controllerNamespace = 'vekqaam\controllers';

        if (Yii::$app instanceof \yii\console\Application) {
            $this->controllerNamespace = 'vekqaam\console\controllers';
        }

        $this->registerTranslations();
    }

    /**
     * Иницииализируем i18n
     *
     * @return void
     */
    public function registerTranslations()
    {
        \Yii::$app->i18n->translations['vekqaam'] = [
            'class' => PhpMessageSource::class,
            'sourceLanguage' => 'en',
            'basePath' => '@vekqaam/messages',
            'fileMap' => [
                'vekqaam' => 'vekqaam.php'
            ],
        ];
    }
}
