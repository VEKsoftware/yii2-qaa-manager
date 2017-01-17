<?php

namespace vekqaam\controllers;

use vekqaam\models\QaaCategory;
use Yii;
use vekqaam\models\base\QaaCategoryBase;
use vekqaam\models\QaaCategorySearch;
use yii\base\InvalidParamException;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for QaaCategoryBase model.
 */
class CategoryController extends Controller
{
    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all QaaCategoryBase models.
     *
     * @return string
     *
     * @throws InvalidParamException
     */
    public function actionIndex()
    {
        $searchModel = new QaaCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render(
            'index',
            [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]
        );
    }

    /**
     * Displays a single QaaCategoryBase model.
     *
     * @param integer $id - идентификатор
     *
     * @return string
     *
     * @throws NotFoundHttpException
     * @throws InvalidParamException
     */
    public function actionView($id)
    {
        return $this->render('view', ['model' => $this->findModel($id)]);
    }

    /**
     * Creates a new QaaCategoryBase model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return string
     *
     * @throws InvalidParamException
     */
    public function actionCreate()
    {
        $model = new QaaCategoryBase();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', ['model' => $model]);
        }
    }

    /**
     * Updates an existing QaaCategoryBase model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id - идентификатор
     *
     * @return string
     *
     * @throws NotFoundHttpException
     * @throws InvalidParamException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', ['model' => $model]);
        }
    }

    /**
     * Deletes an existing QaaCategoryBase model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id - идентификатор
     *
     * @return string
     *
     * @throws \Exception
     * @throws StaleObjectException
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the QaaCategoryBase model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id - идентификатор
     *
     * @return QaaCategoryBase the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = QaaCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
