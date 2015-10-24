<?php

class CommentController extends \BaseController {

	protected $comment = null;

	public function __construct(Comment $comment)
	{
		$this->comment = $comment;
	}

	/*
	!------------------------------------------------------------------------------
	! Rol ADMIN (administrador)
	!------------------------------------------------------------------------------
	!
	*/
	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['comments_index'])) {

			if (Request::ajax()) {

				$result = DB::table('comments')
				->select(array(
					'comments.id',
					'comments.description as description',
					'comments.created_at as created',
					'users.email as email',
					'users.first_name as first_name',
					'users.last_name as last_name'))
				->join('profiles', 'comments.profile_id', '=', 'profiles.id')
				->join('users', 'profiles.user_id', '=', 'users.id')
				->where('comments.status', '=', 1);

				return Datatable::query($result)
				->searchColumns('email','first_name','last_name','description')
				->orderColumns('created','id')
				->showColumns('id','description','email','first_name','last_name')
				->addColumn('Operaciones', function($model) {
					return "<a class='operation' href='".URL::to('#Send')."' id=$model->id data-toggle='modal'>
								<span class='label label-success'><i class='fa fa-envelope-o'></i> Responder</span>
							</a>
							<a class='operation' href='".URL::to('#Delete')."' id=$model->id data-toggle='modal'>
								<span class='label label-default'><i class='fa fa-trash'></i> Eliminar</span>
							</a>";
				})->make();
			} 
			else {
				return View::make('comments.admin.index');
			}
		}
	}

	public function getAdminModalData()
	{
		if (Input::has('comments')) {

			$idComment = Input::get('comments');
			$comment = $this->comment->selectComment($idComment);
			$data = array(
				'success' => true,// indica que se llevo la peticion acabo
				'idComment' => $comment->id,
				'description' => $comment->description,
				'email' => $comment->profiles->users->email,
			);

			return Response::json($data);
		}
	}

	public function postAdminMessage()
	{
		if (Input::has('email') && Input::has('answer') && Input::has('description')) {

			$email = Input::get('email');
			$sentry = Sentry::findUserByLogin($email);
			$idComment = Input::get('idComment');

			$data['email'] = $email;
			$data['first_name'] = $sentry->first_name;
			$data['last_name'] = $sentry->last_name;
			$data['answer'] = Input::get('answer');
			$data['description'] = Input::get('description');
			
			$comment = $this->comment->selectComment($idComment);
			$comment->status = 0;

			if ($comment->save()) {
				Mail::send('emails.comments.message', $data, function($m) use ($data) {
					$m->to($data['email'])->subject('Gracias por comentar - Support Team ART');
				});
			}

			return Redirect::route('admin.comments.index')
			->with(['message' => 'Ha sido enviado la respuesta al Email: '.$email, 'class' => 'success']);
		} 
		else {
			return Redirect::route('admin.comments.index')
			->with(['message' => 'ERROR TEAM: llamar al 968159823', 'class' => 'danger']);
		}
	}

	/*
	!------------------------------------------------------------------------------
	! Rol USER (usuario)
	!------------------------------------------------------------------------------
	!
	*/
	public function getUserIndex()
	{
		if (Sentry::hasAnyAccess(['comments_index'])) {

			$sentry = Sentry::getUser();
			$user = User::find($sentry->id);
			$comments = $user->profiles->comments;

			return View::make('comments.user.index', ['comments' => $comments]);
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	public function getUserUpdate($id)
	{
		if (Sentry::hasAnyAccess(['comments_update'])) {

			$comment = $this->comment->selectComment($id);
			
			return View::make('comments.user.edit', ['comment' => $comment]); 
		} 
		else {
			return Redirect::route('pages.error');
		}
	}

	public function postUserCreate()
	{
		//
	}

	public function putUserUpdate($id)
	{
		if (Sentry::hasAnyAccess(['comments_update'])) {

			$answer = Comment::updateComment(Input::all(), $id);

			if ($answer['error'] == true) {
				return Redirect::route('users.comments.edit', $id)
				->withErrors($answer['message'])->withInput();
			} 
			else {
				return Redirect::route('users.comments.edit', $id)
				->with(['message' => $answer['message'], 'class' => 'success']);
			} 
		}
		else {
			return Redirect::route('pages.error');
		}
	}

}