<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\NaturalCrudRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Admin\Menu;

class MenuRequest extends NaturalCrudRequest
{
    protected $_model = 'menu';
    protected $_table = 'menus';
    protected $_modelClass = Menu::class;

    public function mapResponses()
    {
        return [
            Request::METHOD_GET => fn () => self::tryFindId(),
            Request::METHOD_POST => fn () => self::rulesPost(),
            Request::METHOD_PUT => fn () => self::tryFindId(self::rulesPut($this->route()->parameter($this->_model))),
            Request::METHOD_DELETE => fn () => self::tryFindId(),
        ];
    }

    public function rulesPost()
    {
        return [
            'title' => 'required|string|unique:' . $this->_table,
            'url' => 'required|string|unique:' . $this->_table,
            'menu_id' => 'exists:' . $this->_table . ',id',
            'icon' => 'required|string|max:25',
        ];
    }

    public function rulesPut($id)
    {
        return [
            'icon' => 'required|string|max:25',
            'menu_id' => 'nullable|exists:' . $this->_table . ',id',
            'title' => [
                'required',
                'string',
                Rule::unique($this->_table, 'title')->ignore($id, 'id'),
            ],
            'url' => [
                'required',
                'string',
                Rule::unique($this->_table, 'url')->ignore($id, 'id'),
            ],
        ];
    }
}
