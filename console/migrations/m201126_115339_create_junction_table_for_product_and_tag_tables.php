<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_tag}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product}}`
 * - `{{%tag}}`
 */
class m201126_115339_create_junction_table_for_product_and_tag_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_tag}}', [
            'product_id' => $this->integer(),
            'tag_id' => $this->integer(),
            'PRIMARY KEY(product_id, tag_id)',
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-product_tag-product_id}}',
            '{{%product_tag}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-product_tag-product_id}}',
            '{{%product_tag}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );

        // creates index for column `tag_id`
        $this->createIndex(
            '{{%idx-product_tag-tag_id}}',
            '{{%product_tag}}',
            'tag_id'
        );

        // add foreign key for table `{{%tag}}`
        $this->addForeignKey(
            '{{%fk-product_tag-tag_id}}',
            '{{%product_tag}}',
            'tag_id',
            '{{%tag}}',
            'id',
            'CASCADE'
        );

        $this->insert('product_tag', [
            'product_id' => '1',
            'tag_id' => '1',
        ]);

        $this->insert('product_tag', [
            'product_id' => '1',
            'tag_id' => '3',
        ]);

        $this->insert('product_tag', [
            'product_id' => '2',
            'tag_id' => '2',
        ]);

        $this->insert('product_tag', [
            'product_id' => '3',
            'tag_id' => '4',
        ]);

        $this->insert('product_tag', [
            'product_id' => '4',
            'tag_id' => '1',
        ]);

        $this->insert('product_tag', [
            'product_id' => '4',
            'tag_id' => '3',
        ]);

        $this->insert('product_tag', [
            'product_id' => '5',
            'tag_id' => '2',
        ]);

        $this->insert('product_tag', [
            'product_id' => '6',
            'tag_id' => '2',
        ]);

        $this->insert('product_tag', [
            'product_id' => '7',
            'tag_id' => '1',
        ]);

        $this->insert('product_tag', [
            'product_id' => '7',
            'tag_id' => '3',
        ]);

        $this->insert('product_tag', [
            'product_id' => '8',
            'tag_id' => '4',
        ]);

        $this->insert('product_tag', [
            'product_id' => '9',
            'tag_id' => '4',
        ]);

        $this->insert('product_tag', [
            'product_id' => '10',
            'tag_id' => '2',
        ]);

        $this->insert('product_tag', [
            'product_id' => '10',
            'tag_id' => '4',
        ]);

        $this->insert('product_tag', [
            'product_id' => '13',
            'tag_id' => '2',
        ]);

        $this->insert('product_tag', [
            'product_id' => '13',
            'tag_id' => '3',
        ]);

        $this->insert('product_tag', [
            'product_id' => '15',
            'tag_id' => '4',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('product_tag', ['product_id' => 1]);
        $this->delete('product_tag', ['product_id' => 2]);
        $this->delete('product_tag', ['product_id' => 3]);
        $this->delete('product_tag', ['product_id' => 4]);
        $this->delete('product_tag', ['product_id' => 5]);
        $this->delete('product_tag', ['product_id' => 6]);
        $this->delete('product_tag', ['product_id' => 7]);
        $this->delete('product_tag', ['product_id' => 8]);
        $this->delete('product_tag', ['product_id' => 9]);
        $this->delete('product_tag', ['product_id' => 10]);
        $this->delete('product_tag', ['product_id' => 13]);
        $this->delete('product_tag', ['product_id' => 15]);

        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-product_tag-product_id}}',
            '{{%product_tag}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-product_tag-product_id}}',
            '{{%product_tag}}'
        );

        // drops foreign key for table `{{%tag}}`
        $this->dropForeignKey(
            '{{%fk-product_tag-tag_id}}',
            '{{%product_tag}}'
        );

        // drops index for column `tag_id`
        $this->dropIndex(
            '{{%idx-product_tag-tag_id}}',
            '{{%product_tag}}'
        );

        $this->dropTable('{{%product_tag}}');
    }
}
