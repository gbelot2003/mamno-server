<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Log as LogResource;
use App\Services\LogService;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $logService = new LogService();

        return LogResource::collection($logService->readAll($request));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $logService = new LogService();
        $log = $logService->create($request);
        
        if ($log) {
            return (new LogResource($log))
                ->response()
                ->setStatusCode(201);
        }
        
        return response()->json(['message' => 'Internal Server Error'],500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $logService = new LogService();
        $log = $logService->read($id);

        if ($log) {
            return new LogResource($log);
        }

        return response()->json(['message' => 'Not Found'],404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response()->json(['message' => 'Not Implemented'],501);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(['message' => 'Not Implemented'],501);
    }
}
