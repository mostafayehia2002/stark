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
