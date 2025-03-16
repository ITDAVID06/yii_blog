<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $id;

    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $username = strtolower($this->username);
        $user=User::model()->find('LOWER(username)=?', array($username));
        if ($user === null) {
            // the user isn't existing
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } elseif (!$user->validatePassword($this->password)) {
            // check password
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            // stored in session, and can be accessed by Yii::app()->user
            $this->id = $user->id;
            $this->username = $user->username;
            $this->errorCode=self::ERROR_NONE;
        }
        return $this->errorCode === self::ERROR_NONE;
    }

    public function getId()
    {
        return $this->id;
    }
}
