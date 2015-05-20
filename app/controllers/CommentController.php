<?php

class CommentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    try{
                    $response = [
                        'comments' => []
                    ];
                    $statusCode = 200;
                    $comments = Comment::all();
             
                    foreach($comments as $comment){
             
                        $response['comments'][] = [
                            'id' => $comment->id,
                            'user' => $comment->user_id,
                            'post' => $comment->post_id,
                            'comment_content' => $comment->content
                        ];
             
             
                    }
                    return Response::json($response, $statusCode);
             
            }catch (Exception $e){
                    $statusCode = 404;
                    return Response::json($response, $statusCode);
                }
	}


}
