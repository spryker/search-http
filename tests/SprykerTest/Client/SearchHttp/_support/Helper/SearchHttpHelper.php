<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Client\SearchHttp\Helper;

use Codeception\Module;
use Codeception\TestInterface;
use ReflectionClass;
use Spryker\Client\SearchHttp\Config\SearchConfigBuilder;

class SearchHttpHelper extends Module
{
    public function _after(TestInterface $test): void
    {
        $this->resetSearchConfigBuilderCache();
    }

    protected function resetSearchConfigBuilderCache(): void
    {
        $reflection = new ReflectionClass(SearchConfigBuilder::class);

        $isBuiltProperty = $reflection->getProperty('isSearchConfigBuilt');
        $isBuiltProperty->setAccessible(true);
        $isBuiltProperty->setValue(null, false);
    }
}
