<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\ValueObject;

use Shared\BaseValueObject\BaseString;

final class CurrentPath extends BaseString
{
    public static function fromDirectory(string $dir): CurrentPath
    {
        return new static(basename($dir));
    }

    public function asUrlPath(): string
    {
        return sprintf(
            '%s%s%s', DIRECTORY_SEPARATOR, $this->getValue(), DIRECTORY_SEPARATOR
        );
    }
}
