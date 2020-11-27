<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tag}}`.
 */
class m201126_115321_create_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tag}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
        ]);

        $this->insert('tag', [
            'name' => 'apple',
            'slug' => 'apple',
        ]);

        $this->insert('tag', [
            'name' => 'рассрочка',
            'slug' => 'rassrochka',
        ]);

        $this->insert('tag', [
            'name' => 'премиум',
            'slug' => 'premium',
        ]);

        $this->insert('tag', [
            'name' => 'хиты',
            'slug' => 'hity',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('tag', ['id' => 1]);
        $this->delete('tag', ['id' => 2]);
        $this->delete('tag', ['id' => 3]);
        $this->delete('tag', ['id' => 4]);

        $this->dropTable('{{%tag}}');
    }
}
