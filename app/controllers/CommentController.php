<?php

class CommentController extends \BaseController {

	protected $comment = null;

	public function __construct(Comment $comment)
	{
		$this->comment = $comment;
	}

	public function getAdminIndex()
	{
		if (Sentry::hasAnyAccess(['comments_index'])) 
		{
			if (Request::ajax()) 
			{
				$result = DB::table('comments')
				->select(array(
					'comments.id',
					'comments.description as description',
					'users.email as email',
					'users.first_name as first_name',
					'users.last_name as last_name'))
				->join('profiles', 'comments.profile_id', '=', 'profiles.id')
				->join('users', 'profiles.user_id', '=', 'users.id')
				->where('comments.status', '=', 1);

				return Datatable::query($result)
				->searchColumns('users.email','users.first_name','users.last_name','comments.description')
				->orderColumns('id','users.email')
				->showColumns('id','description','email','first_name','last_name')
				->addColumn('Operaciones', function($model)
				{
					return "<a class='operation' href='".URL::to('#Send')."' id=$model->id data-toggle='modal'>
								<span class='label label-success'><i class='fa fa-envelope-o'></i> Responder</span>
							</a>
							<a class='operation' href='".URL::to('#Delete')."' id=$model->id data-toggle='modal'>
								<span class='label label-default'><i class='fa fa-trash'></i> Eliminar</span>
							</a>";
				})->make();
			} 
			else return View::make('comments.admin.index');
		}
	}

	public function getAdminModalData()
	{
		if (Input::has('comments')) 
		{
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
		if (Input::has('email') && Input::has('answer') && Input::has('description')) 
		{
			$data['email'] = Input::get('email');
			$data['answer'] = Input::get('answer');
			$data['description'] = Input::get('description');
			
			$email = Input::get('email');
			$sentry = Sentry::findUserByLogin($email);
			$idComment = Input::get('idComment');

			$comment = $this->selectComment($idComment);
			$comment->status = 0;
			$comment->save();

			Mail::send('emails.comments.message', $data, function($m) use ($data) 
			{
				$m->to($data['email'])->subject('Gracias por comentar - Support Team ART');
			});

			return Redirect::route('admin.comments.index')
			->with(['message' => 'Ha sido enviado la respuesta al Email: '.$user->email, 'class' => 'success']);
		} 
		else
			return Redirect::route('admin.comments.index')
			->with(['message' => 'ERROR TEAM: llamar al 968159823', 'class' => 'danger']);
	}

	public function getUserIndex()
	{
		if (Sentry::hasAnyAccess(['comments_index'])) 
		{
			$sentry = Sentry::getUser();
			$user = User::find($sentry->id);
			$comments = $user->profiles->comments;

			return View::make('comments.user.index', ['comments' => $comments]);
		} 
		else return Redirect::route('pages.error');
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