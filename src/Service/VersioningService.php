<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\RequestStack;

Class VersioningService {
    private $requestStack = null;
    private $defaultVersion = null;

    /***
     * @params RequestStack $requestStack
     * @params ParameterBagInterface $params
     */
    public function __construct (ParameterBagInterface $params, RequestStack $request) {
        $this->requestStack = $request;
        $this->defaultVersion = $params->get('default_api_version');
    }

    public function getVersion(): string 
    {
        $version =$this->defaultVersion;

        $request = $this->requestStack->getCurrentRequest();
        $accept = $request->headers->get('Accept');

        $entete = explode(';', $accept);

        foreach ($entete as $value) {
            if (strpos($value, 'version') !== false) {
                $version = explode('=', $value);
                $version = $version[1];
            }
        }

        return $version;
    }
}