<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Client\SearchHttp\Transformer\Factory;

use Generated\Shared\Transfer\FacetConfigTransfer;
use Spryker\Client\SearchExtension\Dependency\Plugin\FacetSearchResultValueTransformerPluginInterface;
use Spryker\Client\SearchHttp\Exception\InvalidFacetSearchResultValueTransformerPluginException;

class FacetValueTransformerFactory implements FacetValueTransformerFactoryInterface
{
    /**
     * @param \Generated\Shared\Transfer\FacetConfigTransfer $facetConfigTransfer
     *
     * @throws \Spryker\Client\SearchHttp\Exception\InvalidFacetSearchResultValueTransformerPluginException
     *
     * @return \Spryker\Client\SearchExtension\Dependency\Plugin\FacetSearchResultValueTransformerPluginInterface|null
     */
    public function createTransformer(FacetConfigTransfer $facetConfigTransfer): ?FacetSearchResultValueTransformerPluginInterface
    {
        $pluginClassName = $facetConfigTransfer->getValueTransformer();
        if (!$pluginClassName) {
            return null;
        }

        $valueTransformerPlugin = new $pluginClassName();

        if (!$valueTransformerPlugin instanceof FacetSearchResultValueTransformerPluginInterface) {
            throw new InvalidFacetSearchResultValueTransformerPluginException(sprintf(
                'Class of "%s" is not a valid implementation of expected %s.',
                $pluginClassName,
                FacetSearchResultValueTransformerPluginInterface::class,
            ));
        }

        return $valueTransformerPlugin;
    }
}
