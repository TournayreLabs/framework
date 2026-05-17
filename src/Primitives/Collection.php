<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives;

use Aimeos\Map as AimeosMap;
use TournayreLabs\Contracts\Collection\AddInterface;
use TournayreLabs\Contracts\Collection\AfterInterface;
use TournayreLabs\Contracts\Collection\AllInterface;
use TournayreLabs\Contracts\Collection\ArsortInterface;
use TournayreLabs\Contracts\Collection\AsortInterface;
use TournayreLabs\Contracts\Collection\AtInterface;
use TournayreLabs\Contracts\Collection\AtLeastOneElementInterface;
use TournayreLabs\Contracts\Collection\AvgInterface;
use TournayreLabs\Contracts\Collection\BeforeInterface;
use TournayreLabs\Contracts\Collection\BoolInterface;
use TournayreLabs\Contracts\Collection\CallInterface;
use TournayreLabs\Contracts\Collection\CastInterface;
use TournayreLabs\Contracts\Collection\ChunkInterface;
use TournayreLabs\Contracts\Collection\ClearInterface;
use TournayreLabs\Contracts\Collection\CloneInterface;
use TournayreLabs\Contracts\Collection\ColInterface;
use TournayreLabs\Contracts\Collection\CollapseInterface;
use TournayreLabs\Contracts\Collection\CombineInterface;
use TournayreLabs\Contracts\Collection\CompareInterface;
use TournayreLabs\Contracts\Collection\ConcatInterface;
use TournayreLabs\Contracts\Collection\ContainsInterface;
use TournayreLabs\Contracts\Collection\CopyInterface;
use TournayreLabs\Contracts\Collection\CountByInterface;
use TournayreLabs\Contracts\Collection\CountInterface;
use TournayreLabs\Contracts\Collection\DdInterface;
use TournayreLabs\Contracts\Collection\DelimiterInterface;
use TournayreLabs\Contracts\Collection\DiffAssocInterface;
use TournayreLabs\Contracts\Collection\DiffInterface;
use TournayreLabs\Contracts\Collection\DiffKeysInterface;
use TournayreLabs\Contracts\Collection\DumpInterface;
use TournayreLabs\Contracts\Collection\DuplicatesInterface;
use TournayreLabs\Contracts\Collection\EachInterface;
use TournayreLabs\Contracts\Collection\EmptyInterface;
use TournayreLabs\Contracts\Collection\EqualsInterface;
use TournayreLabs\Contracts\Collection\EveryInterface;
use TournayreLabs\Contracts\Collection\ExceptInterface;
use TournayreLabs\Contracts\Collection\ExplodeInterface;
use TournayreLabs\Contracts\Collection\FilterInterface;
use TournayreLabs\Contracts\Collection\FindInterface;
use TournayreLabs\Contracts\Collection\FirstInterface;
use TournayreLabs\Contracts\Collection\FirstKeyInterface;
use TournayreLabs\Contracts\Collection\FlatInterface;
use TournayreLabs\Contracts\Collection\FlipInterface;
use TournayreLabs\Contracts\Collection\FloatInterface;
use TournayreLabs\Contracts\Collection\FromInterface;
use TournayreLabs\Contracts\Collection\FromJsonInterface;
use TournayreLabs\Contracts\Collection\GetInterface;
use TournayreLabs\Contracts\Collection\GetIteratorInterface;
use TournayreLabs\Contracts\Collection\GrepInterface;
use TournayreLabs\Contracts\Collection\GroupByInterface;
use TournayreLabs\Contracts\Collection\HasInterface;
use TournayreLabs\Contracts\Collection\HasNoElementInterface;
use TournayreLabs\Contracts\Collection\HasOneElementInterface;
use TournayreLabs\Contracts\Collection\HasSeveralElementsInterface;
use TournayreLabs\Contracts\Collection\HasXElementsInterface;
use TournayreLabs\Contracts\Collection\IfAnyInterface;
use TournayreLabs\Contracts\Collection\IfEmptyInterface;
use TournayreLabs\Contracts\Collection\IfInterface;
use TournayreLabs\Contracts\Collection\ImplementsInterface;
use TournayreLabs\Contracts\Collection\IncludesInterface;
use TournayreLabs\Contracts\Collection\IndexInterface;
use TournayreLabs\Contracts\Collection\InInterface;
use TournayreLabs\Contracts\Collection\InsertAfterInterface;
use TournayreLabs\Contracts\Collection\InsertAtInterface;
use TournayreLabs\Contracts\Collection\InsertBeforeInterface;
use TournayreLabs\Contracts\Collection\IntersectAssocInterface;
use TournayreLabs\Contracts\Collection\IntersectInterface;
use TournayreLabs\Contracts\Collection\IntersectKeysInterface;
use TournayreLabs\Contracts\Collection\IntInterface;
use TournayreLabs\Contracts\Collection\IsEmptyInterface;
use TournayreLabs\Contracts\Collection\IsInterface;
use TournayreLabs\Contracts\Collection\IsNumericInterface;
use TournayreLabs\Contracts\Collection\IsObjectInterface;
use TournayreLabs\Contracts\Collection\IsScalarInterface;
use TournayreLabs\Contracts\Collection\JoinInterface;
use TournayreLabs\Contracts\Collection\JsonSerializeInterface;
use TournayreLabs\Contracts\Collection\KeysInterface;
use TournayreLabs\Contracts\Collection\KrsortInterface;
use TournayreLabs\Contracts\Collection\KsortInterface;
use TournayreLabs\Contracts\Collection\LastInterface;
use TournayreLabs\Contracts\Collection\LastKeyInterface;
use TournayreLabs\Contracts\Collection\LtrimInterface;
use TournayreLabs\Contracts\Collection\MapInterface;
use TournayreLabs\Contracts\Collection\MaxInterface;
use TournayreLabs\Contracts\Collection\MergeInterface;
use TournayreLabs\Contracts\Collection\MinInterface;
use TournayreLabs\Contracts\Collection\NoneInterface;
use TournayreLabs\Contracts\Collection\NthInterface;
use TournayreLabs\Contracts\Collection\OffsetExistsInterface;
use TournayreLabs\Contracts\Collection\OffsetGetInterface;
use TournayreLabs\Contracts\Collection\OffsetSetInterface;
use TournayreLabs\Contracts\Collection\OffsetUnsetInterface;
use TournayreLabs\Contracts\Collection\OnlyInterface;
use TournayreLabs\Contracts\Collection\OrderInterface;
use TournayreLabs\Contracts\Collection\PadInterface;
use TournayreLabs\Contracts\Collection\PartitionInterface;
use TournayreLabs\Contracts\Collection\PipeInterface;
use TournayreLabs\Contracts\Collection\PluckInterface;
use TournayreLabs\Contracts\Collection\PopInterface;
use TournayreLabs\Contracts\Collection\PosInterface;
use TournayreLabs\Contracts\Collection\PrefixInterface;
use TournayreLabs\Contracts\Collection\PrependInterface;
use TournayreLabs\Contracts\Collection\PullInterface;
use TournayreLabs\Contracts\Collection\PushInterface;
use TournayreLabs\Contracts\Collection\PutInterface;
use TournayreLabs\Contracts\Collection\RandomInterface;
use TournayreLabs\Contracts\Collection\ReduceInterface;
use TournayreLabs\Contracts\Collection\RejectInterface;
use TournayreLabs\Contracts\Collection\RekeyInterface;
use TournayreLabs\Contracts\Collection\RemoveInterface;
use TournayreLabs\Contracts\Collection\ReplaceInterface;
use TournayreLabs\Contracts\Collection\ReverseInterface;
use TournayreLabs\Contracts\Collection\RsortInterface;
use TournayreLabs\Contracts\Collection\RtrimInterface;
use TournayreLabs\Contracts\Collection\SearchInterface;
use TournayreLabs\Contracts\Collection\SepInterface;
use TournayreLabs\Contracts\Collection\SetInterface;
use TournayreLabs\Contracts\Collection\ShiftInterface;
use TournayreLabs\Contracts\Collection\ShuffleInterface;
use TournayreLabs\Contracts\Collection\SkipInterface;
use TournayreLabs\Contracts\Collection\SliceInterface;
use TournayreLabs\Contracts\Collection\SomeInterface;
use TournayreLabs\Contracts\Collection\SortInterface;
use TournayreLabs\Contracts\Collection\SpliceInterface;
use TournayreLabs\Contracts\Collection\StrAfterInterface;
use TournayreLabs\Contracts\Collection\StrBeforeInterface;
use TournayreLabs\Contracts\Collection\StrContainsAllInterface;
use TournayreLabs\Contracts\Collection\StrContainsInterface;
use TournayreLabs\Contracts\Collection\StrEndsAllInterface;
use TournayreLabs\Contracts\Collection\StrEndsInterface;
use TournayreLabs\Contracts\Collection\StringInterface;
use TournayreLabs\Contracts\Collection\StrLowerInterface;
use TournayreLabs\Contracts\Collection\StrReplaceInterface;
use TournayreLabs\Contracts\Collection\StrStartsAllInterface;
use TournayreLabs\Contracts\Collection\StrStartsInterface;
use TournayreLabs\Contracts\Collection\StrUpperInterface;
use TournayreLabs\Contracts\Collection\SuffixInterface;
use TournayreLabs\Contracts\Collection\SumInterface;
use TournayreLabs\Contracts\Collection\TakeInterface;
use TournayreLabs\Contracts\Collection\TapInterface;
use TournayreLabs\Contracts\Collection\ToArrayInterface;
use TournayreLabs\Contracts\Collection\ToJsonInterface;
use TournayreLabs\Contracts\Collection\ToUrlInterface;
use TournayreLabs\Contracts\Collection\TransposeInterface;
use TournayreLabs\Contracts\Collection\TraverseInterface;
use TournayreLabs\Contracts\Collection\TreeInterface;
use TournayreLabs\Contracts\Collection\TrimInterface;
use TournayreLabs\Contracts\Collection\UasortInterface;
use TournayreLabs\Contracts\Collection\UksortInterface;
use TournayreLabs\Contracts\Collection\UnionInterface;
use TournayreLabs\Contracts\Collection\UniqueInterface;
use TournayreLabs\Contracts\Collection\UnshiftInterface;
use TournayreLabs\Contracts\Collection\UsortInterface;
use TournayreLabs\Contracts\Collection\ValuesInterface;
use TournayreLabs\Contracts\Collection\WalkInterface;
use TournayreLabs\Contracts\Collection\WhereInterface;
use TournayreLabs\Contracts\Collection\WithInterface;
use TournayreLabs\Contracts\Collection\ZipInterface;
use TournayreLabs\Primitives\Traits\Collection\Add;
use TournayreLabs\Primitives\Traits\Collection\After;
use TournayreLabs\Primitives\Traits\Collection\All;
use TournayreLabs\Primitives\Traits\Collection\Arsort;
use TournayreLabs\Primitives\Traits\Collection\Asort;
use TournayreLabs\Primitives\Traits\Collection\At;
use TournayreLabs\Primitives\Traits\Collection\AtLeastOneElement;
use TournayreLabs\Primitives\Traits\Collection\Avg;
use TournayreLabs\Primitives\Traits\Collection\Before;
use TournayreLabs\Primitives\Traits\Collection\Bool_ as BoolTrait;
use TournayreLabs\Primitives\Traits\Collection\Call;
use TournayreLabs\Primitives\Traits\Collection\Cast;
use TournayreLabs\Primitives\Traits\Collection\Chunk;
use TournayreLabs\Primitives\Traits\Collection\Clear;
use TournayreLabs\Primitives\Traits\Collection\Clone_;
use TournayreLabs\Primitives\Traits\Collection\Col;
use TournayreLabs\Primitives\Traits\Collection\Collapse;
use TournayreLabs\Primitives\Traits\Collection\Combine;
use TournayreLabs\Primitives\Traits\Collection\Compare;
use TournayreLabs\Primitives\Traits\Collection\Concat;
use TournayreLabs\Primitives\Traits\Collection\Contains;
use TournayreLabs\Primitives\Traits\Collection\Copy;
use TournayreLabs\Primitives\Traits\Collection\Count;
use TournayreLabs\Primitives\Traits\Collection\CountBy;
use TournayreLabs\Primitives\Traits\Collection\Dd;
use TournayreLabs\Primitives\Traits\Collection\Delimiter;
use TournayreLabs\Primitives\Traits\Collection\Diff;
use TournayreLabs\Primitives\Traits\Collection\DiffAssoc;
use TournayreLabs\Primitives\Traits\Collection\DiffKeys;
use TournayreLabs\Primitives\Traits\Collection\Dump;
use TournayreLabs\Primitives\Traits\Collection\Duplicates;
use TournayreLabs\Primitives\Traits\Collection\Each;
use TournayreLabs\Primitives\Traits\Collection\Empty_;
use TournayreLabs\Primitives\Traits\Collection\Equals;
use TournayreLabs\Primitives\Traits\Collection\Every;
use TournayreLabs\Primitives\Traits\Collection\Except;
use TournayreLabs\Primitives\Traits\Collection\Explode;
use TournayreLabs\Primitives\Traits\Collection\Filter;
use TournayreLabs\Primitives\Traits\Collection\Find;
use TournayreLabs\Primitives\Traits\Collection\First;
use TournayreLabs\Primitives\Traits\Collection\FirstKey;
use TournayreLabs\Primitives\Traits\Collection\Flat;
use TournayreLabs\Primitives\Traits\Collection\Flip;
use TournayreLabs\Primitives\Traits\Collection\Float_;
use TournayreLabs\Primitives\Traits\Collection\From;
use TournayreLabs\Primitives\Traits\Collection\FromJson;
use TournayreLabs\Primitives\Traits\Collection\Get;
use TournayreLabs\Primitives\Traits\Collection\GetIterator;
use TournayreLabs\Primitives\Traits\Collection\Grep;
use TournayreLabs\Primitives\Traits\Collection\GroupBy;
use TournayreLabs\Primitives\Traits\Collection\Has;
use TournayreLabs\Primitives\Traits\Collection\HasNoElement;
use TournayreLabs\Primitives\Traits\Collection\HasOneElement;
use TournayreLabs\Primitives\Traits\Collection\HasSeveralElements;
use TournayreLabs\Primitives\Traits\Collection\HasXElements;
use TournayreLabs\Primitives\Traits\Collection\If_;
use TournayreLabs\Primitives\Traits\Collection\IfAny;
use TournayreLabs\Primitives\Traits\Collection\IfEmpty;
use TournayreLabs\Primitives\Traits\Collection\Implements_;
use TournayreLabs\Primitives\Traits\Collection\In;
use TournayreLabs\Primitives\Traits\Collection\Includes;
use TournayreLabs\Primitives\Traits\Collection\Index;
use TournayreLabs\Primitives\Traits\Collection\InsertAfter;
use TournayreLabs\Primitives\Traits\Collection\InsertAt;
use TournayreLabs\Primitives\Traits\Collection\InsertBefore;
use TournayreLabs\Primitives\Traits\Collection\Int_;
use TournayreLabs\Primitives\Traits\Collection\Intersect;
use TournayreLabs\Primitives\Traits\Collection\IntersectAssoc;
use TournayreLabs\Primitives\Traits\Collection\IntersectKeys;
use TournayreLabs\Primitives\Traits\Collection\Is;
use TournayreLabs\Primitives\Traits\Collection\IsEmpty;
use TournayreLabs\Primitives\Traits\Collection\IsNumeric;
use TournayreLabs\Primitives\Traits\Collection\IsObject;
use TournayreLabs\Primitives\Traits\Collection\IsScalar;
use TournayreLabs\Primitives\Traits\Collection\Join;
use TournayreLabs\Primitives\Traits\Collection\JsonSerialize;
use TournayreLabs\Primitives\Traits\Collection\Keys;
use TournayreLabs\Primitives\Traits\Collection\Krsort;
use TournayreLabs\Primitives\Traits\Collection\Ksort;
use TournayreLabs\Primitives\Traits\Collection\Last;
use TournayreLabs\Primitives\Traits\Collection\LastKey;
use TournayreLabs\Primitives\Traits\Collection\Ltrim;
use TournayreLabs\Primitives\Traits\Collection\Map;
use TournayreLabs\Primitives\Traits\Collection\Max;
use TournayreLabs\Primitives\Traits\Collection\Merge;
use TournayreLabs\Primitives\Traits\Collection\Min;
use TournayreLabs\Primitives\Traits\Collection\None;
use TournayreLabs\Primitives\Traits\Collection\Nth;
use TournayreLabs\Primitives\Traits\Collection\OffsetExists;
use TournayreLabs\Primitives\Traits\Collection\OffsetGet;
use TournayreLabs\Primitives\Traits\Collection\OffsetSet;
use TournayreLabs\Primitives\Traits\Collection\OffsetUnset;
use TournayreLabs\Primitives\Traits\Collection\Only;
use TournayreLabs\Primitives\Traits\Collection\Order;
use TournayreLabs\Primitives\Traits\Collection\Pad;
use TournayreLabs\Primitives\Traits\Collection\Partition;
use TournayreLabs\Primitives\Traits\Collection\Pipe;
use TournayreLabs\Primitives\Traits\Collection\Pluck;
use TournayreLabs\Primitives\Traits\Collection\Pop;
use TournayreLabs\Primitives\Traits\Collection\Pos;
use TournayreLabs\Primitives\Traits\Collection\Prefix;
use TournayreLabs\Primitives\Traits\Collection\Prepend;
use TournayreLabs\Primitives\Traits\Collection\Pull;
use TournayreLabs\Primitives\Traits\Collection\Push;
use TournayreLabs\Primitives\Traits\Collection\Put;
use TournayreLabs\Primitives\Traits\Collection\Random;
use TournayreLabs\Primitives\Traits\Collection\Reduce;
use TournayreLabs\Primitives\Traits\Collection\Reject;
use TournayreLabs\Primitives\Traits\Collection\Rekey;
use TournayreLabs\Primitives\Traits\Collection\Remove;
use TournayreLabs\Primitives\Traits\Collection\Replace;
use TournayreLabs\Primitives\Traits\Collection\Reverse;
use TournayreLabs\Primitives\Traits\Collection\Rsort;
use TournayreLabs\Primitives\Traits\Collection\Rtrim;
use TournayreLabs\Primitives\Traits\Collection\Search;
use TournayreLabs\Primitives\Traits\Collection\Sep;
use TournayreLabs\Primitives\Traits\Collection\Set;
use TournayreLabs\Primitives\Traits\Collection\Shift;
use TournayreLabs\Primitives\Traits\Collection\Shuffle;
use TournayreLabs\Primitives\Traits\Collection\Skip;
use TournayreLabs\Primitives\Traits\Collection\Slice;
use TournayreLabs\Primitives\Traits\Collection\Some;
use TournayreLabs\Primitives\Traits\Collection\Sort;
use TournayreLabs\Primitives\Traits\Collection\Splice;
use TournayreLabs\Primitives\Traits\Collection\StrAfter;
use TournayreLabs\Primitives\Traits\Collection\StrBefore;
use TournayreLabs\Primitives\Traits\Collection\StrContains;
use TournayreLabs\Primitives\Traits\Collection\StrContainsAll;
use TournayreLabs\Primitives\Traits\Collection\StrEnds;
use TournayreLabs\Primitives\Traits\Collection\StrEndsAll;
use TournayreLabs\Primitives\Traits\Collection\String_ as StringTrait;
use TournayreLabs\Primitives\Traits\Collection\StrLower;
use TournayreLabs\Primitives\Traits\Collection\StrReplace;
use TournayreLabs\Primitives\Traits\Collection\StrStarts;
use TournayreLabs\Primitives\Traits\Collection\StrStartsAll;
use TournayreLabs\Primitives\Traits\Collection\StrUpper;
use TournayreLabs\Primitives\Traits\Collection\Suffix;
use TournayreLabs\Primitives\Traits\Collection\Sum;
use TournayreLabs\Primitives\Traits\Collection\Take;
use TournayreLabs\Primitives\Traits\Collection\Tap;
use TournayreLabs\Primitives\Traits\Collection\ToArray;
use TournayreLabs\Primitives\Traits\Collection\ToJson;
use TournayreLabs\Primitives\Traits\Collection\ToUrl;
use TournayreLabs\Primitives\Traits\Collection\Transpose;
use TournayreLabs\Primitives\Traits\Collection\Traverse;
use TournayreLabs\Primitives\Traits\Collection\Tree;
use TournayreLabs\Primitives\Traits\Collection\Trim;
use TournayreLabs\Primitives\Traits\Collection\Uasort;
use TournayreLabs\Primitives\Traits\Collection\Uksort;
use TournayreLabs\Primitives\Traits\Collection\Union;
use TournayreLabs\Primitives\Traits\Collection\Unique;
use TournayreLabs\Primitives\Traits\Collection\Unshift;
use TournayreLabs\Primitives\Traits\Collection\Usort;
use TournayreLabs\Primitives\Traits\Collection\Values;
use TournayreLabs\Primitives\Traits\Collection\Walk;
use TournayreLabs\Primitives\Traits\Collection\Where;
use TournayreLabs\Primitives\Traits\Collection\With;
use TournayreLabs\Primitives\Traits\Collection\Zip;

