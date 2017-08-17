<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigurationRequest extends FormRequest
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
         'startMonday' => 'after:endMonday',
         'startTuesday' => 'after:endTuesday',
         'startWednesday' => 'after:endWednesday',
         'startThursday' => 'after:endThursday',
         'startFriday' => 'after:endFriday',
         'startSaturday' => 'after:endSaturday',
         'startSunday' => 'after:endSunday',
         'endMonday' => 'before:startMonday',
         'endTuesday' => 'before:startTuesday',
         'endWednesday' => 'before:startWednesday',
         'endThursday' => 'before:startThursday',
         'endFriday' => 'before:startFriday',
         'endSaturday' => 'before:startSaturday',
         'endSunday' => 'before:startSunday'
      ];
   }
}
