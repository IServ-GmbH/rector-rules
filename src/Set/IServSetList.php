<?php

declare(strict_types=1);

namespace IServ\Library\RectorRules\Set;

use Rector\Set\Contract\SetListInterface;

final class IServSetList implements SetListInterface
{
    public const ADMIN = __DIR__ . '/../../config/sets/iserv/admin.php';
    public const CORE = __DIR__ . '/../../config/sets/iserv/core.php';
}
