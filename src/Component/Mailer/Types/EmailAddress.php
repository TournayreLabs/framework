<?php

declare(strict_types=1);

namespace TournayreLabs\Component\Mailer\Types;

use TournayreLabs\Common\Assert\Assert;
use TournayreLabs\Common\Types\Domain;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Bool_;
use TournayreLabs\Primitives\StringType;
use TournayreLabs\Primitives\Traits\StringTypeTrait;

/**
 * Represents an e-mail address.
 */
final class EmailAddress
{
    use StringTypeTrait;

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public static function of(string $value): self
    {
        Assert::email($value, 'Expected a value to be a valid e-mail address. Got: %s');

        return new self(StringType::of($value));
    }

    /**
     * @api
     *
     * @param string|EmailAddress $email
     */
    public function is($email): Bool_
    {
        return $this->equalsTo($email);
    }

    /**
     * @api
     */
    public function username(): EmailUserName
    {
        $emailUserName = $this->value
            ->split('@')[0]->toString()
        ;

        return EmailUserName::of($emailUserName);
    }

    /**
     * @api
     */
    public function usernameIs(string $username): Bool_
    {
        return EmailUserName::of($username)
            ->equalsTo($this->username())
        ;
    }

    /**
     * @api
     */
    public function domain(): Domain
    {
        $domain = $this->value
            ->split('@')[1]->toString()
        ;

        return Domain::of($domain);
    }

    /**
     * @api
     */
    public function domainIs(string $domain): Bool_
    {
        return Domain::of($domain)
            ->equalsTo($this->domain())
        ;
    }

    /**
     * @api
     */
    public function isDeliverable(): Bool_
    {
        $domain = $this->domain()->toString();
        $checkdnsrr = checkdnsrr($domain);

        return Bool_::fromBool($checkdnsrr);
    }

    /**
     * @api
     */
    public function toCanonical(): self
    {
        // remove the string after the '+' character including it and before the '@' character, using a regular expression
        $stringEmail = $this->value
            ->replaceMatches('/\+.*(?=@)/', '')
        ;

        return new self($stringEmail);
    }
}
