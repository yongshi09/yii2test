<?php
/**
 * ArticleController class file
 * @author zhangyongshi <zhangyongshi@haoju.cn>
 * @link localhost
 * @copyright Copyright &copy; 2016 Anhui
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Article;

class ArticleController extends Controller
{
	/**
	 * 新闻列表
	 * @return string
	 */
	public function actionIndex()
	{
		if(!($username =  Yii::$app->session->get('mrs_username')) && !($username = \app\models\Login::loginByCookie()))
		{
			return $this->redirect(['login/index']);
		}

	    $article = Article::find();
		$pagination = new \yii\data\Pagination(['totalCount' => $article->count() , 'pageSize' => 3]);
		$data = $article->offset($pagination->offset)->limit($pagination->limit)->all();
		return $this->render('index' , [
			'data' => $data ,
			'pagination' => $pagination,
			'username' => $username,
		]);
    }

	/**
	 * 文章添加
	 */
	public function actionAdd()
	{
		$model = new Article();

		if(Yii::$app->request->post())
		{
			$postData = Yii::$app->request->post();
			if($model->load($postData) && $model->save())
			{
				$this->redirect(['index']);
			}
		}

		return $this->render('add' , [
			'model' => $model,
		]);
	}

	/**
	 * 文章编辑
	 */
	public function actionEdit()
	{
		$id = Yii::$app->request->get('id');
		if($id > 0 && ($model = Article::findOne($id)))
		{
			if(Yii::$app->request->isPost && $model -> load(Yii::$app->request->post()) && $model->save())
			{
				return $this->redirect(['index']);
			}
			return $this->render('edit' , [
				'model' => $model,
			]);
		}
		return $this->redirect(['index']);
	}

	/**
	 * 文章删除
	 */
	public function actionDelete()
	{
		$id = Yii::$app->request->get('id');
		Article::findOne($id)->delete();
		return $this->redirect(['index']);

	}

	/**
	 * 文章详情
	 */
	public function actionDetail()
	{
		$id = Yii::$app->request->get('id');
		$articleModel = Article::findOne($id);

		if (!isset($articleModel))
		{
			throw new NotFoundHttpException('您访问的页面不存在');
		}

		//更新浏览次数
		$articleModel->updateCounters(array ('count' => 1 ), 'id=:id', array ('id' => $id ));

		return $this->render('detail',[
			'articleModel' => $articleModel,
		]);
	}

}


?>