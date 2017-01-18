<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// FS 17-01-17
// Unable to use this FormRequest validation with AngularJS due to 422 HTTP code error

class TicketPost extends FormRequest
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
        return [
            'firstname' => 'required|max:255',
            'lastname'  => 'required|max:255',
            'email'     => 'required|email|max:255',
        ];
    }
}
