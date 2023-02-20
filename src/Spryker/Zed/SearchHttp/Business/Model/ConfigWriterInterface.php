<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\SearchHttp\Business\Model;

use Generated\Shared\Transfer\SearchHttpConfigTransfer;

interface ConfigWriterInterface
{
    /**
     * @param \Generated\Shared\Transfer\SearchHttpConfigTransfer $searchHttpConfigTransfer
     * @param string $storeReference
     *
     * @return void
     */
    public function write(SearchHttpConfigTransfer $searchHttpConfigTransfer, string $storeReference): void;
}
