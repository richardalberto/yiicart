<?php

/**
 * CustomerIdentity represents the data needed to identity a customer.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class CustomerIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $user = Customer::model()->findByAttributes(array('email' => $this->username, 'status'=>1));

        if (is_null($user))
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if ($user->password != User::encryptPassword($this->password, $user->salt) )
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else
            $this->errorCode = self::ERROR_NONE;


        return!$this->errorCode;
    }

}