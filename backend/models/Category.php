<?php

namespace backend\models;

use backend\traits\NamesList;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 *
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord
{
    use NamesList;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['name', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ид',
            'name' => 'Название',
            'slug' => 'Транслитерация',
        ];
    }

    /**
     * Gets all names of categories
     *
     * @return array
     */
    public static function getNamesList() : array
    {
        $namesList = static::find()->select(['id', 'name'])->all();

        return ArrayHelper::map($namesList, 'id', 'name');
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }
}
