<?php

namespace thoulah\httpclient;

use yii\httpclient\CurlTransport;
use yii\httpclient\Request;
use yii\httpclient\Response;

/**
 * Client provide high level interface for HTTP requests execution.
 */
class Client extends \yii\httpclient\Client
{
    /** @var string Name of the app */
    public $appName = 'Thoulah/yii2-httpclient';

    /** @var string URL of the app */
    public $appUrl = 'https://github.com/Thoulah/yii2-httpclient';

    /**
     * Construct.
     *
     * @param string $defaults Base URL
     * @param array $options  Options
     */
    public function __construct(string $baseUrl = '', array $config = [])
    {
        $this->baseUrl = $baseUrl;
        $this->appName = $config['appName'] ?? $this->appName;
        $this->appUrl = $config['appUrl'] ?? $this->appUrl;
    }

    /**
     * Saves a file to a string.
     *
     * @param string $url Relative URL from base
     * @param array $data Optional request parameters
     * @return Response Object
     */
    public function getFile(string $url, array $data = []): Response
    {
        $this->transport = CurlTransport::class;
        return $this->getRequest($url, $data)->send();
    }

    /**
     * Retrieve an URL.
     *
     * @return Response Object
     */
    public function getUrl(string $url, array $data = []): Response
    {
        return $this->getRequest($url, $data)->send();
    }

    /**
     * Saves a file to a file.
     *
     * @param string $url Relative URL from base
     * @param string $file Filename o save
     * @param array $data Optional request parameters
     * @return bool
     */
    public function saveFile(string $url, string $file, array $data = []): bool
    {
        $this->transport = CurlTransport::class;
        $fh = fopen($file, 'w');
        $response = $this->getRequest($url, $data)
            ->setOutputFile($fh)
            ->send();
        fclose($fh);
        return $response->getIsOk();
    }

    /**
     * Private function to do the request.
     *
     * @param string $url Relative URL from base
     * @param array $data Optional request parameters
     * @return Request Object
     */
    private function getRequest(string $url, array $data = []): Request
    {
        return $this->createRequest()
            ->addHeaders(['user-agent' => $this->appName . ' (+' . $this->appUrl . ')'])
            ->setData($data)
            ->setUrl($url);
    }
}
