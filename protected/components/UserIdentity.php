<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

	private $_id;

	public function authenticate()
	{
		$record = User::model()->findByAttributes(array('u_email' => $this->username));
		if($record === null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($record->u_password !== crypt($this->password,$record->u_password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id = $record->u_id;
			$this->setState('role', $record->u_role);
			$this->errorCode = self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

	public function getId()
	{
		return $this->_id;
	}
}