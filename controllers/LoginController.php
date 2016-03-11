<?php
/**
 * LoginController class file
 * @author zhangyongshi <zhangyongshi@haoju.cn>
 * @link localhost
 * @copyright Copyright &copy; 2016 Anhui
 */

namespace app\controllers;

use yii\web\Controller;
use Yii;

class LoginController extends Controller
{

	public function actions()
	{
		return [
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'maxLength' => 4,
				'minLength' => 4,
				'width' => 80,
				'height' => 40
			],
		];
	}

	/**
	 * 登陆页面
	 */
	public function actionIndex()
	{
		$model = new \app\models\Login();

		if(Yii::$app->request->post())
		{
			$postData = Yii::$app->request->post();

			if($model->load($postData) && $model->login())
			{
				$this->redirect(['article/index']);
			}
		}

		return $this->renderPartial('index' , ['model' => $model]);
	}

}







?>