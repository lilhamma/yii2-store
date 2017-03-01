<?php

namespace lilhamma\store\controllers;

use Yii;
use lilhamma\store\models\ElementCategory;
use lilhamma\store\models\ElementCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ElementCategoryController implements the CRUD actions for ElementCategory model.
 */
class ElementCategoryController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all ElementCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ElementCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $newElementCategoryModel = new ElementCategory();
        
        if ($newElementCategoryModel->load(Yii::$app->request->post()) && 
            $newElementCategoryModel->save())
        {
                $newElementCategoryModel = new ElementCategory();
        }
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'newElementCategoryModel' => $newElementCategoryModel
        ]);
    }

    /**
     * Updates an existing ElementCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'searchModel' => new ElementCategorySearch()
            ]);
        }
    }

    /**
     * Deletes an existing ElementCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ElementCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ElementCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ElementCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
