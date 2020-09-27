<?php

function process_user_input($user_input, $input_type) {
    $processed_data = [
        'data' => null,
        'error' => null
    ];

    if (!strcasecmp($input_type, 'name')) {
        $data = trim($user_input);
        if (!strlen($data)) {
            $error_msg = 'Name is required';
            $processed_data['error'] = $error_msg;
        } else {
            $processed_data['data'] = $user_input;
        }
    }

    elseif (!strcasecmp($input_type, 'email_address')) {
        if (!strlen(trim($user_input))) {
            $error_msg = 'Email address is required';
            $processed_data['error'] = $error_msg;
        } else {
            $data = filter_var($user_input, FILTER_SANITIZE_EMAIL);
            if (strcmp($data, $user_input)) {
                $error_msg = 'Invalid characters in the email address';
                $processed_data['error'] = $error_msg;
            } elseif (filter_var($data, FILTER_VALIDATE_EMAIL) === false) {
                $error_msg = 'Invalid email address';
                $processed_data['error'] = $error_msg;
            } else {
                $processed_data['data'] = $data;
            }
        }
    }

    elseif (!strcasecmp($input_type, 'password')) {
        if (!strlen($user_input)) {
            $error_msg = 'Password is required';
            $processed_data['error'] = $error_msg;
        } else {
            $password_hash = hash('sha256', $user_input);
            $processed_data['data'] = $password_hash;
        }
    }

    else {
        $processed_data['data'] = $user_input;
    }

    return $processed_data;
}
