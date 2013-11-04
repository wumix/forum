<?php namespace Eubby\Libs\Notification;

interface NotifierInterface
{

	public function getSettings();

	public function setType($type);
	
	public function setMessage($message);

	public function getMessages();

	public function hasOptIn();

	public function attemptNotify();

	public function setSender($sender);

	public function setUser($user);

}