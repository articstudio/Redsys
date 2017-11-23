<?php

function echo_form_field($name, $key, $required = false, $default = '')
{
    $value = filter_input(INPUT_POST, $key, FILTER_DEFAULT);
    echo '<p><label>' . $name . '</label><input type="text" name="' . $key . '" value="' . ($value ? $value : $default) . '" ' . ($required ? 'required' : '') . '></p>';
}
