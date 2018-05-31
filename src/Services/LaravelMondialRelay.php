<?php namespace QuentinBontemps\LaravelMondialRelay\Services;

use MondialRelay\ApiClient;


/**
 * Class LaravelMondialRelay
 * @package QuentinBontemps\LaravelMondialRelay\Services
 */
class LaravelMondialRelay
{

    /**
     * Create a MondialRelay API Client
     *
     * @param array $options
     * @return \MondialRelay\ApiClient
     */
    public function client($options = [])
    {
        $site_id = config('laravel-mondialrelay.site_id');
        $site_key = config('laravel-mondialrelay.site_key');
        $environment = config('laravel-mondialrelay.environment');

        /**
         * Si version de démo, on active les traces pour pouvoir débugger plus facilement
         */
        if ($environment == 'demo')
        {
            if ( ! array_key_exists('trace', $options))
            {
                $options['trace'] = true;
            }
            if ( ! array_key_exists('exceptions', $options))
            {
                $options['exceptions'] = true;
            }
        }

        $client = new \SoapClient(config('laravel-mondialrelay.wsdl'), $options);


        return new ApiClient($client, $site_id, $site_key);
    }
}