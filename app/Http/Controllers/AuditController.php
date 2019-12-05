<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OwenIt\Auditing\Audit;
use OwenIt\Auditing\Models\Audit as ModelsAudit;

class AuditController extends Controller
{
    public function __construct()
    {

    }

    /**
     * index function
     *
     * @return void
     */
    public function index()
    {
        $audit = ModelsAudit::with('user')->paginate(20);
        return response()->json($audit, 200);
    }
}
