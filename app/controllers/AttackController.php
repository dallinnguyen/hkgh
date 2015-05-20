<?php

class AttackController extends \BaseController {
    //public function show($id){
    //    try{
    //
    //            $response = [
    //                'attack' => []
    //            ];
    //            $statusCode = 200;
    //             
    //            $attack = Attack::find($id);
    //     
    //            $response = [
    //                'id' => $attack->id,
    //                'user' => $attack->user_id,
    //                'post' => $attack->post_id,
    //                'damage' => $attack->damage
    //            ];
    //            return Response::json($response, $statusCode);
    //        }catch (Exception $e){
    //            $statusCode = 404;
    //            return Response::json($response, $statusCode);
    //        }
    //}
    
    public function index(){
        try{
 
                    $response = [
                        'attacks' => []
                    ];
                    $statusCode = 200;
                    $attacks = Attack::all();
             
                    foreach($attacks as $attack){
             
                        $response['attacks'][] = [
                            'id' => $attack->id,
                            'user' => $attack->user_id,
                            'post' => $attack->post_id,
                            'damage' => $attack->damage
                        ];
             
             
                    }
                    return Response::json($response, $statusCode);
             
                }catch (Exception $e){
                    $statusCode = 404;
                    return Response::json($response, $statusCode);
                }
    }
}