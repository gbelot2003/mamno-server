<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Error;

class ErrorService {
  public function readAll(Request $request) {
    $page = $request->query('per_page') > 0 ? $request->query('per_page') : 10;
    $search = $request->query('search');

    $errors = 
      Error::orWhere('program', 'like', '%' . $search . '%')
        ->orWhere('message', 'like', '%' . $search . '%')
        ->paginate($page);

    return $errors;
  }

  public function read($id)
  {
    $error = Error::findOrFail($id);

    return $error;
  }

  public function create(Request $request)
  {
    $error = new Error();

    $error->program = $request->input('program');
    $error->message = $request->input('message');

    if ($error->save()) {
      return $error;
    }

    return NULL;
  }
}