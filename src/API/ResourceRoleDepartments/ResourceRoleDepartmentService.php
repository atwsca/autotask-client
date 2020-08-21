<?php

namespace Anteris\Autotask\API\ResourceRoleDepartments;

use Anteris\Autotask\HttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ResourceRoleDepartments.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ResourceRoleDepartmentsEntity.htm Autotask documentation.
 */
class ResourceRoleDepartmentService
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
     * Creates a new resourceroledepartment.
     *
     * @param  ResourceRoleDepartmentEntity  $resource  The resourceroledepartment entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ResourceRoleDepartmentEntity $resource): Response
    {
        $resourceID = $resource->resourceID;
        return $this->client->post("Resources/$resourceID/RoleDepartments", $resource->toArray());
    }

    /**
     * Finds the ResourceRoleDepartment based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): ResourceRoleDepartmentEntity
    {
        return ResourceRoleDepartmentEntity::fromResponse(
            $this->client->get("ResourceRoleDepartments/$id")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ResourceRoleDepartmentQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): ResourceRoleDepartmentQueryBuilder
    {
        return new ResourceRoleDepartmentQueryBuilder($this->client);
    }

    /**
     * Updates the resourceroledepartment.
     *
     * @param  ResourceRoleDepartmentEntity  $resource  The resourceroledepartment entity to be updated.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function update(ResourceRoleDepartmentEntity $resource): Response
    {
        $resourceID = $resource->resourceID;
        return $this->client->put("Resources/$resourceID/RoleDepartments", $resource->toArray());
    }
}
