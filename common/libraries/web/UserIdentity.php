<?php

namespace common\libraries\web;

use common\domain\entity\User as UserEntity;
use common\domain\repository\UserRepository;
use yii\base\Model;
use yii\web\IdentityInterface;

/**
 * Class UserIdentity
 * @property UserEntity $user
 * @package common\libraries\web
 */
class UserIdentity extends Model implements IdentityInterface
{
    /**
     * @var UserEntity
     */
    protected $user;

    /**
     * @return UserEntity
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param UserEntity $user
     * @return void
     */
    public function setUser(UserEntity $user)
    {
        $this->user = $user;
    }

    /**
     * @inheritdoc
     */
    public function __get($name)
    {
        if ($this->user instanceof UserEntity && $this->user->canGetProperty($name)) {
            return $this->user->{$name};
        }
        return parent::__get($name);
    }

    public static function findIdentityByUserName($username)
    {
        /** @var UserEntity $user */
        $userRepo = new UserRepository();
        $user = $userRepo->findOneByLogin($username);
        if ($user) {
            $userIdentity = new static();
            $userIdentity->setUser($user);
            return $userIdentity;
        }
        return null;
    }

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        $userRepo = new UserRepository();
        /* @var UserEntity $user */
        $user = $userRepo->findOneById($id);
        if ($user) {
            $userIdentity = new static();
            $userIdentity->setUser($user);
            return $userIdentity;
        }
        return null;
        // TODO: Implement findIdentity() method.
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface|null the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->user->user_id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled. The returned key will be stored on the
     * client side as a cookie and will be used to authenticate user even if PHP session has been expired.
     *
     * Make sure to invalidate earlier issued authKeys when you implement force user logout, password change and
     * other scenarios, that require forceful access revocation for old sessions.
     *
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
}
