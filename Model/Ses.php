<?php
/**
 * Copyright © 2016 ShopGo. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace ShopGo\AmazonSes\Model;

use Aws\Ses\SesClient;

/**
 * SES model
 */
class Ses
{
    /**
     * SES TXT record name prefix
     */
    const TXT_RECORD_NAME_PREFIX = '_amazonses.';

    /**
     * SES CNAME record name suffix
     */
    const CNAME_RECORD_NAME_SUFFIX = '._domainkey.';

    /**
     * SES CNAME record value suffix
     */
    const CNAME_RECORD_VALUE_SUFFIX = '.dkim.amazonses.com';

    /**
     * Verification token
     */
    const VERIFICATION_TOKEN = 'VerificationToken';

    /**
     * DKIM tokens
     */
    const DKIM_TOKENS = 'DkimTokens';

    /**
     * @var SesClient
     */
    protected $client;

    /**
     * @var \ShopGo\AmazonSes\Helper\Data
     */
    protected $helper;

    /**
     * @param \ShopGo\AmazonSes\Helper\Data $helper
     */
    public function __construct(
        \ShopGo\AmazonSes\Helper\Data $helper
    ) {
        $this->helper = $helper;
    }

    /**
     * Get helper
     *
     * @return \ShopGo\AmazonSes\Helper\Data
     */
    public function getHelper()
    {
        return $this->helper;
    }

    /**
     * Get SES Client
     *
     * @return SesClient
     */
    public function getClient()
    {
        if (!$this->client) {
            $this->client = SesClient::factory($this->helper->getAwsClientConfig());
        }

        return $this->client;
    }

    /**
     * Verify email identity
     *
     * @param string $email
     * @return array
     */
    public function verifyEmailIdentity($email)
    {
        $result = $this->getClient()->verifyEmailIdentity([
            'EmailAddress' => $email
        ]);

        return $result;
    }

    /**
     * Verify domain identity
     *
     * @param string $domain
     * @return array
     */
    public function verifyDomainIdentity($domain)
    {
        $result = $this->getClient()->verifyDomainIdentity([
            'Domain' => $domain
        ]);

        return $result;
    }

    /**
     * Verify domain DKIM
     *
     * @param string $domain
     * @return array
     */
    public function verifyDomainDkim($domain)
    {
        $result = $this->getClient()->verifyDomainDkim([
            'Domain' => $domain
        ]);

        return $result;
    }
}
