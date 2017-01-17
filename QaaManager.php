<?php

namespace vekqaam;

use Yii;
use yii\base\ErrorException;
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
     *
     * @throws ErrorException - не найден компонент для подключения к БД
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

        $this->checkConnectionComponent();
    }

    /**
     * Иницииализируем i18n
     *
     * @return void
     */
    protected function registerTranslations()
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

    /**
     * Проверяем на наличие компонента для подключения с БД
     *
     * @return void
     *
     * @throws ErrorException - не найден компонент для подключения к БД
     */
    protected function checkConnectionComponent()
    {
        if (!\Yii::$app->has($this->db)) {
            throw new ErrorException(Yii::t('vekqaam', 'Connection component not found'));
        }
    }
}
