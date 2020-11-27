<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m201126_115303_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull()
        ]);

        $this->insert('category', [
            'name' => 'Смартфоны',
            'slug' => 'smartfony',
        ]);

        $this->insert('category', [
            'name' => 'Планшеты',
            'slug' => 'planshety',
        ]);

        $this->insert('category', [
            'name' => 'Ноутбуки',
            'slug' => 'noutbuki',
        ]);

        $this->insert('category', [
            'name' => 'Холодильники',
            'slug' => 'holodilniki',
        ]);

        $this->insert('category', [
            'name' => 'Плиты',
            'slug' => 'plity',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('category', ['id' => 1]);
        $this->delete('category', ['id' => 2]);
        $this->delete('category', ['id' => 3]);
        $this->delete('category', ['id' => 4]);
        $this->delete('category', ['id' => 5]);

        $this->dropTable('{{%category}}');
    }
}
