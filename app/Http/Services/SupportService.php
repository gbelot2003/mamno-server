<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Support;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;

class SupportService {
  public function readAll(Request $request) {
    $page = $request->query('per_page') > 0 ? $request->query('per_page') : 10;
    $search = $request->query('search');
    $supportType = $request->query('support_type');
    $supportUserId = $request->query('support_user_id');
    $status = $request->query('status') > 0 ? $request->query('status') : 1;

    $supports = 
      Support::where('status', '=', $status)
        ->when($supportUserId, function ($query, $supportUserId) {
          return $query->where('support_user_id', $supportUserId);
        })
        ->where(function($query) use ($search) {
          $query->where('title', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
        })
        ->when($supportType, function ($query, $supportType) {
          return $query->where('support_type_id', $supportType);
        })
        ->paginate($page);

    return $supports;
  }

  public function read($id) {
    $support = Support::findOrFail($id);

    return $support;
  }

  public function create(Request $request) {
    $support = new Support();

    $support->title = $request->title;
    $support->description = $request->description;
    $support->support_dateTime = $this->toMysqlDateTime($request->supportDateTime);
    $support->support_user_id = $request->supportUserId;
    $support->status = 1;

    if ($support->save()) {
      return $support;
    }

    return NULL;
  }

  public function update(Request $request, $id) {
    $support = Support::find($id);

    $support->title = $request->title ? $request->title : $support->title;
    $support->description = $request->description ? $request->description : $support->description;
    $support->support_dateTime = $request->supportDateTime ? $this->toMysqlDateTime($request->supportDateTime) : $support->support_dateTime;
    $support->solution = $request->solution ? $request->solution : $support->solution;
    $support->solution_user_id = $request->solutionUserId ? $request->solutionUserId : $support->solution_user_id;
    $support->solution_dateTime = $request->solutionDateTime ? $this->toMysqlDateTime($request->solutionDateTime) : $support->solutionDateTime;
    $support->support_type_id = $request->supportTypeId ? $request->supportTypeId : $support->support_type_id;
    $support->status = $request->status > 0 ? $request->status : 1;

    if ($support->save()) {
      return $support;
    }

    return NULL;
  }

  public function delete(Request $request, $id) {
    $support = Support::find($id);
    $support->status = 0;

    if ($support->save()) {
      return $support;
    }

    return NULL;
  }

  private function toMysqlDateTime($dateTime) {
    return (new DateTime($dateTime))->format('Y-m-d H:i:s');
  }
}