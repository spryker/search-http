<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\SearchHttp\Persistence;

use Generated\Shared\Transfer\SearchHttpConfigCriteriaTransfer;
use Propel\Runtime\Collection\ObjectCollection;

interface SearchHttpRepositoryInterface
{
    public function getFilteredSearchHttpEntityTransfers(
        SearchHttpConfigCriteriaTransfer $searchHttpConfigCriteriaTransfer
    ): ObjectCollection;
}
