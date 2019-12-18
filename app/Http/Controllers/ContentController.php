<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Content;
use App\Http\Resources\Content as ContentResource;
use App\Services\ContentService;
use App\Services\LogService;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contentService = new ContentService();

        return ContentResource::collection($contentService->readAll($request));
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
        $contentService = new ContentService();
        $content = $contentService->create($request);

        if ($content) {
            $logService = new LogService();
            $logService->create(
                $request->input('user_id'),
                'Contenido',
                $content->id,
                'Registro del contenido',
                'Creacion:' . $content
            );

            return (new ContentResource($content))
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
        $contentService = new ContentService();
        $content = $contentService->read($id);

        if ($content) {
            return new ContentResource($content);
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
        $contentService = new ContentService();
        $content = $contentService->update($request, $id);

        if ($content) {
            $logService = new LogService();
            $logService->create(
                $request->input('user_id'),
                'Contenido',
                $content->id,
                'Actualizacion de contenido',
                'Actualizacion:' . $content
            );

            return (new ContentResource($content))
                ->response()
                ->setStatusCode(200);
        }

        return response()->json(['message' => 'Internal Server Error'],500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $contentService = new ContentService();
        $content = $contentService->delete($request, $id);

        if ($content) {
            $logService = new LogService();
            $logService->create(
                $request->input('user_id'),
                'Contenido',
                $content->id,
                'Eliminacion del contenido',
                'Eliminacion:' . $content
            );

            return (new ContentResource($content))
                ->response()
                ->setStatusCode(204);
        }

        return response()->json(['message' => 'Internal Server Error'],500);
    }

    public function storeFile(Request $request) {
        $contentService = new ContentService();
        $content = $contentService->storeFile($request);

        if ($content) {
            $logService = new LogService();
            $logService->create(
                $request->input('user_id'),
                'Contenido',
                $content->id,
                'Llave de registro del contenido',
                'Carga de archivo:' . $content
            );

            return (new ContentResource($content))
                ->response()
                ->setStatusCode(200);
        }

        return response()->json(['message' => 'Internal Server Error'],500);
    }
}
