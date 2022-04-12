<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function editnilai(Request $request, $id)
    {
        $sisya = \App\Sisya::find($id);
        $sisya->mapel()->updateExistingPivot($request->pk,['nilai' => $request->value]);
    }
}
