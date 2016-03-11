<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "yii_article".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $description
 * @property integer $count
 * @property string $status
 */

class Article extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%article}}';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['title' , 'required' , 'message' => '标题不能为空'],
			['title' , 'string' , 'min' => 2 , 'max' => 200 , 'tooShort' => '标题不能少于2位' , 'tooLong' => '标题不能大于200位'],
			['content' , 'required' , 'message' => '内容不为空'],
			['description' , 'string' , 'max' => 500 , 'tooLong' => '描述不能大于500位'],
			['count'  , 'integer' , 'min' => 0 , 'tooSmall' => '必须是大于等于0的整数' , 'message' => '请输入一个整数'],
			['status' , 'in' , 'range' => ['Y' , 'N'] , 'message' => '非法操作']
		];
	}

	//在添加或者更新时修改时间
	public function beforeSave($insert)
	{
		if(parent::beforeSave($insert))
		{
			$time = time();
			if($this->isNewRecord)
			{
				$this->update_time = $time;
			}
			$this->update_time = $time;
			return TRUE;
		}
		return FALSE;
	}

}





?>