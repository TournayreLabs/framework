<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Primitives;

use PHPUnit\Framework\TestCase;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\String_;

final class String_Test extends TestCase
{
    public function testAppendAddsSuffixToString(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->append(' World');
        self::assertEquals('Hello World', $result->toString());
    }

    public function testAppendDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->append(' World');
        self::assertEquals('Hello', $string->toString());
    }

    public function testAsciiConvertsNonAsciiCharacters(): void
    {
        $string = String_::fromString('Héllo');
        $result = $string->ascii();
        self::assertEquals('Hello', $result->toString());
    }

    public function testAsciiDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Héllo');
        $string->ascii();
        self::assertEquals('Héllo', $string->toString());
    }

    public function testCamelConvertsStringToCamelCase(): void
    {
        $string = String_::fromString('hello world');
        $result = $string->camel();
        self::assertEquals('helloWorld', $result->toString());
    }

    public function testCamelDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('hello world');
        $string->camel();
        self::assertEquals('hello world', $string->toString());
    }

    public function testChunkSplitsStringIntoChunks(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->chunk(2);

        $results = [
            String_::fromString('He'),
            String_::fromString('ll'),
            String_::fromString('o'),
        ];
        self::assertEquals($results, $result);
    }

    public function testChunkSplitsStringIntoChunksOfOneByDefault(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->chunk();
        $results = [
            String_::fromString('H'),
            String_::fromString('e'),
            String_::fromString('l'),
            String_::fromString('l'),
            String_::fromString('o'),
        ];
        self::assertEquals($results, $result);
    }

    public function testChunkDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->chunk(2);
        self::assertEquals('Hello', $string->toString());
    }

    public function testCodePointsAtReturnsCodePoints(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->codePointsAt(1);
        self::assertEquals([101], $result);
    }

    public function testCodePointsAtReturnsEmptyArrayWhenOffsetIsOutOfBounds(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->codePointsAt(10);
        self::assertEquals([], $result);
    }

    public function testCodePointsAtDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->codePointsAt(1);
        self::assertEquals('Hello', $string->toString());
    }

    public function testContainsAnyReturnsTrueWhenNeedleIsFound(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->containsAny('ell');
        self::assertTrue($result->isTrue());
    }

    public function testContainsAnyReturnsFalseWhenNeedleIsNotFound(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->containsAny('xyz');
        self::assertTrue($result->isFalse());
    }

    public function testContainsAnyReturnsTrueWhenNeedleIsFoundInArray(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->containsAny(['xyz', 'ell']);
        self::assertTrue($result->isTrue());
    }

    public function testContainsAnyReturnsFalseWhenNeedleIsNotFoundInArray(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->containsAny(['xyz', 'abc']);
        self::assertTrue($result->isFalse());
    }

    public function testContainsAnyDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->containsAny('ell');
        self::assertEquals('Hello', $string->toString());
    }

    public function testEndsWithReturnsTrueWhenSuffixIsAtEndOfString(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->endsWith('lo');
        self::assertTrue($result->isTrue());
    }

    public function testEndsWithReturnsFalseWhenSuffixIsNotAtEndOfString(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->endsWith('He');
        self::assertTrue($result->isFalse());
    }

    public function testEndsWithDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->endsWith('lo');
        self::assertEquals('Hello', $string->toString());
    }

    public function testEqualsToReturnsTrueWhenStringsAreEqual(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->equalsTo('Hello');
        self::assertTrue($result->isTrue());
    }

    public function testEqualsToReturnsFalseWhenStringsAreNotEqual(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->equalsTo('World');
        self::assertTrue($result->isFalse());
    }

    public function testEqualsToDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->equalsTo('Hello');
        self::assertEquals('Hello', $string->toString());
    }

    public function testFilterVarReturnsTrueWhenStringIsValid(): void
    {
        $string = String_::fromString('email@example.com');
        $result = $string->filterVar(FILTER_VALIDATE_EMAIL);
        self::assertSame('email@example.com', $result->toString());
    }

    public function testFilterVarThrowExceptionWhenStringIsInvalid(): void
    {
        self::expectException(\InvalidArgumentException::class);
        $string = String_::fromString('email@example');
        $string->filterVar(FILTER_VALIDATE_EMAIL);
    }

    public function testFoldedConvertsStringToFoldedCase(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->folded();
        self::assertEquals('hello', $result->toString());
    }

    public function testFoldedDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->folded();
        self::assertEquals('Hello', $string->toString());
    }

    public function testFoldedConvertsStringToFoldedCaseWithCompatibility(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->folded(true);
        self::assertEquals('hello', $result->toString());
    }

    public function testFoldedConvertsStringToFoldedCaseWithoutCompatibility(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->folded(false);
        self::assertEquals('hello', $result->toString());
    }

    public function testFoldedDoesNotChangeOriginalStringWithCompatibility(): void
    {
        $string = String_::fromString('Hello');
        $string->folded(true);
        self::assertEquals('Hello', $string->toString());
    }

    public function testFoldedDoesNotChangeOriginalStringWithoutCompatibility(): void
    {
        $string = String_::fromString('Hello');
        $string->folded(false);
        self::assertEquals('Hello', $string->toString());
    }

    public function testIndexOfReturnsPositionOfNeedle(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->indexOf('l');
        self::assertEquals(2, $result);
    }

    public function testIndexOfThrowsExceptionWhenNeedleIsNotFound(): void
    {
        self::expectException(\InvalidArgumentException::class);
        $string = String_::fromString('Hello');
        $string->indexOf('x');
    }

    public function testIndexOfReturnsPositionOfNeedleAfterOffset(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->indexOf('l', 3);
        self::assertEquals(3, $result);
    }

    public function testIndexOfDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->indexOf('l');
        self::assertEquals('Hello', $string->toString());
    }

    public function testIndexOfLastReturnsPositionOfLastNeedle(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->indexOfLast('l');
        self::assertEquals(3, $result);
    }

    public function testIndexOfLastThrowsExceptionWhenNeedleIsNotFound(): void
    {
        self::expectException(\InvalidArgumentException::class);
        $string = String_::fromString('Hello');
        $string->indexOfLast('x');
    }

    public function testIndexOfLastReturnsPositionOfLastNeedleAfterOffset(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->indexOfLast('l', 2);
        self::assertEquals(3, $result);
    }

    public function testIndexOfLastDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->indexOfLast('l');
        self::assertEquals('Hello', $string->toString());
    }

    public function testJoinConcatenatesStrings(): void
    {
        $string = String_::fromString('');
        $result = $string->join(['Hello', 'World']);
        self::assertEquals('HelloWorld', $result->toString());
    }

    public function testJoinConcatenatesStringsWithLastGlue(): void
    {
        $string = String_::fromString('');
        $result = $string->joinWithLastGlue(['Hello', 'World'], ' and ');
        self::assertEquals('Hello and World', $result->toString());
    }

    public function testJoinDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->join([' ', 'World']);
        self::assertEquals('Hello', $string->toString());
    }

    public function testNormalizeNfcNormalizesString(): void
    {
        $string = String_::fromString("e\u{0301}");

        self::assertTrue(\Normalizer::isNormalized($string->normalizeNfc()->toString(), \Normalizer::NFC));
    }

    public function testNormalizeNfdNormalizesString(): void
    {
        $string = String_::fromString('é');

        self::assertTrue(\Normalizer::isNormalized($string->normalizeNfd()->toString(), \Normalizer::NFD));
    }

    public function testNormalizeNfkcNormalizesString(): void
    {
        $string = String_::fromString("\u{FF21}");

        self::assertTrue(\Normalizer::isNormalized($string->normalizeNfkc()->toString(), \Normalizer::NFKC));
    }

    public function testNormalizeNfkdNormalizesString(): void
    {
        $string = String_::fromString('①');

        self::assertTrue(\Normalizer::isNormalized($string->normalizeNfkd()->toString(), \Normalizer::NFKD));
    }

    public function testKebabConvertsStringToKebabCase(): void
    {
        $string = String_::fromString('hello world');
        $result = $string->kebab();
        self::assertEquals('hello-world', $result->toString());
    }

    public function testKebabDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('hello world');
        $string->kebab();
        self::assertEquals('hello world', $string->toString());
    }

    public function testLengthReturnsLengthOfString(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->length()->intValue();
        self::assertEquals(5, $result);
    }

    /**
     * @throws ThrowableInterface
     */
    public function testLengthBetweenReturnsTrueWhenLengthIsBetweenBounds(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->lengthIsBetween(1, 10);
        self::assertTrue($result->isTrue());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testLengthBetweenThrowExceptionWhenLengthIsBetweenBounds(): void
    {
        self::expectException(\InvalidArgumentException::class);
        String_::fromString('Hello')
            ->lengthIsBetween(1, 10)
            ->throwIfTrue(new \InvalidArgumentException())
        ;
    }

    /**
     * @throws ThrowableInterface
     */
    public function testLengthBetweenThrowExceptionWhenLengthIsNotBetweenBounds(): void
    {
        self::expectException(\InvalidArgumentException::class);
        String_::fromString('Hello')
            ->lengthIsBetween(10, 20)
            ->throwIfFalse(new \InvalidArgumentException())
        ;
    }

    /**
     * @throws ThrowableInterface
     */
    public function testLengthBetweenReturnsFalseWhenLengthIsNotBetweenBounds(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->lengthIsBetween(10, 20);
        self::assertTrue($result->isFalse());
    }

    public function testLowerConvertsStringToLowercase(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->lower();
        self::assertEquals('hello', $result->toString());
    }

    public function testLowerDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->lower();
        self::assertEquals('Hello', $string->toString());
    }

    public function testMatchReturnsMatches(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->match('/[a-z]/');
        self::assertEquals(['e'], $result);
    }

    public function testMatchDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->match('/[a-z]/');
        self::assertEquals('Hello', $string->toString());
    }

    public function testPadBothPadsStringOnBothSides(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->padBoth(10, '-');
        self::assertEquals('--Hello---', $result->toString());
    }

    public function testPadBothDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->padBoth(10, '-');
        self::assertEquals('Hello', $string->toString());
    }

    public function testPadEndPadsStringAtEnd(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->padEnd(10, '-');
        self::assertEquals('Hello-----', $result->toString());
    }

    public function testPadEndDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->padEnd(10, '-');
        self::assertEquals('Hello', $string->toString());
    }

    public function testPadStartPadsStringAtStart(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->padStart(10, '-');
        self::assertEquals('-----Hello', $result->toString());
    }

    public function testPadStartDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->padStart(10, '-');
        self::assertEquals('Hello', $string->toString());
    }

    public function testPrependAddsPrefixToString(): void
    {
        $string = String_::fromString('World');
        $result = $string->prepend('Hello ');
        self::assertEquals('Hello World', $result->toString());
    }

    public function testPrependDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('World');
        $string->prepend('Hello ');
        self::assertEquals('World', $string->toString());
    }

    public function testRepeatRepeatsString(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->repeat(3);
        self::assertEquals('HelloHelloHello', $result->toString());
    }

    public function testRepeatDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->repeat(3);
        self::assertEquals('Hello', $string->toString());
    }

    public function testReplaceReplacesString(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->replace('l', 'r');
        self::assertEquals('Herro', $result->toString());
    }

    public function testReplaceDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->replace('l', 'r');
        self::assertEquals('Hello', $string->toString());
    }

    public function testReplaceMatchesReplacesMatches(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->replaceMatches('/[a-z]/', 'r');
        self::assertEquals('Hrrrr', $result->toString());
    }

    public function testReplaceMatchesDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->replaceMatches('/[a-z]/', 'r');
        self::assertEquals('Hello', $string->toString());
    }

    public function testReverseReversesString(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->reverse();
        self::assertEquals('olleH', $result->toString());
    }

    public function testReverseDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->reverse();
        self::assertEquals('Hello', $string->toString());
    }

    public function testScreamingKebabConvertsStringToScreamingKebabCase(): void
    {
        $string = String_::fromString('hello world');
        $result = $string->screamingKebab();
        self::assertEquals('HELLO-WORLD', $result->toString());
    }

    public function testScreamingKebabDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('hello world');
        $string->screamingKebab();
        self::assertEquals('hello world', $string->toString());
    }

    public function testScreamingSnakeConvertsStringToScreamingSnakeCase(): void
    {
        $string = String_::fromString('hello world');
        $result = $string->screamingSnake();
        self::assertEquals('HELLO_WORLD', $result->toString());
    }

    public function testScreamingSnakeDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('hello world');
        $string->screamingSnake();
        self::assertEquals('hello world', $string->toString());
    }

    public function testSliceReturnsSliceOfString(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->sliceWithLength(1, 3);
        self::assertEquals('ell', $result->toString());
    }

    public function testSliceDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->sliceWithLength(1, 3);
        self::assertEquals('Hello', $string->toString());
    }

    public function testSnakeConvertsStringToSnakeCase(): void
    {
        $string = String_::fromString('hello world');
        $result = $string->snake();
        self::assertEquals('hello_world', $result->toString());
    }

    public function testSnakeDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('hello world');
        $string->snake();
        self::assertEquals('hello world', $string->toString());
    }

    public function testSpliceReplacesPartOfString(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->spliceWithLength('l', 1, 3);
        self::assertEquals('Hlo', $result->toString());
    }

    public function testSpliceDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->spliceWithLength('l', 1, 3);
        self::assertEquals('Hello', $string->toString());
    }

    public function testSplitSplitsString(): void
    {
        $string = String_::fromString('Hello World');
        $result = $string->split(' ');
        $results = [
            String_::fromString('Hello'),
            String_::fromString('World'),
        ];
        self::assertEquals($results, $result);
    }

    public function testSplitSplitsStringWithLimit(): void
    {
        $string = String_::fromString('Hello World Test');
        $result = $string->splitWithLimit('/\s+/', 2);
        self::assertCount(2, $result);
        self::assertEquals(String_::fromString('Hello'), $result[0]);
    }

    public function testSplitDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello World');
        $string->split(' ');
        self::assertEquals('Hello World', $string->toString());
    }

    public function testStartsWithReturnsTrueWhenPrefixIsAtStartOfString(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->startsWith('He');
        self::assertTrue($result->isTrue());
    }

    public function testStartsWithReturnsFalseWhenPrefixIsNotAtStartOfString(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->startsWith('lo');
        self::assertTrue($result->isFalse());
    }

    public function testStartsWithDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->startsWith('He');
        self::assertEquals('Hello', $string->toString());
    }

    public function testTitleConvertsStringToTitleCase(): void
    {
        $string = String_::fromString('hello world');
        $result = $string->title(true);
        self::assertEquals('Hello World', $result->toString());
    }

    public function testTitleDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('hello world');
        $string->title();
        self::assertEquals('hello world', $string->toString());
    }

    public function testTitleConvertsStringToTitleCaseWithAllWords(): void
    {
        $string = String_::fromString('hello world');
        $result = $string->title(true);
        self::assertEquals('Hello World', $result->toString());
    }

    public function testTitleConvertsStringToTitleCaseWithFirstWord(): void
    {
        $string = String_::fromString('hello world');
        $result = $string->title(false);
        self::assertEquals('Hello world', $result->toString());
    }

    public function testTitleDoesNotChangeOriginalStringWithAllWords(): void
    {
        $string = String_::fromString('hello world');
        $string->title(true);
        self::assertEquals('hello world', $string->toString());
    }

    public function testTitleDoesNotChangeOriginalStringWithFirstWord(): void
    {
        $string = String_::fromString('hello world');
        $string->title(false);
        self::assertEquals('hello world', $string->toString());
    }

    public function testTrimRemovesWhitespace(): void
    {
        $string = String_::fromString(' Hello ');
        $result = $string->trim();
        self::assertEquals('Hello', $result->toString());
    }

    public function testTrimDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString(' Hello ');
        $string->trim();
        self::assertEquals(' Hello ', $string->toString());
    }

    public function testTrimRemovesCharacters(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->trim('Ho');
        self::assertEquals('ell', $result->toString());
    }

    public function testTrimEndRemovesWhitespace(): void
    {
        $string = String_::fromString(' Hello ');
        $result = $string->trimEnd();
        self::assertEquals(' Hello', $result->toString());
    }

    public function testTrimEndDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString(' Hello ');
        $string->trimEnd();
        self::assertEquals(' Hello ', $string->toString());
    }

    public function testTrimEndRemovesCharacters(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->trimEnd('o');
        self::assertEquals('Hell', $result->toString());
    }

    public function testTrimPrefixRemovesPrefix(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->trimPrefix('He');
        self::assertEquals('llo', $result->toString());
    }

    public function testTrimPrefixDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->trimPrefix('He');
        self::assertEquals('Hello', $string->toString());
    }

    public function testTrimStartRemovesWhitespace(): void
    {
        $string = String_::fromString(' Hello ');
        $result = $string->trimStart();
        self::assertEquals('Hello ', $result->toString());
    }

    public function testTrimStartDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString(' Hello ');
        $string->trimStart();
        self::assertEquals(' Hello ', $string->toString());
    }

    public function testTrimStartRemovesCharacters(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->trimStart('He');
        self::assertEquals('llo', $result->toString());
    }

    public function testTrimSuffixRemovesSuffix(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->trimSuffix('lo');
        self::assertEquals('Hel', $result->toString());
    }

    public function testTrimSuffixDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->trimSuffix('lo');
        self::assertEquals('Hello', $string->toString());
    }

    public function testUpperConvertsStringToUppercase(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->upper();
        self::assertEquals('HELLO', $result->toString());
    }

    public function testUpperDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->upper();
        self::assertEquals('Hello', $string->toString());
    }

    public function testValueReturnsString(): void
    {
        $string = String_::fromString('Hello');
        self::assertEquals('Hello', $string->toString());
    }

    public function testWidthReturnsWidthOfString(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->width();
        self::assertEquals(5, $result->intValue());
    }

    public function testWidthIgnoresAnsiDecoration(): void
    {
        $string = String_::fromString("\033[31mHello\033[0m");
        $result = $string->width();
        self::assertEquals(5, $result->intValue());
    }

    public function testWidthDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->width();
        self::assertEquals('Hello', $string->toString());
    }

    public function testEnsureEndsWithReturnsStringWithSuffix(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->ensureEnd(' World');
        self::assertEquals('Hello World', $result->toString());
    }

    public function testEnsureEndsWithDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->ensureEnd(' World');
        self::assertEquals('Hello', $string->toString());
    }

    public function testEnsureStartsWithReturnsStringWithPrefix(): void
    {
        $string = String_::fromString('World');
        $result = $string->ensureStart('Hello ');
        self::assertEquals('Hello World', $result->toString());
    }

    public function testEnsureStartsWithDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('World');
        $string->ensureStart('Hello ');
        self::assertEquals('World', $string->toString());
    }

    public function testBeforeLastReturnsStringBeforeLastOccurrenceOfNeedle(): void
    {
        $string = String_::fromString('Hello World');
        $result = $string->beforeLast(' ');
        self::assertEquals('Hello', $result->toString());
    }

    public function testAfterLastReturnsStringAfterLastOccurrenceOfNeedle(): void
    {
        $string = String_::fromString('Hello World');
        $result = $string->afterLast(' ');
        self::assertEquals('World', $result->toString());
    }

    public function testTruncayReturnsStringWithTruncatedLength(): void
    {
        $string = String_::fromString('Hello World');
        $result = $string->truncate(5);
        self::assertEquals('Hello', $result->toString());
    }

    public function testFromPatternfReturnsFormattedString(): void
    {
        $string = String_::fromPattern('Welcome %s %s %s', 'to', 'my', 'World');
        self::assertEquals('Welcome to my World', $string->toString());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testFromPatternWithIntThrowsException(): void
    {
        self::expectException(\InvalidArgumentException::class);
        String_::fromPattern('Welcome %s %s %s', 'to', 1, 'World');
    }

    public function testWhenAppliesCallbackWhenConditionIsTrue(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->when(
            true,
            fn (String_ $str) => $str->append(' World')
        );
        self::assertEquals('Hello World', $result->toString());
    }

    public function testWhenDoesNotApplyCallbackWhenConditionIsFalse(): void
    {
        $string = String_::fromString('Hello');
        $result = $string->when(
            false,
            fn (String_ $str) => $str->append(' World')
        );
        self::assertEquals('Hello', $result->toString());
    }

    public function testWhenDoesNotChangeOriginalString(): void
    {
        $string = String_::fromString('Hello');
        $string->when(
            true,
            fn (String_ $str) => $str->append(' World')
        );
        self::assertEquals('Hello', $string->toString());
    }
}
