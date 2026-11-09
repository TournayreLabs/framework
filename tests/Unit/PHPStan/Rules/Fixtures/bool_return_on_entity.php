<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\PHPStan\Rules\Fixtures;

use Doctrine\ORM\Mapping as ORM;

interface Activable
{
    public function isActive(): bool;
}

abstract class ParentWithBool
{
    public function isParent(): bool
    {
        return true;
    }
}

#[ORM\Entity]
class AttributeEntity extends ParentWithBool implements Activable
{
    public function isEnabled(): bool
    {
        return true;
    }

    public function isMaybe(): ?bool
    {
        return null;
    }

    public function label(): string
    {
        return 'label';
    }

    public function isLegacy(): bool
    {
        return true;
    }

    private function isHidden(): bool
    {
        return true;
    }

    public function isParent(): bool
    {
        return false;
    }

    public function isActive(): bool
    {
        return true;
    }
}

/**
 * @ORM\Entity
 */
class AnnotationEntity
{
    public function isEnabled(): bool
    {
        return true;
    }
}

class NotAnEntity
{
    public function isEnabled(): bool
    {
        return true;
    }
}
