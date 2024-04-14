<?php

namespace App\Http\Implementations;

use App\Http\Services\RegistrationApplicationService;
use App\Models\User;
use Illuminate\Http\Request;

Class RegistrationApplicationServiceImpl implements RegistrationApplicationService
{
    public function getAllRegistrationApplications()
    {
        $users = User::where('registration_status', 0)->get();

        return response()->json([
            'success' => true,
            'message' => 'succesfully fetch all registration applications',
            'data' => $users
        ]);
    }

    public function getAllRegistrationApplicationsRejected()
    {
        $users = User::where('registration_status', 2)->get();

        return response()->json([
            'success' => true,
            'message' => 'succesfully fetch all registration applications',
            'data' => $users
        ]);
    }

    public function approve($id)
    {
        $user = User::find($id)->update(['registration_status' => 1]);

        if (!$user) {
            return response()->json([
                'success' => true,
                'message' => 'application not found',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'succesfully approved registration applications',
            'data' => $id,
        ]);
    }

    public function reject($id)
    {
        $user = User::find($id)->update(['registration_status' => 2]);

        if (!$user) {
            return response()->json([
                'success' => true,
                'message' => 'application not found',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'succesfully rejected registration applications',
        ]);
    }
}
