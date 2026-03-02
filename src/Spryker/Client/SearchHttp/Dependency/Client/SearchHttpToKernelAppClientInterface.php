<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\SearchHttp\Dependency\Client;

use Generated\Shared\Transfer\AcpHttpRequestTransfer;
use Generated\Shared\Transfer\AcpHttpResponseTransfer;

interface SearchHttpToKernelAppClientInterface
{
    public function request(AcpHttpRequestTransfer $acpHttpRequestTransfer): AcpHttpResponseTransfer;
}
