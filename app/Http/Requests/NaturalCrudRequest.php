<?php

namespace App\Http\Requests;

use App\Models\Catalogs\Category;
use App\Providers\MessagesResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class NaturalCrudRequest extends FormRequest
{
    protected $_model = '';
    protected $_table = '';
    protected $_modelClass = Model::class;

    public function mapResponses()
    {
        return [
            Request::METHOD_GET => fn () => self::tryFindId(),
            Request::METHOD_POST => fn () => self::rulesPost(),
            Request::METHOD_PUT => fn () => self::tryFindId(self::rulesPut($this->route()->parameter($this->_model))),
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
        $method = $this->method();
        $responses = $this->mapResponses();
        return $responses[$method]();
    }

    public function rulesPost()
    {
        return [];
    }

    public function rulesPut($id)
    {
        return [];
    }

    /**
     * Handle a failed validation attempt.
     */
    protected function tryFindId($extraRules = [])
    {
        if ($this->route()->parameter($this->_model) == null)
            throw new HttpResponseException(MessagesResponse::idNotProvided(), Response::HTTP_NOT_FOUND);
        if (!$this->_modelClass::find($this->route()->parameter($this->_model)))
            // if (!Category::find($this->route()->parameter($this->_model)))
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
