<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives;

use TournayreLabs\Common\Assert\Assert;
use TournayreLabs\Common\Exception\InvalidArgumentException;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Traits\EnumTrait;

enum Primitive: string
{
    use EnumTrait;

    case STRING = 'string';

    case INT = 'int';

    case FLOAT = 'float';

    case BOOL = 'bool';

    case ARRAY = 'array';

    case OBJECT = 'object';

    case NULL = 'null';

    case MIXED = 'mixed';

    private static function types(): Collection
    {
        return Collection::of([
            self::STRING,
            self::INT,
            self::FLOAT,
            self::BOOL,
            self::ARRAY,
            self::OBJECT,
            self::NULL,
        ]);
    }

    public function isMixed(): BoolEnum
    {
        $isMixed = $this->is(self::MIXED);

        return BoolEnum::fromBool($isMixed);
    }

    public function isPrimitive(): BoolEnum
    {
        return self::types()
            ->contains($this)
        ;
    }

    /**
     * @throws ThrowableInterface
     */
    public function assert(self $primitive, mixed $value, string $message = ''): void
    {
        $this
            ->isPrimitive()
            ->throwIfFalse(InvalidArgumentException::new(\sprintf('Invalid type "%s". Expected one of "string", "int", "float", "bool", "array", "object" or "null".', $this->value)))
        ;

        Assert::__callStatic($primitive->value, [$value, $message]);
    }
}
