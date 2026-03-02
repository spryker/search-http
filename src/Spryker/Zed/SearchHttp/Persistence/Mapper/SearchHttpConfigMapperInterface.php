<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\SearchHttp\Persistence\Mapper;

use Generated\Shared\Transfer\SearchHttpConfigCollectionTransfer;
use Orm\Zed\SearchHttp\Persistence\SpySearchHttpConfig;

interface SearchHttpConfigMapperInterface
{
    public function mapSearchHttpConfigTransferCollectionToSearchHttpConfigEntity(
        SearchHttpConfigCollectionTransfer $searchHttpConfigCollectionTransfer,
        SpySearchHttpConfig $searchHttpConfigEntity
    ): SpySearchHttpConfig;

    public function mapSearchHttpConfigEntityToSearchHttpConfigCollection(
        SpySearchHttpConfig $searchHttpConfigEntity,
        SearchHttpConfigCollectionTransfer $searchHttpConfigCollectionTransfer
    ): SearchHttpConfigCollectionTransfer;
}
