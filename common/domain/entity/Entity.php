<?php

namespace common\domain\entity;

use common\domain\traits\Timestampable;
use yii\db\ActiveRecord;
use yii\validators\Validator;

/**
 * Class Entity
 *
 * @property int createdAt
 * @property int updatedAt
 * @property int deletedAt
 */
class Entity extends ActiveRecord
{
    use Timestampable;
    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // set createdAt
            if ($insert && method_exists($this, 'setCreatedAt')) {
                $this->setCreatedAt();
            }
            // set updatedAt
            if (method_exists($this, 'setUpdatedAt')) {
                $this->setUpdatedAt();
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * Adds a validation rule to this model.
     * You can also directly manipulate [[validators]] to add or remove validation rules.
     * This method provides a shortcut.
     * @param string|array $attributes the attribute(s) to be validated by the rule
     * @param mixed $validator the validator for the rule.This can be a built-in validator name,
     * a method name of the model class, an anonymous function, or a validator class name.
     * @param array $options the options (name-value pairs) to be applied to the validator
     * @return $this the model itself
     */
    public function addRule($attributes, $validator, $options = [])
    {
        $validators = $this->getValidators();
        $validators->append(Validator::createValidator($validator, $this, (array)$attributes, $options));

        return $this;
    }

    /**
     * @param array $values
     * @param bool|array $safeOnly If is array, will filter $values.
     */
    public function setAttributes($values, $safeOnly = true)
    {
        if (is_array($safeOnly)) {
            parent::setAttributes(array_intersect_key($values, array_flip($safeOnly)), true);
        } else {
            parent::setAttributes($values, $safeOnly);
        }
    }
}
