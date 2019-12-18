<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Content;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ContentService {
  public function readAll($request) {
    $page = $request->query('per_page') > 0 ? $request->query('per_page') : 10;
    $type = $request->query('type');
    $search = $request->query('search');

    $contents = 
      Content::where('status', '=', 1)
        ->where(function ($query) use ($search) {
          $query->where('title', 'like', '%'. $search . '%')->orWhere('description', 'like', '%' . $search . '%');
        })
        ->when($type, function ($query, $type) {
          return $query->where('type', $type);
        })
        ->paginate($page);

    return $contents;
  }

  public function read($id) {
    $content = Content::findOrFail($id);

    return $content;
  }

  public function create(Request $request) {
    $content = new Content();

    if ($request->hasFile('resourceFile')) {
      $content->resource_link = $this->getFileName($request);
    } else {
      $content->resource_link = $request->resourceLink;
    }

    $content->title = $request->title;
    $content->description = $request->description;
    $content->type = $request->type;
    $content->status = 1;

    if ($content->save()) {
      return $content;
    }

    return NULL;
  }

  public function update(Request $request, $id) {
    $content = Content::find($id);

    if ($request->hasFile('resourceFile')) {
      $content->resource_link = $this->getFileName($request);
    } else {
      $content->resource_link = $request->resourceLink;
    }

    $content->title = $request->title;
    $content->description = $request->description;
    $content->type = $request->type;
    $content->status = 1;

    if ($content->save()) {
      return $content;
    }

    return NULL;
  }

  public function delete(Request $request, $id) {
    $content = Content::find($id);
    $content->status = 0;

    if ($content->save()) {
      return $content;
    }

    return NULL;
  }

  private function getFileName(Request $request) {
    $filenameWithExt = $request->file('resourceFile')->getClientOriginalName();
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    $extension = $request->file('resourceFile')->getClientOriginalExtension();
    $filenameToStore = uniqid('', TRUE) . '.' . $extension;
    $path = $request->file('resourceFile')->storeAs('public/resource_files', $filenameToStore);
    
    return url('/') . Storage::url('resource_files/' . $filenameToStore);
  }

  public function storeFile(Request $request) {
    if ($request->hasFile('resourceFile')) {
      $filenameWithExt = $request->file('resourceFile')->getClientOriginalName();
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
      $extension = $request->file('resourceFile')->getClientOriginalExtension();
      $filenameToStore = uniqid('', TRUE) . '.' . $extension;
      $path = $request->file('resourceFile')->storeAs('public/resource_files', $filenameToStore);
    } else {
      $filenameToStore = 'noimage.jpg';
    }

      $content = Content::find($request->id);
      $content->resource_link = $filenameToStore;
      if ($content->save()) {
        return $content;
      }

    return NULL;
  }
}