<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Client\SearchHttp\Mapper;

use Generated\Shared\Transfer\SearchHttpConfigCollectionTransfer;

class ConfigMapper implements ConfigMapperInterface
{
    /**
     * @param array<string, mixed> $searchHttpConfig
     * @param \Generated\Shared\Transfer\SearchHttpConfigCollectionTransfer $searchHttpConfigCollectionTransfer
     *
     * @return \Generated\Shared\Transfer\SearchHttpConfigCollectionTransfer
     */
    public function mapSearchConfigToSearchHttpConfigCollectionTransfer(
        array $searchHttpConfig,
        SearchHttpConfigCollectionTransfer $searchHttpConfigCollectionTransfer
    ): SearchHttpConfigCollectionTransfer {
        return $searchHttpConfigCollectionTransfer->fromArray($searchHttpConfig, true);
    }
}
