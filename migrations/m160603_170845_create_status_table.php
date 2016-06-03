<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation for table `status_table`.
 */
class m160603_170845_create_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        /*$this->createTable('status_table', [
            'id' => $this->primaryKey(),
        ]);*/
        $tableOptions = null;
          if ($this->db->driverName === 'mysql') {
              $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
          }
 
          $this->createTable('{{%status}}', [
              'id' => Schema::TYPE_PK,
              'title' => Schema::TYPE_TEXT.' NOT NULL DEFAULT ""',
              'description' => Schema::TYPE_TEXT.' NOT NULL DEFAULT ""',
              'completion' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 0',
          ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        /*$this->dropTable('status_table');*/
        $this->dropTable('{{%status}}');
    }
}
