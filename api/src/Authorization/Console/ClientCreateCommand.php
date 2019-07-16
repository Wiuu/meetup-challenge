<?php

namespace App\Authorization\Console;

use FOS\OAuthServerBundle\Entity\ClientManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpFoundation\Request;

class ClientCreateCommand extends ContainerAwareCommand

{

    /**
     * @var ClientManager
     */
    private $clientManager;

    protected function configure()
    {

        $this
            ->setName('oauth:client:create')
            ->setDescription('Creates a new client')
            ->addOption('redirect-uri', null, InputOption::VALUE_REQUIRED | InputOption::VALUE_OPTIONAL, 'Sets the redirect uri. Use multiple times to set multiple uris.', [])
            ->addOption('grant-type', null, InputOption::VALUE_REQUIRED | InputOption::VALUE_OPTIONAL, 'Set allowed grant type. Use multiple times to set multiple grant types', 'client_credentials')
        ;
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $this->clientManager = $this->getContainer()->get('fos_oauth_server.client_manager.default'); ;
        $client = $this->clientManager->createClient();
        $client->setRedirectUris($input->getOption('redirect-uri'));
        $client->setAllowedGrantTypes([$input->getOption('grant-type')]);
        $this->clientManager->updateClient($client);


        $url = urldecode("http://127.0.0.1:8080/oauth/v2/token?client_id=".$client->getPublicId()."&client_secret=".$client->getSecret()."&grant_type=client_credentials");

        $httpClient = new CurlHttpClient();
        $response = $httpClient->request('GET', $url);

        $responseJson = (array) json_decode($response->getContent());

        $output->writeln(sprintf('"Bearer <info>%s</info>"', $responseJson['access_token']));
    }
}