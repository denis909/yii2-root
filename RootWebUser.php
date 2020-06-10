<?php

namespace denis909\yii;

class RootWebUser extends \yii\web\User
{

    public $identityClass = RootUser::class;

    public $returnUrlParam = '__rootReturnUrl';

    public $absoluteAuthTimeoutParam = '__rootAbsoluteExpire';

    public $authTimeoutParam = '__rootExpire';

    public $idParam = '__rootId';

    public $identityCookie = ['name' => '_identity-root', 'httpOnly' => true];

    public $loginUrl = ['site/login'];

    public $logoutUrl = ['site/logout'];

    public $enableAutoLogin = true;    

}