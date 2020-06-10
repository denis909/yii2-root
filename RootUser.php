<?php

namespace denis909\yii;

use Yii;
use Exception;
use yii\helpers\ArrayHelper;
use yii\base\NotSupportedException;

class RootUser extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    
    public $username;
    
    public $password;
    
    public $authKey;

    public static function getUsers()
    {
        $return = ArrayHelper::getValue(Yii::$app->params, 'users', []);

        if (!$return)
        {
            throw new Exception('No users found.');
        }

        return $return;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findByUsername($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->username;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Finds backend user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach(static::getUsers() as $user)
        {
            if (strcasecmp($user['username'], $username) === 0)
            {
                return new static($user);
            }
        }

        return null;
    }

}