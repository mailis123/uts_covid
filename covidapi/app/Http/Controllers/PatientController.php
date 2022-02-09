<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();

        $total = count($patients);

        if ($total) {
            $data = [
                'message' => 'Get All Resource',
                'total' => $total,
                'data' => $patients
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data is empty'
            ];

            return response()->json($data, 200);
        }
}
    public function update(Request $request, $id)
    {
        $patients = Patient::find($id);

        if ($patients) {
            $patients->update($request->all());
            $data = [
                'message' => 'Resource is update successfully',
                'data' => $patients
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }
    public function store(Request $request)
    {
        $patients = Patient::create([
            'nama' => $request->nama,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
            'in_date_at' => $request->in_date_at,
            'out_date_at' => $request->out_date_at
        ]);

        $data = [
            'pesan' => 'Resource is added successfully',
            'data' => $patients
        ];

        return response()->json($data, 201);
    }
    public function show($id)
    {
        $patients = Patient::find($id);

        if ($patients) {
            $data = [
                'message' => 'Get Detail Resource',
                'data' => $patients
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }
    public function delete($patients)
    {
        $patients = Patient::find($patients);

        if ($patients) {
            $patients->delete();
            $data = [
                'message' => 'Resource is delete successfully'
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }
    public function searchByStatus($status)
    {
        $patients = Patient::where('status', $status)->get();

        $total = count($patients);

        if ($total) {
            $data = [
                'message' => 'Get status resource',
                'total' => $total,
                'data' => $patients
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }
    public function negatif()
    {
        return $this->searchByStatus('negatif');
    }
    public function positive()
    {
        return $this->searchByStatus('positive');
    }
}