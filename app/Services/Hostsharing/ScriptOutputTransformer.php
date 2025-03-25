<?php

namespace App\Services\Hostsharing;

use Illuminate\Support\Collection;
use stdClass;

class ScriptOutputTransformer
{
    private ScriptOutputLexer $lexer;

    public function __construct($lexer = null)
    {
        $this->lexer = $lexer ?? new ScriptOutputLexer;
    }

    public static function transform($input): Collection|string
    {
        return (new ScriptOutputTransformer())->parse($input);
    }

    public function splitToken($input): array
    {
        $this->lexer->setInput($input);
        $this->lexer->moveNext(); // whyever you have to throw the first...
        $ret = [];
        do {
            $this->lexer->moveNext();
            $ret[] = $this->lexer->token->value;
        } while ($this->lexer->lookahead !== null);

        return $ret;
    }

    public function parse($input): Collection|string
    {
        if(!str_starts_with($input, '[')) {
            return "NO MATCH FOR: $input";
        }
        $this->lexer->setInput($input);
        $this->lexer->moveNext();

        $this->lexer->moveNext();
        $token = $this->lexer->token;

        return match ($token->type) {
            ScriptOutputLexer::T_BEGIN_ARRAY => collect($this->newArray()),
        };
    }

    private function newObject(): object
    {
        $o = new stdClass;
        while (! $this->lexer->lookahead->isA(ScriptOutputLexer::T_END_OBJECT)) {
            $this->lexer->moveNext(); // move to key
            $key = $this->lexer->token->value;
            $this->lexer->moveNext(); // move to assoc :
            $this->lexer->moveNext(); // move to value
            $o->{$key} = match ($this->lexer->token->type) {
                ScriptOutputLexer::T_BEGIN_ARRAY => $this->newArray(),
                ScriptOutputLexer::T_STRING => $this->stringToNative($this->lexer->token->value),
            };
        }
        $this->lexer->moveNext(); // END_OBJ

        return $o;
    }

    private function newArray(): array
    {
        $array = [];
        while (! $this->lexer->lookahead->isA(ScriptOutputLexer::T_END_ARRAY)) {
            $this->lexer->moveNext(); // move to first entry
            $array[] = match ($this->lexer->token->type) {
                ScriptOutputLexer::T_BEGIN_OBJECT => $this->newObject(),
                ScriptOutputLexer::T_STRING => $this->stringToNative($this->lexer->token->value),
            };
        }
        $this->lexer->moveNext(); // END_ARR

        return $array;
    }

    private function stringToNative(string $string): string|int|bool
    {
        $string = trim($string, "'");
        if($string === 'true' || $string === 'false') {
            return $string === 'true';
        }
        if(is_numeric($string)) {
            return (int) $string;
        }
        return $string;
    }
}
