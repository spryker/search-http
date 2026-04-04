<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Client\SearchHttp\Api;

use Codeception\Test\Unit;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Client
 * @group SearchHttp
 * @group Api
 * @group SearchHttpApiClientTest
 * Add your own group annotations below this line
 */
class SearchHttpApiClientTest extends Unit
{
    /**
     * @var \SprykerTest\Client\SearchHttp\SearchHttpClientTester
     */
    protected $tester;

    public function testSearchHttpRequestSuccessfullySent(): void
    {
        // Arrange
        $this->tester->mockCustomerClientDependency();
        $this->tester->mockLocaleClientDependency();
        $this->tester->mockStoreClientDependency();
        $this->tester->mockSynchronizationServiceDependency();
        $this->tester->mockStorageClientDependency($this->tester::SEARCH_HTTP_CONFIG_DATA);
        $this->tester->mockUtilEncodingServiceDependency();
        $responseData = [['responseData']];
        $searchQuery = $this->tester->getSearchHttpQueryPlugin();
        $searchQuery = $this->tester->extendWithTestData($searchQuery);
        $this->tester->mockKernelAppClient('url', $this->tester::REQUEST_HEADERS + [
                'User-Agent' => sprintf('Spryker/%s', APPLICATION),
                'X-Forwarded-For' => 'ip',
            ], $searchQuery, $responseData);

        $this->tester->mockSearchHttpConfig('ip');

        // Act
        $response = $this->tester->getClient()->search($searchQuery);

        // Assert
        $this->assertEquals($responseData, $response);
    }

    public function testSearchHttpRequestReturnsEmptyArrayOnException(): void
    {
        // Arrange
        $searchQuery = $this->tester->getSearchHttpQueryPlugin();
        $searchQuery = $this->tester->extendWithTestData($searchQuery);
        $this->tester->mockCustomerClientDependency();
        $this->tester->mockStoreClientDependency();
        $this->tester->mockSynchronizationServiceDependency();
        $this->tester->mockStorageClientDependency($this->tester::SEARCH_HTTP_CONFIG_DATA);
        $this->tester->mockUtilEncodingServiceDependency();
        $responseData = ['wrong_response'];

        $this->tester->mockKernelAppClient('url', [], $searchQuery, $responseData);
        $this->tester->mockSearchHttpConfig('ip');

        $searchApiClient = $this->tester->getFactory()->createSearchApiClient();

        // Act
        $response = $searchApiClient->search($searchQuery);

        // Assert
        $this->assertEquals([], $response);
    }
}
