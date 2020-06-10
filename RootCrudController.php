<?php

namespace denis909\yii;

class RootCrudController extends \denis909\yii\CrudController
{

    public $userComponent = 'user';

    public $roles = ['@'];

}