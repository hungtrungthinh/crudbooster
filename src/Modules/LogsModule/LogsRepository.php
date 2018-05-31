<?php

namespace crocodicstudio\crudbooster\Modules\LogsModule;

use Illuminate\Support\Facades\Log;

class LogsRepository
{
    public static function insertLog($description, $uid, $ip = null)
    {
        $log = [
            'created_at' => YmdHis(),
            'ipaddress' => $ip ?: request()->ip(),
            'useragent' => request()->userAgent(),
            'url' => request()->url(),
            'cms_users_id' => $uid,
            'description' => $description
        ];
        Log::info($description, $log);
        \DB::table('cms_logs')->insert($log);
    }
}