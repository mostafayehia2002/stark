<?php

namespace App\Services\Api;

use App\Models\Setting;

class SettingService
{

    public function getSetting(){
      $setting= Setting::all()->groupBy('type');
      if(!$setting->isEmpty()){
          return[
              'success'=>true,
              'data'=>$setting,
          ];
      }
      return [
          'success'=>false,
          'message'=>'No data found',
      ];
    }
}
