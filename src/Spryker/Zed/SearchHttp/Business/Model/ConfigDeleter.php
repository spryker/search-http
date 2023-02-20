<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\SearchHttp\Business\Model;

use Spryker\Zed\SearchHttp\Dependency\Facade\SearchHttpToStoreFacadeInterface;
use Spryker\Zed\SearchHttp\Persistence\SearchHttpEntityManagerInterface;

class ConfigDeleter implements ConfigDeleterInterface
{
    /**
     * @var \Spryker\Zed\SearchHttp\Persistence\SearchHttpEntityManagerInterface
     */
    protected SearchHttpEntityManagerInterface $searchHttpEntityManager;

    /**
     * @var \Spryker\Zed\SearchHttp\Dependency\Facade\SearchHttpToStoreFacadeInterface
     */
    protected SearchHttpToStoreFacadeInterface $storeFacade;

    /**
     * @param \Spryker\Zed\SearchHttp\Persistence\SearchHttpEntityManagerInterface $searchHttpEntityManager
     * @param \Spryker\Zed\SearchHttp\Dependency\Facade\SearchHttpToStoreFacadeInterface $storeFacade
     */
    public function __construct(
        SearchHttpEntityManagerInterface $searchHttpEntityManager,
        SearchHttpToStoreFacadeInterface $storeFacade
    ) {
        $this->searchHttpEntityManager = $searchHttpEntityManager;
        $this->storeFacade = $storeFacade;
    }

    /**
     * @param string $storeReference
     * @param string $applicationId
     *
     * @return void
     */
    public function delete(string $storeReference, string $applicationId): void
    {
        $storeTransfer = $this->storeFacade->getStoreByStoreReference($storeReference);

        $this->searchHttpEntityManager->deleteSearchHttpConfig($storeTransfer, $applicationId);
    }
}
