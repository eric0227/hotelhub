<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $user;
	
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$this->user = User::model()->findByAttributes(array("email"=>$this->username));
		
		if(!isset($this->user)) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
			return false;
		}
		
		$pw1 = $this->user->getInitialPasswd();
		$pw2 = Yii::app()->user->hashPassword($this->password);
		
		if($pw1 !== $pw2) {
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
			return false;
		}
		
		$this->errorCode=self::ERROR_NONE;
		return true;
	}
	
	public function email() {
		return $this->username;
	}
	
	public function id() {
		return $this->id_user;
	}
}
