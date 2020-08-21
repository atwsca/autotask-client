<?php

namespace Anteris\Autotask\API\ResourceRoles;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ResourceRoles.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ResourceRolesEntity.htm Autotask documentation.
 */
class ResourceRoleService
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
     * Finds the ResourceRole based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ResourceRoleEntity
    {
        return ResourceRoleEntity::fromResponse(
            $this->client->get("ResourceRoles/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ResourceRoleQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ResourceRoleQueryBuilder
    {
        return new ResourceRoleQueryBuilder($this->client);
    }

}
