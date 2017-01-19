Yii2 Questions And Answers Module
=================================

This simple Yii 2.0 module for manage Questions and Answers CRUD and display it by category.

## Installation

#### Composer

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist VEKsoftware/yii2-qaa-manager "*"
```

or add

```
"VEKsoftware/yii2-qaa-manager": "*"
```

to the require section of your `composer.json` file.

#### Migration

```
./yii migrate --migrationPath=@vekqaam/migrations
```

#### Configure

```
'modules' => [
    ...
    'qaam' => [
        'class' => QaaManager::class,
    ]
    ...
]
```