<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\SearchHttp\Config;

use Generated\Shared\Transfer\PaginationConfigTransfer;

interface PaginationConfigInterface
{
    public function setPagination(PaginationConfigTransfer $paginationConfigTransfer): void;

    public function getPagination(): PaginationConfigTransfer;

    /**
     * @param array<string, mixed> $requestParameters
     *
     * @return int
     */
    public function getCurrentPage(array $requestParameters): int;

    /**
     * @param array<string, mixed> $requestParameters
     *
     * @return int
     */
    public function getCurrentItemsPerPage(array $requestParameters): int;
}
