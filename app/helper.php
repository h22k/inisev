<?php

use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

if ( ! function_exists('returnData')) {

    /**
     * custom structure
     *
     * @param  iterable|null  $data
     * @param  iterable|null  $error
     * @param  int  $status
     * @return array
     */
    #[ArrayShape([
        'data'     => "iterable|null",
        'error'    => "iterable|null",
        'errorMsg' => "int|null",
        'status'   => "int",
        'success'  => 'bool',
        'alert'    => 'string|null'
    ])]
    function returnData(
        ?iterable $data = null,
        ?iterable $error = null,
        int $status = 200,
    ): array {
        return [
            'data'    => $data,
            'error'   => $error,
            'status'  => $status,
            'success' => (bool)$data,
        ];
    }
}

if ( ! function_exists('success')) {

    /**
     * success json response
     *
     * @param  iterable  $data
     * @param  int  $status
     * @return array
     */
    #[Pure] #[ArrayShape([
        'data'     => "\iterable|null",
        'error'    => "\iterable|null",
        'errorMsg' => "\int|null",
        'status'   => "int",
    ])]
    function success(iterable $data, int $status = 200): array
    {
        return returnData(data: $data, status: $status);
    }

}

if ( ! function_exists('error')) {

    /**
     * fail json response
     *
     * @param  iterable  $error
     * @param  int  $status
     * @return array
     */
    #[Pure] #[ArrayShape([
        'data'     => "\iterable|null",
        'error'    => "\iterable|null",
        'errorMsg' => "\int|null",
    ])]
    function error(iterable $error, int $status = 200): array
    {
        return returnData(error: $error, status: $status);
    }

}

