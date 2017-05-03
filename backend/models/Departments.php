<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property integer $id
 * @property string $department_name
 * @property string $department_created_time
 * @property integer $department_status
 * @property integer $branches_id
 * @property integer $companies_id
 *
 * @property Branches $branches
 * @property Companies $companies
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department_name', 'department_created_time', 'department_status', 'branches_id', 'companies_id'], 'required'],
            [['department_created_time'], 'safe'],
            [['department_status', 'branches_id', 'companies_id'], 'integer'],
            [['department_name'], 'string', 'max' => 255],
            [['branches_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branches::className(), 'targetAttribute' => ['branches_id' => 'id']],
            [['companies_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['companies_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'department_name' => 'Department Name',
            'department_created_time' => 'Department Created Time',
            'department_status' => 'Department Status',
            'branches_id' => 'Branches ID',
            'companies_id' => 'Companies ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasOne(Branches::className(), ['id' => 'branches_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasOne(Companies::className(), ['id' => 'companies_id']);
    }
}
