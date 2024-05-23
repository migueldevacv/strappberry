<?php

namespace App\Providers;

class MessagesResponse
{
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