final readonly class Collection implements AddInterface, AllInterface, AtInterface, BoolInterface, CallInterface, FindInterface, FirstInterface, FirstKeyInterface, GetInterface, IndexInterface, IntInterface, FloatInterface, KeysInterface, LastInterface, LastKeyInterface, PopInterface, PosInterface, PullInterface, RandomInterface, SearchInterface, ShiftInterface, StringInterface, ToArrayInterface, UniqueInterface, ValuesInterface, ConcatInterface, InsertAfterInterface, InsertAtInterface, InsertBeforeInterface, MergeInterface, PadInterface, PrependInterface, PushInterface, PutInterface, SetInterface, UnionInterface, UnshiftInterface, WithInterface, AvgInterface, MaxInterface, MinInterface, SumInterface, CountInterface, CountByInterface, AtLeastOneElementInterface, HasSeveralElementsInterface, HasNoElementInterface, HasOneElementInterface, HasXElementsInterface, CloneInterface, CopyInterface, ExplodeInterface, FromInterface, FromJsonInterface, TreeInterface, DdInterface, DumpInterface, TapInterface, DelimiterInterface, GetIteratorInterface, JsonSerializeInterface, OffsetExistsInterface, OffsetGetInterface, OffsetSetInterface, OffsetUnsetInterface, SepInterface, ArsortInterface, AsortInterface, KrsortInterface, KsortInterface, OrderInterface, ReverseInterface, RsortInterface, ShuffleInterface, SortInterface, UasortInterface, UksortInterface, UsortInterface, AfterInterface, BeforeInterface, ClearInterface, DiffInterface, DiffAssocInterface, DiffKeysInterface, ExceptInterface, FilterInterface, GrepInterface, IntersectInterface, IntersectAssocInterface, IntersectKeysInterface, NthInterface, OnlyInterface, RejectInterface, RemoveInterface, SkipInterface, SliceInterface, TakeInterface, WhereInterface, CompareInterface, ContainsInterface, EachInterface, EmptyInterface, EqualsInterface, EveryInterface, HasInterface, IfInterface, IfAnyInterface, IfEmptyInterface, InInterface, IncludesInterface, IsInterface, IsEmptyInterface, IsNumericInterface, IsObjectInterface, IsScalarInterface, ImplementsInterface, NoneInterface, SomeInterface, StrContainsInterface, StrContainsAllInterface, StrEndsInterface, StrEndsAllInterface, StrStartsInterface, StrStartsAllInterface, StrBeforeInterface, CastInterface, ChunkInterface, ColInterface, CollapseInterface, CombineInterface, FlatInterface, FlipInterface, GroupByInterface, JoinInterface, LtrimInterface, MapInterface, PartitionInterface, PipeInterface, PluckInterface, PrefixInterface, ReduceInterface, RekeyInterface, ReplaceInterface, RtrimInterface, SpliceInterface, StrAfterInterface, StrLowerInterface, StrReplaceInterface, StrUpperInterface, SuffixInterface, ToJsonInterface, ToUrlInterface, TransposeInterface, TraverseInterface, TrimInterface, WalkInterface, ZipInterface, DuplicatesInterface
{
    use Add;
    use After;
    use All;
    use Arsort;
    use Asort;
    use At;
    use AtLeastOneElement;
    use Avg;
    use Before;
    use BoolTrait;
    use Call;
    use Cast;
    use Chunk;
    use Clear;
    use Clone_;
    use Col;
    use Collapse;
    use Combine;
    use Compare;
    use Concat;
    use Contains;
    use Copy;
    use Count;
    use CountBy;
    use Dd;
    use Delimiter;
    use Diff;
    use DiffAssoc;
    use DiffKeys;
    use Dump;
    use Duplicates;
    use Each;
    use Empty_;
    use Equals;
    use Every;
    use Except;
    use Explode;
    use Filter;
    use Find;
    use First;
    use FirstKey;
    use Flat;
    use Flip;
    use Float_;
    use From;
    use FromJson;
    use Get;
    use GetIterator;
    use Grep;
    use GroupBy;
    use Has;
    use HasNoElement;
    use HasOneElement;
    use HasSeveralElements;
    use HasXElements;
    use If_;
    use IfAny;
    use IfEmpty;
    use Implements_;
    use In;
    use Includes;
    use Index;
    use InsertAfter;
    use InsertAt;
    use InsertBefore;
    use Int_;
    use Intersect;
    use IntersectAssoc;
    use IntersectKeys;
    use Is;
    use IsEmpty;
    use IsNumeric;
    use IsObject;
    use IsScalar;
    use Join;
    use JsonSerialize;
    use Keys;
    use Krsort;
    use Ksort;
    use Last;
    use LastKey;
    use Ltrim;
    use Map;
    use Max;
    use Merge;
    use Min;
    use None;
    use Nth;
    use OffsetExists;
    use OffsetGet;
    use OffsetSet;
    use OffsetUnset;
    use Only;
    use Order;
    use Pad;
    use Partition;
    use Pipe;
    use Pluck;
    use Pop;
    use Pos;
    use Prefix;
    use Prepend;
    use Pull;
    use Push;
    use Put;
    use Random;
    use Reduce;
    use Reject;
    use Rekey;
    use Remove;
    use Replace;
    use Reverse;
    use Rsort;
    use Rtrim;
    use Search;
    use Sep;
    use Set;
    use Shift;
    use Shuffle;
    use Skip;
    use Slice;
    use Some;
    use Sort;
    use Splice;
    use StrAfter;
    use StrBefore;
    use StrContains;
    use StrContainsAll;
    use StrEnds;
    use StrEndsAll;
    use StringTrait;
    use StrLower;
    use StrReplace;
    use StrStarts;
    use StrStartsAll;
    use StrUpper;
    use Suffix;
    use Sum;
    use Take;
    use Tap;
    use ToArray;
    use ToJson;
    use ToUrl;
    use Transpose;
    use Traverse;
    use Tree;
    use Trim;
    use Uasort;
    use Uksort;
    use Union;
    use Unique;
    use Unshift;
    use Usort;
    use Values;
    use Walk;
    use Where;
    use With;
    use Zip;

    private function __construct(
        private AimeosMap $collection,
        private Bool_ $isReadOnly,
    ) {
    }

    /**
     * @param array<int|string, mixed>|Collection|AimeosMap|string|null $collection
     *
     * @api
     */
    public static function readOnly(Collection|AimeosMap|array|string|null $collection = []): self
    {
        return self::of($collection)
            ->asReadOnly()
        ;
    }

    /**
     * @api
     */
    public function asReadOnly(): self
    {
        return new self(
            collection: AimeosMap::from($this->collection),
            isReadOnly: Bool_::fromBool(true),
        );
    }

    /**
     * @param array<int|string, mixed>|Collection|AimeosMap|string|null $collection
     *
     * @api
     */
    public static function of(Collection|AimeosMap|array|string|null $collection = []): self
    {
        return match (true) {
            $collection instanceof Collection => $collection,
            is_string($collection) => new self(
                collection: AimeosMap::from([$collection]),
                isReadOnly: Bool_::fromBool(false),
            ),
            $collection instanceof AimeosMap => new self(
                collection: $collection,
                isReadOnly: Bool_::fromBool(false),
            ),
            default => new self(
                collection: AimeosMap::from($collection ?? []),
                isReadOnly: Bool_::fromBool(false),
            ),
        };
    }

    public function isReadOnly(): Bool_
    {
        return $this->isReadOnly;
    }
}
