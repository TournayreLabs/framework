<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives;

use TournayreLabs\Common\Assert\Assert;
use TournayreLabs\Common\Exception\InvalidArgumentException;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

use function Symfony\Component\String\u;

final readonly class String_ implements \Stringable
{
    private function __construct(
        private string $value,
    ) {
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public static function fromPattern(string $string, mixed ...$arg): self
    {
        Assert::allString([...$arg], 'The arguments must be strings');
        $string = sprintf($string, ...$arg);

        return self::fromString($string);
    }

    public static function fromString(string $value): self
    {
        return new self($value);
    }

    /**
     * @api
     */
    public function append(string ...$suffix): self
    {
        $u = u($this->value)->append(...$suffix);

        return self::fromString($u->toString());
    }

    /**
     * Generic UTF-8 to ASCII transliteration.
     *
     * Install the intl extension for best results.
     *
     * @api
     *
     * @param string[]|\Transliterator[]|\Closure[] $rules See "*-Latin" rules from Transliterator::listIDs()
     */
    public function ascii(array $rules = []): self
    {
        $u = u($this->value)->ascii($rules);

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function camel(): self
    {
        $u = u($this->value)->camel();

        return self::fromString($u->toString());
    }

    /**
     * @api
     *
     * @return self[]
     */
    public function chunk(int $length = 1): array
    {
        $chunks = u($this->value)->chunk($length);

        return array_map(static fn ($chunk) => String_::fromString($chunk->toString()), $chunks);
    }

    /**
     * @api
     *
     * @return int[]
     */
    public function codePointsAt(int $offset): array
    {
        return u($this->value)->codePointsAt($offset);
    }

    /**
     * @api
     *
     * @param string|string[] $needle
     */
    public function containsAny($needle): Bool_
    {
        $containsAny = u($this->value)->containsAny($needle);

        return Bool_::fromBool($containsAny);
    }

    /**
     * @api
     *
     * @param string|string[] $suffix
     */
    public function endsWith($suffix): Bool_
    {
        $endsWith = u($this->value)->endsWith($suffix);

        return Bool_::fromBool($endsWith);
    }

    /**
     * @api
     *
     * @param string|string[] $string
     */
    public function equalsTo($string): Bool_
    {
        $equalsTo = u($this->value)->equalsTo($string);

        return Bool_::fromBool($equalsTo);
    }

    /**
     * @api
     */
    public function filterVar(int $filter = FILTER_DEFAULT): self
    {
        $filterVar = filter_var($this->value, $filter);
        if (false === $filterVar) {
            throw match ($filter) {
                FILTER_VALIDATE_EMAIL => InvalidArgumentException::new('Invalid email address'),
                FILTER_VALIDATE_URL => InvalidArgumentException::new('Invalid URL'),
                FILTER_VALIDATE_IP => InvalidArgumentException::new('Invalid IP address'),
                default => InvalidArgumentException::new('Invalid value'),
            };
        }

        return self::fromString($filterVar);
    }

    /**
     * @api
     */
    public function filterVarWith(int $filter, mixed $options): self
    {
        $filterVar = filter_var($this->value, $filter, $options);
        if (false === $filterVar) {
            throw match ($filter) {
                FILTER_VALIDATE_EMAIL => InvalidArgumentException::new('Invalid email address'),
                FILTER_VALIDATE_URL => InvalidArgumentException::new('Invalid URL'),
                FILTER_VALIDATE_IP => InvalidArgumentException::new('Invalid IP address'),
                default => InvalidArgumentException::new('Invalid value'),
            };
        }

        return self::fromString($filterVar);
    }

    /**
     * @api
     */
    public function folded(bool $compat = true): self
    {
        $u = u($this->value)->folded($compat);

        return self::fromString($u->toString());
    }

    /**
     * @throws ThrowableInterface If needle is not found
     *
     * @api
     *
     * @param string|string[] $needle
     */
    public function indexOf($needle, int $offset = 0): int
    {
        $result = u($this->value)->indexOf($needle, $offset);

        if (null === $result) {
            throw InvalidArgumentException::new('Needle not found in string');
        }

        return $result;
    }

    /**
     * @throws ThrowableInterface If needle is not found
     *
     * @api
     *
     * @param string|string[] $needle
     */
    public function indexOfLast($needle, int $offset = 0): int
    {
        $result = u($this->value)->indexOfLast($needle, $offset);

        if (null === $result) {
            throw InvalidArgumentException::new('Needle not found in string');
        }

        return $result;
    }

    /**
     * @api
     *
     * @param array<int, string> $strings
     */
    public function join(array $strings): self
    {
        return self::fromString(u($this->value)->join($strings)->toString());
    }

    /**
     * @api
     *
     * @param array<int, string> $strings
     */
    public function joinWithLastGlue(array $strings, string $lastGlue): self
    {
        return self::fromString(u($this->value)->join($strings, $lastGlue)->toString());
    }

    /**
     * @api
     */
    public function kebab(): self
    {
        $u = u($this->value)->snake()->replace('_', '-');

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function length(): Numeric
    {
        $length = u($this->value)->length();

        return Numeric::of($length);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function lengthIsBetween(int $start, int $end): Bool_
    {
        return self::fromString($this->value)
            ->length()
            ->betweenOrEqual($start, $end)
        ;
    }

    /**
     * @api
     */
    public function lower(): self
    {
        $u = u($this->value)->lower();

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    // @phpstan-ignore-next-line
    public function match(string $regexp, int $flags = 0, int $offset = 0): array
    {
        return u($this->value)->match($regexp, $flags, $offset);
    }

    /**
     * @api
     */
    public function normalizeNfc(): self
    {
        return $this->normalize(\Normalizer::NFC);
    }

    /**
     * @api
     */
    public function normalizeNfd(): self
    {
        return $this->normalize(\Normalizer::NFD);
    }

    /**
     * @api
     */
    public function normalizeNfkc(): self
    {
        return $this->normalize(\Normalizer::NFKC);
    }

    /**
     * @api
     */
    public function normalizeNfkd(): self
    {
        return $this->normalize(\Normalizer::NFKD);
    }

    private function normalize(int $form): self
    {
        $u = u($this->value)->normalize($form);

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function padBoth(int $length, string $padStr = ' '): self
    {
        $u = u($this->value)->padBoth($length, $padStr);

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function padEnd(int $length, string $padStr = ' '): self
    {
        $u = u($this->value)->padEnd($length, $padStr);

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function padStart(int $length, string $padStr = ' '): self
    {
        $u = u($this->value)->padStart($length, $padStr);

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function prepend(string ...$prefix): self
    {
        $u = u($this->value)->prepend(...$prefix);

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function repeat(int $multiplier): self
    {
        $u = u($this->value)->repeat($multiplier);

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function replace(string $from, string $to): self
    {
        $u = u($this->value)->replace($from, $to);

        return self::fromString($u->toString());
    }

    /**
     * @api
     *
     * @param string|callable $to
     */
    public function replaceMatches(string $fromRegexp, $to): self
    {
        $u = u($this->value)->replaceMatches($fromRegexp, $to);

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function reverse(): self
    {
        $u = u($this->value)->reverse();

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function screamingKebab(): self
    {
        return self::fromString($this->value)->kebab()->upper();
    }

    /**
     * @api
     */
    public function screamingSnake(): self
    {
        return self::fromString($this->value)->snake()->upper();
    }

    /**
     * @api
     */
    public function slice(int $start = 0): self
    {
        $u = u($this->value)->slice($start);

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function sliceWithLength(int $start, int $length): self
    {
        $u = u($this->value)->slice($start, $length);

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function snake(): self
    {
        $u = u($this->value)->snake();

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function splice(string $replacement, int $start = 0): self
    {
        $u = u($this->value)->splice($replacement, $start);

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function spliceWithLength(string $replacement, int $start, int $length): self
    {
        $u = u($this->value)->splice($replacement, $start, $length);

        return self::fromString($u->toString());
    }

    /**
     * @api
     *
     * @return self[]
     */
    public function split(string $delimiter): array
    {
        $splits = u($this->value)->split($delimiter);

        return array_map(static fn ($chunk) => String_::fromString($chunk->toString()), $splits);
    }

    /**
     * @api
     *
     * @return self[]
     */
    public function splitWithLimit(string $delimiter, int $limit, int $flags = 0): array
    {
        $splits = u($this->value)->split($delimiter, $limit, $flags);

        return array_map(static fn ($chunk) => String_::fromString($chunk->toString()), $splits);
    }

    /**
     * @api
     *
     * @param string|string[] $prefix
     */
    public function startsWith($prefix): Bool_
    {
        $startsWith = u($this->value)->startsWith($prefix);

        return Bool_::fromBool($startsWith);
    }

    /**
     * @api
     */
    public function title(bool $allWords = false): self
    {
        $u = u($this->value)->title($allWords);

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function trim(string $chars = " \t\n\r\0\x0B\x0C\u{A0}\u{FEFF}"): self
    {
        $u = u($this->value)->trim($chars);

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function trimEnd(string $chars = " \t\n\r\0\x0B\x0C\u{A0}\u{FEFF}"): self
    {
        $u = u($this->value)->trimEnd($chars);

        return self::fromString($u->toString());
    }

    /**
     * @api
     *
     * @param string|string[] $prefix
     */
    public function trimPrefix($prefix): self
    {
        $u = u($this->value)->trimPrefix($prefix);

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function trimStart(string $chars = " \t\n\r\0\x0B\x0C\u{A0}\u{FEFF}"): self
    {
        $u = u($this->value)->trimStart($chars);

        return self::fromString($u->toString());
    }

    /**
     * @api
     *
     * @param string|string[] $suffix
     */
    public function trimSuffix($suffix): self
    {
        $u = u($this->value)->trimSuffix($suffix);

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function upper(): self
    {
        $u = u($this->value)->upper();

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function toString(): string
    {
        return $this->value;
    }

    /**
     * @api
     */
    public function width(bool $ignoreAnsiDecoration = true): Numeric
    {
        $width = u($this->value)->width($ignoreAnsiDecoration);

        return Numeric::of($width);
    }

    public function __toString(): string
    {
        return $this->value;
    }

    /**
     * @api
     */
    public function ensureEnd(string $string): self
    {
        $u = u($this->value)->ensureEnd($string);

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function ensureStart(string $string): self
    {
        $u = u($this->value)->ensureStart($string);

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function beforeLast(string $string): self
    {
        $u = u($this->value)->beforeLast($string);

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function afterLast(string $string): self
    {
        $u = u($this->value)->afterLast($string);

        return self::fromString($u->toString());
    }

    /**
     * @api
     */
    public function truncate(int $int): self
    {
        $u = u($this->value)->truncate($int);

        return self::fromString($u->toString());
    }

    /**
     * Conditionally executes a callback on the string.
     *
     * @api
     *
     * @param bool     $condition The condition to check
     * @param callable $callback  The callback to execute if the condition is true
     *
     * @return self The modified string if the condition is true, otherwise the original string
     */
    public function when(bool $condition, callable $callback): self
    {
        if ($condition) {
            return $callback($this);
        }

        return $this;
    }
}
