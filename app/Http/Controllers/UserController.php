<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Errors;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserController extends BaseController
{
  public function get(Request $request)
  {
    // $users = User::get();

    $validator = Validator::make($request->all(), [
      'limit' => 'integer|min:0|max:50',
    ]);

    if ($validator -> fails()){

      $failedRules = $validator->failed();
      $response = null;

      if(isset($failedRules['limit'])) {
        $response = [
          'message' => Errors::ERROR_MAX_LIMIT_MESSAGE,
        ];
      }

      throw new HttpResponseException(response()->json($response, 500));

    }else{
      $page = $request->has('offset') ? $request->get('offset') : 1;
      $page_count = $request->has('limit') ? $request->get('limit') : 10;
  
      $users = DB::Table('users')
        ->forPage($page, $page_count)
        ->get();
        
      return response($users, 200);
      return response()->json( [$users], count($users) );
    }
  }
}
