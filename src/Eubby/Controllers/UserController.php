<?php namespace Eubby\Controllers;

use View, Input, Redirect, Auth, Request;

class UserController extends BaseController
{
	public function getLogout()
	{
		//deactive from sessions table
		$this->session->deactivate(Auth::user()->id);

		//logout from session
		Auth::logout();

		return Redirect::route('home')->with('success', 'You have logged out successfully.');		
	}
	
	public function getJoin()
	{

		$this->layout->content = View::make("theme::{$this->theme}.frontend.user.join");

		return $this->layout;	
	}

	public function postJoin()
	{
		$user_data = array(
			'username' 					=> Input::get('username'),
			'email' 					=> Input::get('email'),
			'password' 					=> Input::get('password'),
			'password_confirmation' 	=> Input::get('password_confirmation'),
			'ip_address' 				=> Request::getClientIp(),
			'active' 					=> 0
			);

		if ($this->user->isValid($user_data))
		{
			$user = $this->user->create($user_data);

			//send activation email
			$this->sendActivationEmail($user);
			return Redirect::back()->with('success', 'Hi ' . $user->username . ', please activate your account by clicking on the link in the confirmation email.');
		}

		return Redirect::back()->withInput()->withErrors($this->user->validationErrors());
	}

	public function getLogin()
	{
		$this->layout->content = View::make("theme::{$this->theme}.frontend.user.login");

		return $this->layout;	
	}

	public function postLogin()
	{
		$login_data = array(
			'username' => Input::get('username'),
			'password' => Input::get('password'));

		if (Auth::attempt($login_data, Input::has('remember_me')))
		{
			//add user to session
			$this->session->add(array('user_id' => Auth::user()->id, 'active' => 1, 'ip_address' => Request::getClientIp()));

			return Redirect::route('home')->with('success', 'Hi ' . $login_data['username'] . ', welcome to the forum.');
		}

		return Redirect::back()->withErrors('Invalid username / password combination.');
	}

	public function getActivate($id)
	{
		$user = $this->user->find($id);

		if ($user)
		{
			$user->update(array('activated' => 1));
			return Redirect::route('login')->with('success', 'User has been activated. You may now login');
		}

		return Redirect::route('join')->withError('User could not be found. Please register again.');
	}

	protected function sendActivationEmail($user)
	{
		//set some variables for the mailer
		$template = "theme::{$this->theme}.mail.activation";

		$data = array(
			'username' 		=> $user->username,
			'userid' 		=> $user->id,
			'email' 		=> $user->email,
			'subject' 		=> 'Activation Email - Flash eSports Forum'
			);

		$this->mailer->send($template, $data, function($message) use ($data)
		{
			$message->from('yonanne@flashcomms.com', 'Flash eSports');
			$message->to($data['email'], $data['username'])->subject($data['subject']);
		});
	}
}