<?php

namespace Anteris\Autotask\API\Companies;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask Companies.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/CompaniesEntity.htm Autotask documentation.
 */
class CompanyService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;

    /**
     * Instantiates the class.
     *
     * @param  HttpClient  $client  The http client that will be used to interact with the API.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new company.
     *
     * @param  CompanyEntity  $resource  The company entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(CompanyEntity $resource): Response
    {
        return $this->client->post("Companies", $resource->toArray());
    }

    /**
     * Finds the Company based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): CompanyEntity
    {
        return CompanyEntity::fromResponse(
            $this->client->get("Companies/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see CompanyQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): CompanyQueryBuilder
    {
        return new CompanyQueryBuilder($this->client);
    }

    /**
     * Updates the company.
     *
     * @param  CompanyEntity  $resource  The company entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(CompanyEntity $resource): Response
    {
        return $this->client->put("Companies", $resource->toArray());
    }
}
