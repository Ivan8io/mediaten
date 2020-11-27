<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m201126_115312_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'description' => $this->text(),
            'price' => $this->integer()->notNull()
        ]);

        $this->addForeignKey(
            'fk-product-category_id',
            'product',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );

        $this->insert('product', [
            'category_id' => 1,
            'name' => 'Смартфон Apple iPhone 12 mini',
            'slug' => 'smartfon-apple-iphone-12-mini',
            'description' => 'Описание смартфона Apple iPhone 12 mini',
            'price' => 69990,
        ]);

        $this->insert('product', [
            'category_id' => 1,
            'name' => 'Смартфон Xiaomi Redmi 9A',
            'slug' => 'smartfon-xiaomi-redmi-9a',
            'description' => 'Описание смартфона Xiaomi Redmi 9A',
            'price' => 7990,
        ]);

        $this->insert('product', [
            'category_id' => 1,
            'name' => 'Смартфон Honor 10X Lite 4',
            'slug' => 'smartfon-honor-10x-lite-4',
            'description' => 'Описание смартфона Honor 10X Lite 4',
            'price' => 15490,
        ]);

        $this->insert('product', [
            'category_id' => 2,
            'name' => 'Планшет Apple iPad 10.2',
            'slug' => 'planshet-apple-ipad-10-2',
            'description' => 'Описание планшета Apple iPad 10.2',
            'price' => 38990,
        ]);

        $this->insert('product', [
            'category_id' => 2,
            'name' => 'Планшет Honor Pad V6',
            'slug' => 'planshet-honor-pad-v6',
            'description' => 'Описание планшета Honor Pad V6',
            'price' => 29990,
        ]);

        $this->insert('product', [
            'category_id' => 2,
            'name' => 'Планшет Huawei MatePad T 10s',
            'slug' => 'planshet-huawei-matepad-t-10s',
            'description' => 'Описание планшета Huawei MatePad T 10s',
            'price' => 14490,
        ]);

        $this->insert('product', [
            'category_id' => 3,
            'name' => 'Ноутбук Apple MacBook Pro 13',
            'slug' => 'noutbuk-apple-macbook-pro-13',
            'description' => 'Описание ноутбука Apple MacBook Pro 13',
            'price' => 177990,
        ]);

        $this->insert('product', [
            'category_id' => 3,
            'name' => 'Ноутбук ASUS VivoBook R543BA-GQ886T',
            'slug' => 'noutbuk-asus-vivobook-r543ba-gq886t',
            'description' => 'Описание ноутбука ASUS VivoBook R543BA-GQ886T',
            'price' => 34990,
        ]);

        $this->insert('product', [
            'category_id' => 3,
            'name' => 'Ноутбук игровой Acer Nitro 5 AN515-43-R7A3',
            'slug' => 'noutbuk-igrovoj-acer-nitro-5-an515-43-r7a3',
            'description' => 'Описание ноутбука Acer Nitro 5 AN515-43-R7A3',
            'price' => 59990,
        ]);

        $this->insert('product', [
            'category_id' => 4,
            'name' => 'Холодильник Bosch Serie | 4 VitaFresh',
            'slug' => 'holodilnik-bosch-serie-4-vitafresh',
            'description' => 'Описание холодильника Bosch Serie | 4 VitaFresh',
            'price' => 44990,
        ]);

        $this->insert('product', [
            'category_id' => 4,
            'name' => 'Холодильник LG DoorCooling+ GA-B509SBUM',
            'slug' => 'holodilnik-lg-doorcooling-ga-b509sbum',
            'description' => 'Описание холодильника LG DoorCooling+ GA-B509SBUM',
            'price' => 49990,
        ]);

        $this->insert('product', [
            'category_id' => 4,
            'name' => 'Холодильник Hotpoint-Ariston HFP 5200 W',
            'slug' => 'holodilnik-hotpoint-ariston-hfp-5200-w',
            'description' => 'Описание холодильника Hotpoint-Ariston HFP 5200 W',
            'price' => 36390,
        ]);

        $this->insert('product', [
            'category_id' => 5,
            'name' => 'Электрическая плита (50-55 см) Hansa FCCX58208',
            'slug' => 'ehlektricheskaya-plita-50-55-sm-hansa-fccx58208',
            'description' => 'Описание электрическая плита (50-55 см) Hansa FCCX58208',
            'price' => 28990,
        ]);

        $this->insert('product', [
            'category_id' => 5,
            'name' => 'Электрическая плита (50-55 см) Gorenje EC5112WG',
            'slug' => 'ehlektricheskaya-plita-50-55-sm-gorenje-ec5112wg',
            'description' => 'Описание электрическая плита (50-55 см) Gorenje EC5112WG',
            'price' => 20590,
        ]);

        $this->insert('product', [
            'category_id' => 5,
            'name' => 'Электрическая плита (50-55 см) Indesit IS5V4PHX/RU',
            'slug' => 'ehlektricheskaya-plita-50-55-sm-indesit-is5v4phx-ru',
            'description' => 'Описание электрическая плита (50-55 см) Indesit IS5V4PHX/RU',
            'price' => 22990,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('product', ['id' => 1]);
        $this->delete('product', ['id' => 2]);
        $this->delete('product', ['id' => 3]);
        $this->delete('product', ['id' => 4]);
        $this->delete('product', ['id' => 5]);
        $this->delete('product', ['id' => 6]);
        $this->delete('product', ['id' => 7]);
        $this->delete('product', ['id' => 8]);
        $this->delete('product', ['id' => 9]);
        $this->delete('product', ['id' => 10]);
        $this->delete('product', ['id' => 11]);
        $this->delete('product', ['id' => 12]);
        $this->delete('product', ['id' => 13]);
        $this->delete('product', ['id' => 14]);
        $this->delete('product', ['id' => 15]);

        $this->dropForeignKey(
            'fk-product-category_id',
            'product'
        );

        $this->dropTable('{{%product}}');
    }
}
