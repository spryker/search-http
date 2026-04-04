<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Client\SearchHttp;

use Codeception\Test\Unit;
use Generated\Shared\DataBuilder\ProductConcretePageSearchBuilder;
use Generated\Shared\DataBuilder\SuggestionsSearchHttpResponseBuilder;
use Generated\Shared\Transfer\SuggestionsSearchHttpResponseTransfer;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Client
 * @group SearchHttp
 * @group SearchHttpClientTest
 * Add your own group annotations below this line
 */
class SearchHttpClientTest extends Unit
{
    /**
     * @var \SprykerTest\Client\SearchHttp\SearchHttpClientTester
     */
    protected $tester;

    public function testSearchSuccessfullyReturnSearchResult(): void
    {
        // Arrange
        $searchQuery = $this->tester->getSearchHttpQueryPlugin();
        $searchQuery = $this->tester->extendWithTestData($searchQuery);
        $this->tester->mockLocaleClientDependency();
        $this->tester->mockStoreClientDependency();
        $this->tester->mockSynchronizationServiceDependency();
        $this->tester->mockStorageClientDependency($this->tester::SEARCH_HTTP_CONFIG_DATA);
        $this->tester->mockUtilEncodingServiceDependency();

        $this->tester->mockKernelAppClient('url', $this->tester::REQUEST_HEADERS + [
                'User-Agent' => sprintf('Spryker/%s', APPLICATION),
                'X-Forwarded-For' => 'ip',
            ], $searchQuery, []);

        $searchQuery = $this->tester->getSearchHttpQueryPlugin();
        $this->tester->mockSearchHttpConfig('ip');

        // Act
        $this->tester->getClient()->search($searchQuery);
    }

    public function testFormatProductConcreteCatalogHttpSearchResultFormatsTheGivenDataSuccessfully(): void
    {
        // Arrange
        $productAbstractSku = 'abstract-sku';
        $productConcretePageSearchTransfer = (new ProductConcretePageSearchBuilder())->build();

        $suggestionsSearchHttpResponseTransfer = (new SuggestionsSearchHttpResponseBuilder([
            SuggestionsSearchHttpResponseTransfer::MATCHED_ITEMS => [
                [
                    'product_abstract_sku' => $productAbstractSku,
                ] + $productConcretePageSearchTransfer->toArray(),
            ],
        ]))->build();

        $productConcretePageSearchTransfer->setAbstractSku($productAbstractSku);

        // Act
        $formattedSearchResults = $this->tester->getClient()
            ->formatProductConcreteCatalogHttpSearchResult($suggestionsSearchHttpResponseTransfer);

        // Assert
        $this->assertSame($productConcretePageSearchTransfer->toArray(), $formattedSearchResults[0]->toArray());
    }

    public function testFindSearchResultTotalCountReturnsCountOnCorrectSearchHttpResult(): void
    {
        // Arrange
        $totalCount = 10;
        $searchResult = [
            'pagination' => [
                'num_found' => $totalCount,
            ],
        ];

        // Act
        $foundTotalCount = $this->tester->getClient()
            ->findSearchResultTotalCount($searchResult);

        // Assert
        $this->assertSame($totalCount, $foundTotalCount);
    }

    /**
     * @dataProvider incorrectSearchResultDataProvider
     *
     * @param mixed $searchResult
     *
     * @return void
     */
    public function testFindSearchResultTotalCountReturnsNullOnIncorrectSearchHttpResult($searchResult): void
    {
        // Act
        $foundTotalCount = $this->tester->getClient()
            ->findSearchResultTotalCount($searchResult);

        // Assert
        $this->assertNull($foundTotalCount);
    }

    /**
     * @return array<string, list<mixed>>
     */
    public function incorrectSearchResultDataProvider(): array
    {
        return [
            'empty array' => [[]],
            'object' => [(object)[]],
            'incorrect array' => [['pagination' => []]],
            'object with pagination' => [(object)['pagination' => ['num_found' => 1]]],
        ];
    }
}
