<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Support;
use App\Http\Resources\Support as SupportResource;
use App\Services\SupportService;
use App\Services\LogService;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProblemSupportMailable;
use App\Mail\SolutionSupportMailable;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $supportService = new SupportService();

        return SupportResource::collection($supportService->readAll($request));
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
        $supportService = new SupportService();
        $support = $supportService->create($request);
       
        if ($support) {
            // Aqui necesito extraer los datos del usuario que hacer la consulta
            // Para poder obtener su correo y su nombre completo
            $data = [
                'supportUserName' => 'Adrian Elias Guzman',
                'problemTitle' => $request->title,
                'problemDescription' => $request->description
            ];
            Mail::to('adrian_guz92@outlook.com')->send(new ProblemSupportMailable($data));

            $logService = new LogService();
            $logService->create(
                $request->input('user_id'),
                'Soporte',
                $support->support_id,
                'Registro de soporte',
                'Creacion:' . $support
            );

            return (new SupportResource($support))
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
        $supportService = new SupportService();
        $support = $supportService->read($id);

        if ($support) {
            return new SupportResource($support);
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
        $supportService = new SupportService();
        $support = $supportService->update($request, $id);

        if ($support) {
            if ($request->status == 2) {
                $data = [
                    'supportUserName' => 'Adrian Elias Guzman',
                    'problemTitle' => $request->title,
                    'problemDescription' => $request->description,
                    'solutionDescription' => $request->solution
                ];
                Mail::to('adrian_guz92@outlook.com')->send(new SolutionSupportMailable($data));
            } else {
                $data = [
                    'supportUserName' => 'Adrian Elias Guzman',
                    'problemTitle' => $request->title,
                    'problemDescription' => $request->description
                ];
                Mail::to('adrian_guz92@outlook.com')->send(new ProblemSupportMailable($data));
            }

            $logService = new LogService();
            $logService->create(
                $request->input('user_id'),
                'Soporte',
                $support->support_id,
                'Actualizacion del tipo de soporte',
                'Actualizacion:' . $support
            );

            return (new SupportResource($support))
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
    public function destroy($id)
    {
        $supportService = new SupportService();
        $support = $supportService->delete($request, $id);

        if ($support) {
            $logService = new LogService();
            $logService->create(
                $request->input('user_id'),
                'Soporte',
                $support->support_id,
                'Eliminacion del soporte',
                'Eliminacion:' . $support
            );

            return (new SupportTypeResource($support))
                ->response()
                ->setStatusCode(204);
        }

        return response()->json(['message' => 'Internal Server Error'],500);
    }
}
