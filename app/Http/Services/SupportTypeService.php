<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SupportType;
use Illuminate\Support\Facades\DB;

class SupportTypeService {
  public function readAll(Request $request) {
    $page = $request->query('per_page') > 0 ? $request->query('per_page') : 10;
    $search = $request->query('search');

    $supportTypes = 
      SupportType::orWhere('description', 'like', '%' . $search . '%')
        ->where('status', '=', 1)
        ->paginate($page);

    return $supportTypes;
  }

  public function read($id) {
    $supportType = 
      SupportType::findOrFail($id);

      return $supportType;
  }

  public function create(Request $request) {
    $supportType = new SupportType();

    $supportType->description = $request->description;
    $supportType->status = 1;

    if ($supportType->save()) {
      return $supportType;
    }

    return NULL;
  }

  public function update(Request $request, $id) {
    $supportType = SupportType::find($id);

    $supportType->description = $request->description;

    if ($supportType->save()) {
      return $supportType;
    }

    return NULL;
  }
  public function delete(Request $request, $id) {
    $supportType = SupportType::find($id);
    $supportType->status = 0;

    if ($supportType->save()) {
      return $supportType;
    }

    return NULL;
  }
}