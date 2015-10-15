<?php

class CommentController extends \BaseController {

	protected $comment = null;

	public function __construct(Comment $comment)
	{
		$this->comment = $comment;
	}

	public function getUserIndex()
	{
		if (Sentry::hasAnyAccess(['comments_index'])) {
			$sentry = Sentry::getUser();
			$user = User::find($sentry->id);
			$comments = $user->profiles->comments;

			return View::make('comments.user.index', ['comments' => $comments]);
		} else {
			return Redirect::route('pages.error');
		}
	}

	public function getUserUpdate($id)
	{
		if (Sentry::hasAnyAccess(['comments_update'])) {
			$comment = $this->comment->selectComment($id);

			return View::make('comments.user.edit', ['comment' => $comment]); 
		} else {
			return Redirect::route('pages.error');
		}
	}

	public function postUserCreate()
	{
		//
	}

}