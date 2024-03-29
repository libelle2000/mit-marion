<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\ValueObject;

use Shared\ValueObject\Base\BaseString;

final class CurrentPath extends BaseString
{
    public static function fromDirectory(string $dir): CurrentPath
    {
        return new CurrentPath(basename($dir));
    }

    public function asUrlPath(): string
    {
        return sprintf(
            '%s%s%s', DIRECTORY_SEPARATOR, $this->getValue(), DIRECTORY_SEPARATOR
        );
    }
}
