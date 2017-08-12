<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThesisCopiesRequest extends FormRequest
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
         'incomeNumber' => 'min:5|max:6|required|unique:thesis_copies',
         'barcode' => 'min:5|max:6|required|unique:thesis_copies'
      
      ];
   }
}
