<?php

namespace App\Services\Hostsharing;

use Doctrine\Common\Lexer\AbstractLexer;

class ScriptOutputLexer extends AbstractLexer
{
    const T_BEGIN_ARRAY = 1;

    const T_END_ARRAY = 2;

    const T_BEGIN_OBJECT = 3;

    const T_END_OBJECT = 4;

    const T_ASSOC = 5;

    const T_STRING = 6;

    /**
     * {@inheritDoc}
     */
    protected function getCatchablePatterns(): array
    {
        return [
            "[{}\[\]:]", // delimiter
            "[a-zA-Z0-9@\/\.\-_;]+", // strings
        ];
    }

    /**
     * {@inheritDoc}
     */
    protected function getNonCatchablePatterns(): array
    {
        // new lines spaces and commas get thrown out
        return [
            ',\\n',
            '\\n',
            "\s",
            "'",
            ',',
        ];
    }

    /**
     * {@inheritDoc}
     */
    protected function getType(string &$value)
    {
        return match ($value) {
            '{' => self::T_BEGIN_OBJECT,
            '}' => self::T_END_OBJECT,
            '[' => self::T_BEGIN_ARRAY,
            ']' => self::T_END_ARRAY,
            ':' => self::T_ASSOC,
            default => self::T_STRING,
        };
    }
}
