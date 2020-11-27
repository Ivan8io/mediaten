<?php

use yii\db\Migration;

/**
 * Class m201127_212559_insert_user_to_user_table
 */
class m201127_212559_insert_user_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', [
            'username' => 'user',
            'password_hash' => Yii::$app->security->generatePasswordHash('useruser'),
            'email' => 'user@email.com',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'verification_token' => Yii::$app->security->generateRandomString() . '_' . time(),
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user', ['username' => 'user']);
    }

}
