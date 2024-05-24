<?php

namespace App\Providers;

class MessagesResponse
{

    public static function authOk($data = [])
    {
        return response()->json([
            'message' => "Login successful",
            'status' => true,
            'data' => $data
        ]);
    }

    public static function authFail()
    {
        return response()->json([
            'message' => "The credentials does not match",
            'errors' => ["The credentials does not match"],
            'status' => false
        ]);
    }

    public static function indexOk($data = [])
    {
        return response()->json([
            'data' => $data,
            'status' => true
        ]);
    }

    public static function showOk($data = [])
    {
        return response()->json([
            'data' => $data,
            'status' => true
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public static function createdOk($model = '', $data = [])
    {
        return response()->json([
            'data' => $data,
            'message' => "The $model was created successfully",
            'status' => true
        ]);
    }

    public static function updatedOk($model = '', $data = [])
    {
        return response()->json([
            'data' => $data,
            'message' => "The $model was updated successfully",
            'status' => true
        ]);
    }

    public static function disabledOk($model = '', $data = [])
    {
        return response()->json([
            'data' => $data,
            'message' => "The status form $model was changed successfully",
            'status' => true
        ]);
    }

    public static function idNotProvided()
    {
        return response()->json([
            'status' => false,
            'message' => 'You need to send the id',
            'errors' => [
                'The id was not provided'
            ]
        ]);
    }

    public static function idNotFound()
    {
        return response()->json([
            'status' => false,
            'message' => 'Register not found',
            'errors' => [
                'The id provided was not found'
            ]
        ]);
    }
}
