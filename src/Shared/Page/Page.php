<?php
declare(strict_types=1);
namespace Shared\Page;

abstract class Page
{
    abstract public function asString(): string;
}
