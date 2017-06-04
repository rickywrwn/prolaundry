<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pemakaianRequest extends FormRequest
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
      $i = 0;
      foreach($this->request->get('items') as $key => $val)
      {

       $rules['items.'.$key] = "max:$arrStok[$i]";
       $i++;
      }

      return $rules;
    }
}
