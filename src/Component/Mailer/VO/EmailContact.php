<?php

declare(strict_types=1);

namespace TournayreLabs\Component\Mailer\VO;

use TournayreLabs\Component\Mailer\Types\EmailAddress;
use TournayreLabs\Component\Mailer\Types\EmailName;
use TournayreLabs\Contracts\Log\LoggableInterface;
use TournayreLabs\Primitives\Bool_;

final readonly class EmailContact implements LoggableInterface
{
    private function __construct(
        private EmailAddress $email,
        private EmailName $name,
    ) {
    }

    /**
     * @api
     */
    public static function create(EmailAddress $emailAddress, EmailName $emailName): self
    {
        return new self($emailAddress, $emailName);
    }

    /**
     * @api
     */
    public function email(): EmailAddress
    {
        return $this->email;
    }

    /**
     * @api
     */
    public function name(): EmailName
    {
        return $this->name;
    }

    /**
     * @api
     */
    public function equalsTo(EmailContact $emailContact): Bool_
    {
        $emailAddressSameAsContact = $this->email
            ->equalsTo($emailContact->email())
            ->isTrue()
        ;

        $emailNameSameAsContact = $this->name
            ->equalsTo($emailContact->name())
            ->isTrue()
        ;

        $equalTo = $emailAddressSameAsContact
            && $emailNameSameAsContact;

        return Bool_::fromBool($equalTo);
    }

    /**
     * @return array<string, string>
     */
    public function toLog(): array
    {
        return [
            'email' => $this->email->toString(),
            'name' => $this->name->toString(),
        ];
    }
}
