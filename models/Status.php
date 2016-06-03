<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $completion
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    const COMPLETION_YES = 1;
    const COMPLETION_NO = 0;

    public static function tableName()
    {
        return 'status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['title', 'description'], 'string'],
            [['completion'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'completion' => 'Completion',
        ];
    }


    public function getCompletions()
    {
        return array(self::COMPLETION_YES=>1,self::COMPLETION_NO=>0);
    }

    public function getCompletionsLabel($completion)
    {
        if($completion == self::COMPLETION_YES)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
}
