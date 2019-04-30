<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%partner}}`.
 */
class m190430_125230_create_partner_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%partner}}', [
            'id' => $this->primaryKey(),
            'partnertitle' => $this->string(100),
            'agentname' => $this->string(150),
            'passport' => $this->string(10),
            'address' => $this->string(200),
            'city' => $this->string(50),
            'phone' => $this->string(15),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%partner}}');
    }
}
