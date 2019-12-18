<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Log;

class LogService {
  public function readAll(Request $request) {
    $page = $request->query('per_page') > 0 ? $request->query('per_page') : 10;
    $search = $request->query('search');

    $logs = 
      Log::orWhere('information_type', 'like', '%' . $search . '%')
        ->orWhere('registry_key', 'like', '%' . $search . '%')
        ->orWhere('registry_key_description', 'like', '%' . $search . '%')
        ->orWhere('summary', 'like', '%' . $search . '%')
        ->orWhere('user_id', '=', intval($search))
        ->paginate($page);

    return $logs;
  }

  public function read($id)
  {
    $log = Log::findOrFail($id);

    return $log;
  }

  public function create($user_id, $information_type, $registry_key, $registry_key_description, $summary)
  {
    $log = new Log();

    $log->user_id = $user_id;
    $log->information_type = $information_type;
    $log->registry_key = $registry_key;
    $log->registry_key_description = $registry_key_description;
    $log->summary = $summary;

    if ($log->save()) {
      return $log;
    }

    return NULL;
  }
}