<?php

use App\Services\Hostsharing\ScriptOutputTransformer;

it('splits tokens correctly', function () {
    $transformer = new ScriptOutputTransformer;
    expect($transformer->splitToken("[{test:'test'}]"))->toBe([
        '[', '{', 'test', ':', "'test'", '}', ']',
    ]);
});

it('ignores whitespace and seperators correctly', function () {
    $string = "[
    {
        test:'test'
    }
    ]
    ";
    $transformer = new ScriptOutputTransformer;
    expect($transformer->splitToken($string))->toBe([
        '[', '{', 'test', ':', "'test'", '}', ']',
    ]);
});

it('generates correct object from tokens', function () {
    $transformer = new ScriptOutputTransformer;
    $res = $transformer->parse("[{test:'test'}]");
    expect($res instanceof \Illuminate\Support\Collection)->toBeTrue('Is not a collection');
    expect($res[0])
        ->toBeObject()
        ->toMatchObject([
            'test' => 'test',
        ]);
});

it('works with empty strings', function () {
    $transformer = new ScriptOutputTransformer;
    $res = $transformer->parse("[{test:''}]");
    expect($res instanceof \Illuminate\Support\Collection)->toBeTrue('Is not a collection');
    expect($res[0])
        ->toBeObject()
        ->toMatchObject([
            'test' => '',
        ]);
});

it('parses output correctly to array', function ($output, $expected) {
    $transformer = new ScriptOutputTransformer;
    $res = $transformer->parse($output);
    expect($res instanceof \Illuminate\Support\Collection)->toBeTrue('Is not a collection');
    foreach ($res as $key => $obj) {
        expect($obj)->toBeObject();
        expect($obj)->toMatchObject($expected[$key]);
    }
})->with('hs output');
