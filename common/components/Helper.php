<?php

namespace common\components;

class Helper
{
    public static function getFormParams()
    {
        return [
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n{beginWrapper}\n{input}\n{endWrapper}",
                'horizontalCssClasses' => [
                    'label' => 'col-sm-2',
                    'offset' => 'col-sm-offset-2',
                    'wrapper' => 'col-sm-10'
                ]
            ],
            'enableClientValidation' => false,
            'enableAjaxValidation' => false,
            'options' => ['autocomplete' => 'off']
        ];
    }
}