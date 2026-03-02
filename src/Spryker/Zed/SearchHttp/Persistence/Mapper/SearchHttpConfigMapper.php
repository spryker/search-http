<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\SearchHttp\Persistence\Mapper;

use Generated\Shared\Transfer\SearchHttpConfigCollectionTransfer;
use Orm\Zed\SearchHttp\Persistence\SpySearchHttpConfig;

class SearchHttpConfigMapper implements SearchHttpConfigMapperInterface
{
    public function mapSearchHttpConfigTransferCollectionToSearchHttpConfigEntity(
        SearchHttpConfigCollectionTransfer $searchHttpConfigCollectionTransfer,
        SpySearchHttpConfig $searchHttpConfigEntity
    ): SpySearchHttpConfig {
        return $searchHttpConfigEntity->setData($searchHttpConfigCollectionTransfer->toArray());
    }

    public function mapSearchHttpConfigEntityToSearchHttpConfigCollection(
        SpySearchHttpConfig $searchHttpConfigEntity,
        SearchHttpConfigCollectionTransfer $searchHttpConfigCollectionTransfer
    ): SearchHttpConfigCollectionTransfer {
        return $searchHttpConfigCollectionTransfer->fromArray($searchHttpConfigEntity->getData(), true);
    }
}
