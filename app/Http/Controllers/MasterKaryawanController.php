<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\HcKontrak;
use App\Models\HcPendidikan;
use App\Models\MasterCabang;
use Illuminate\Http\Request;
use App\Models\MasterJabatan;
use App\Models\MasterKaryawan;
use App\Models\HcKerabatDarurat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\HcKeluargaSebelumMenikah;
use App\Models\HcKeluargaSetelahMenikah;
use App\Models\HcMedsos;
use App\Models\MasterDivisi;
use App\Models\MasterRole;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class MasterKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawans = MasterKaryawan::with(['masterJabatan', 'masterCabang'])->whereNull('deleted_at')->orderBy('id', 'desc')->get();

        $data = $karyawans->toArray();
        $code = 200;

        return response()->json([
            'data' => $data
        ], $code);
    }
}
