<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin\Role;
use App\Providers\MessagesResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
{
    protected  const _model = 'role';

    public function mapResponses()
    {
        return [
            Request::METHOD_GET => fn () => self::tryFindId(),
            Request::METHOD_POST => fn () => self::rulesPost(),
            Request::METHOD_PUT => fn () => self::tryFindId(self::rulesPut($this->route()->parameter(self::_model))),
            Request::METHOD_DELETE => fn () => self::tryFindId(),
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return self::mapResponses()[$this->method()]();
    }

    public function rulesPost()
    {
        return [
            'description' => 'required|string|max:20|min:3|unique:roles'
        ];
    }

    public function rulesPut($id)
    {
        return [
            'description' => [
                'required',
                'string',
                'max:20',
                'min:3',
                Rule::unique('roles', 'description')->ignore($id, 'id'),
            ]
        ];
    }

    /**
     * Handle a failed validation attempt.
     */
    protected function tryFindId($extraRules = [])
    {
        if ($this->route()->parameter(self::_model) == null)
            throw new HttpResponseException(MessagesResponse::idNotProvided(), Response::HTTP_NOT_FOUND);
        if (!Role::find($this->route()->parameter(self::_model)))
            throw new HttpResponseException(MessagesResponse::idNotFound(), Response::HTTP_NOT_FOUND);
        return $extraRules;
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => 'Validation errors',
            'errors' => collect($validator->errors()->all())
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
