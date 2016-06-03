<?php
namespace app\models;
use yii\base\Model;


class Status extends Model
{
	const COMPLETION_YES = 'Done';
	const COMPLETION_NO = 'Undone';
	public $text;
	public $completion;
	public function rules()
	{
		return [
			[['text','completion'],'required'],
		];
	}

	public function getCompletions()
	{
		return array(self::COMPLETION_YES=>'Done',self::COMPLETION_NO=>'Undone');
	}

	public function getCompletionsLabel($completion)
	{
		if($completion == self::COMPLETION_YES)
		{
			return 'Done';
		}
		else
		{
			return 'Undone';
		}
	}
}

?>