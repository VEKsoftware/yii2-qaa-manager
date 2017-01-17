<?php

namespace vekqaam\controllers;

use vekqaam\models\QaaCategory;
use vekqaam\models\QaaMain;
use Yii;
use vekqaam\models\base\QaaMainBase;
use vekqaam\models\QaaMainSearch;
use yii\base\InvalidParamException;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MainController implements the CRUD actions for QaaMainBase model.
 */
class MainController extends Controller
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
     * Lists all QaaMainBase models.
     *
     * @return string
     *
     * @throws InvalidParamException
     */
    public function actionIndex()
    {
        $searchModel = new QaaMainSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render(
            'index',
            [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'isHiddenDD' => QaaMain::getIsHiddenDropDownList()
            ]
        );
    }

    /**
     * Displays a single QaaMainBase model.
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
     * Creates a new QaaMainBase model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return string
     * @throws \yii\base\InvalidParamException
     */
    public function actionCreate()
    {
        $model = new QaaMainBase();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render(
                'create',
                [
                    'model' => $model,
                    'categoryDD' => QaaCategory::getCategoryDropDownList()
                ]
            );
        }
    }

    /**
     * Updates an existing QaaMainBase model.
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

        try {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $response = $this->redirect(['view', 'id' => $model->id]);
            } else {
                $response = $this->render(
                    'update',
                    [
                        'model' => $model,
                        'categoryDD' => QaaCategory::getCategoryDropDownList()
                    ]
                );
            }
        } catch (StaleObjectException $e) {
            Yii::$app
                ->session
                ->setFlash(
                    'error',
                    Yii::t('vekqaam', 'The data have been changed, update the data and re-edit')
                );

            $response = $this->render(
                'update',
                [
                    'model' => $model,
                    'categoryDD' => QaaCategory::getCategoryDropDownList()
                ]
            );
        }

        return $response;
    }

    /**
     * Deletes an existing QaaMainBase model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id - идентификатор
     *
     * @return string
     *
     * @throws StaleObjectException
     * @throws \Exception
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the QaaMainBase model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id - идентификатор
     *
     * @return QaaMainBase the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = QaaMain::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
