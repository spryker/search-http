<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\SearchHttp\Reader;

use Generated\Shared\Transfer\SearchHttpConfigCollectionTransfer;
use Generated\Shared\Transfer\SearchHttpConfigCriteriaTransfer;
use Generated\Shared\Transfer\SearchHttpConfigTransfer;

interface ConfigReaderInterface
{
    public function getSearchHttpConfigCollectionForCurrentStore(): SearchHttpConfigCollectionTransfer;

    public function findSearchConfig(SearchHttpConfigCriteriaTransfer $searchHttpConfigCriteria): ?SearchHttpConfigTransfer;
}
