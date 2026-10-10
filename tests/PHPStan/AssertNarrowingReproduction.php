<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\PHPStan;

use TournayreLabs\Common\Assert\Assert;

/**
 * Reproduction de l'issue #1 : doit passer sans erreur avec PHPStan et Mago,
 * sans extension custom, grâce aux annotations @phpstan-assert.
 */
function longueur(mixed $valeur): int
{
    Assert::string($valeur);

    return strlen($valeur);
}

function entierSuivant(mixed $valeur): int
{
    Assert::integer($valeur);

    return $valeur + 1;
}

function dateFormatee(mixed $valeur): string
{
    Assert::isInstanceOf($valeur, \DateTimeInterface::class);

    return $valeur->format('Y-m-d');
}

function texteNonNull(?string $valeur): string
{
    Assert::notNull($valeur);

    return $valeur;
}

function texteOuNull(mixed $valeur): ?string
{
    Assert::nullOrString($valeur);

    return $valeur;
}

/**
 * @return iterable<string>
 */
function textes(mixed $valeur): iterable
{
    Assert::allString($valeur);

    return $valeur;
}
