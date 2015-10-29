<?php

class MailchimpController extends \BaseController {

	public function index()
	{
		return View::make('pages.admin.admin');
	}

	public function postCreate()
	{
		$listId = 'aa20a0973e';

		$email = Input::get('email');

		/**
		 * Access the mailchimp lists API
		 */
		try {
			MailchimpWrapper::lists()->subscribe($listId, ['email' => $email]);
		} 
		catch (\Mailchimp_List_AlreadySubscribed $e) 
		{
			// do something
		} 
		catch (\Mailchimp_Error $e) 
		{
			// do something
		}

		return Redirect::route('home');
	}

}