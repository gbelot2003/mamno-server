<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\SupportType;
use App\Http\Resources\SupportType as SupportTypeResource;
use App\Services\SupportTypeService;
use App\Services\LogService;

class SupportTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $supportTypeService = new SupportTypeService();
        
        return SupportTypeResource::collection($supportTypeService->readAll($request));
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
        $supportTypeService = new SupportTypeService();
        $supportType = $supportTypeService->create($request);
       
        if ($supportType) {
            $logService = new LogService();
            $logService->create(
                $request->input('user_id'),
                'Tipo de soporte',
                $supportType->support_type_id,
                'Registro del Tipo de soporte',
                'Creacion:' . $supportType
            );

            return (new SupportTypeResource($supportType))
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
        $supportTypeService = new SupportTypeService();
        $supportType = $supportTypeService->read($id);

        if ($supportType) {
            return new SupportTypeResource($supportType);
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
        $supportTypeService = new SupportTypeService();
        $supportType = $supportTypeService->update($request, $id);

        if ($supportType) {
            $logService = new LogService();
            $logService->create(
                $request->input('user_id'),
                'Tipo de soporte',
                $supportType->support_type_id,
                'Actualizacion del tipo de soporte',
                'Actualizacion:' . $supportType
            );

            return (new SupportTypeResource($supportType))
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
        $supportTypeService = new SupportTypeService();
        $supportType = $supportTypeService->delete($request, $id);

        if ($supportType) {
            $logService = new LogService();
            $logService->create(
                $request->input('user_id'),
                'Tipo de soporte',
                $supportType->support_type_id,
                'Eliminacion del tipo de soporte',
                'Eliminacion:' . $supportType
            );

            return (new SupportTypeResource($supportType))
                ->response()
                ->setStatusCode(204);
        }

        return response()->json(['message' => 'Internal Server Error'],500);
    }
}
