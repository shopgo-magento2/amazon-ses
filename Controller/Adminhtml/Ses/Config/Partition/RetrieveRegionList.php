<?php
/**
 * Copyright © 2016 ShopGo. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace ShopGo\AmazonSes\Controller\Adminhtml\Ses\Config\Partition;

class RetrieveRegionList extends \ShopGo\Aws\Controller\Adminhtml\Config\Partition\RetrieveRegionList
{
    /**
     * Check the permission to run it
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('ShopGo_AmazonSes::config_amazon_ses');
    }
}
