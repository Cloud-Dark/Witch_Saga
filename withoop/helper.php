<?php
function mysql_escape_string(string $unescaped_string): string
{
    $replacementMap = [
        "\0" => "\\0",
        "\n" => "\\n",
        "\r" => "\\r",
        "\t" => "\\t",
        chr(26) => "\\Z",
        chr(8) => "\\b",
        '"' => '\"',
        "'" => "\'",
        '_' => "\_",
        "%" => "\%",
        '\\' => '\\\\'
    ];

    return \strtr($unescaped_string, $replacementMap);
}

function display_errors()
{
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    return true;
}
function hide_errors()
{
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(E_ALL);
    return true;
}

function escape($value)
{
    $return = '';

    $input = htmlspecialchars($value, ENT_IGNORE, 'utf-8');
    $input = strip_tags($input);
    $input = stripslashes($input);
    $input = mysql_escape_string($input);

    for ($i = 0; $i < strlen($value); ++$i) {
        $char = $value[$i];
        $ord = ord($char);
        if ($char !== "'" && $char !== "\"" && $char !== '\\' && $ord >= 32 && $ord <= 126)
            $return .= $char;
        else
            $return .= '\\x' . dechex($ord);
    }
    return $return;
}
function get($d)
{
    $d = isset($_GET[$d]) ? $_GET[$d] : NULL;
    $d = escape($d);
    $d = filter_var($d);
    return $d;
}
function post($d)
{
    $d = isset($_POST[$d]) ? $_POST[$d] : NULL;
    $d = escape($d);
    $d = filter_var($d);
    return $d;
}
