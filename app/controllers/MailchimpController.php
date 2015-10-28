<?php

class MailchimpController extends \BaseController {

	public function index()
	{
		return View::make('pages.admin.admin');
	}

	public function store()
	{
		protected $listId = '7a1bc8d8cc';

		return $email = Input::get('email');

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