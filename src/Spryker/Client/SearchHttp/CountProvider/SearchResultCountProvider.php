<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\SearchHttp\CountProvider;

use Spryker\Client\SearchHttp\Plugin\Catalog\ResultFormatter\PaginationSearchHttpResultFormatterPlugin;

class SearchResultCountProvider implements SearchResultCountProviderInterface
{
    /**
     * @param mixed $searchResult
     *
     * @return int|null
     */
    public function findSearchResultTotalCount($searchResult): ?int
    {
        if (!is_array($searchResult)) {
            return null;
        }

        if (!isset($searchResult[PaginationSearchHttpResultFormatterPlugin::NAME])) {
            return null;
        }

        $paginationResult = $searchResult[PaginationSearchHttpResultFormatterPlugin::NAME];

        if (is_array($paginationResult)) {
            return $paginationResult['num_found'] ?? null;
        }

        if (!is_object($paginationResult)) {
            return null;
        }

        if (!method_exists($paginationResult, 'getNumFound')) {
            return null;
        }

        return $paginationResult->getNumFound();
    }
}
