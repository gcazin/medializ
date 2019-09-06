<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
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
        /*switch($this->getMethod()) {
            case 'POST':
                return [
                    'name' => ['required', 'string', 'max:25', 'unique:users'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ];
                break;
            case 'PATCH':
                return [
                    'name' => ['string', 'max:25', 'unique:users'],
                    'email' => ['string', 'email', 'max:255', 'unique:users'],
                    'password' => ['sometimes', 'string', 'min:8'],
                ];
                break;
            default;
        }*/

    }
}
