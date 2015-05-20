<?php

class AbilityController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		try{
 
                    $response = [
                        'abilities' => []
                    ];
                    $statusCode = 200;
                    $abilities = Ability::all();
             
                    foreach($abilities as $ability){
             
                        $response['abilities'][] = [
                            'id' => $ability->id,
                            'user' => $ability->user_id,
                            'drink' => $ability->drink,
                            'damage' => $ability->damage
                        ];
             
             
                    }
                    return Response::json($response, $statusCode);
             
                }catch (Exception $e){
                    $statusCode = 404;
                    return Response::json($response, $statusCode);
                }
	}


}
