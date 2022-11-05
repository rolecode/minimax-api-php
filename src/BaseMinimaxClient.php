<?php

namespace Rolecode\PhpMinimax;

use Rolecode\PhpMinimax\Models\Token;
use Rolecode\PhpMinimax\Services\TokenRetrieveService;

abstract class BaseMinimaxClient
{
    /**
     * Api base url.
     *
     * @var string
     */
    public const BASE_URL = "https://moj.minimax.si/SI/";


    /**
     * Endpoint for retrieving auth token.
     *
     * @var string
     */
    public const API_TOKEN_ENDPOINT = self::BASE_URL . "AUT/oauth20/token/";


    /**
     * Endpoint for retrieving user organisations.
     *
     * @var string
     */
    public const API_ORGANISATIONS_ENDPOINT = self::BASE_URL . "API/api/currentuser/orgs/";


    /**
     * Api url; is used for most requests except when retrieving token.
     *
     * @var string
     */
    public const API_URL = self::BASE_URL . "API/api/orgs/";


    /**
     * Data about retrieved token.
     *
     * @var Token
     */
    private $token;


    /**
     * Organisation id.
     *
     * @var int
     */
    private $organisationId;

    /**
     * Create instance of minimax client.
     *
     * @param string $clientId
     * @param string $clientSecret
     * @param string $username
     * @param string $password
     *
     * @return void
     */
    public function __construct(string $clientId, string $clientSecret, string $username, string $password)
    {
        // Retrieve token.
        $token = TokenRetrieveService::retrieve($clientId, $clientSecret, $username, $password);
        $this->token = $token;

        // TODO Possible upgrade is to cache token for later use. Only retrieve new token, when old one is not valid anymore.
    }

    /** @return Token */
    public function getToken()
    {
        return $this->token;
    }

    /**
     *
     *
     * @param int $id
     *
     * @return int
     */
    public function setOrganisationId( $id )
    {
        $this->organisationId = $id;
    }

    /** @return int */
    public function getOrganisationId()
    {
        return $this->organisationId;
    }
}
