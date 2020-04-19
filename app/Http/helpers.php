<?php
/**
 * Created by PhpStorm.
 * User: nerotechz
 * Date: 12/16/2015
 * Time: 6:29 PM
 */



if (! function_exists('isValidEmail')) {
    /**
     * check if email is valid or not
     * Return if valid then return email else false.
     *
     * @param  mixed  $value
     * @return mixed
     */
    function isValidEmail($value)
    {
        if (filter_var($value, FILTER_VALIDATE_EMAIL) === $value) {
            return $value;
        }
        return false;
    }
}

