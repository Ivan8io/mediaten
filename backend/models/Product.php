<?php

declare(strict_types=1);

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property int $price
 *
 * @property Category $category
 * @property ProductTag[] $productTags
 * @property Tag[] $tags
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'slug', 'price'], 'required'],
            [['category_id', 'price'], 'integer'],
            [['description'], 'string'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ид',
            'category_id' => 'Ид категории',
            'name' => 'Название',
            'slug' => 'Транслитерация',
            'description' => 'Описание',
            'price' => 'Цена',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[ProductTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductTags()
    {
        return $this->hasMany(ProductTag::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Tags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->viaTable('product_tag', ['product_id' => 'id']);
    }

    /**
     * Get all tag names of product
     *
     * @return string
     */
    public function getTagsList() : string
    {
        return implode(', ', ArrayHelper::getColumn($this->tags, 'name'));
    }
}
