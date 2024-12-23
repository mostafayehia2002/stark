<?php
if (!function_exists('formatErrors')){

    function formatErrors(array $errors): array
    {
        $formattedErrors = [];
        foreach ($errors as $field =>$messages) {
            $formattedErrors[] = [
                'field' => $field,
                'messages' => $messages[0],
            ];
        }
        return $formattedErrors;
    }
}

use App\Models\Setting;
if (!function_exists('get_setting_value')) {
    function get_setting_value(string $type, string $key): ?string
    {
        return Setting::getValue($type, $key);
    }
}

if (!function_exists('translate_permission')) {
    function translate_permission(string $permission): string
    {

        return trans('permissions.' . strtolower($permission));
    }
}

if (!function_exists('translate_enums')) {
    function translate_enums(string $enum): string
    {

        return trans('enums.' . strtolower($enum));
    }
}
