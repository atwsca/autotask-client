<?php

namespace Anteris\Autotask\API\ContractServiceAdjustments;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ContractServiceAdjustments.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractServiceAdjustmentsEntity.htm Autotask documentation.
 */
class ContractServiceAdjustmentService
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
     * Creates a new contractserviceadjustment.
     *
     * @param  ContractServiceAdjustmentEntity  $resource  The contractserviceadjustment entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractServiceAdjustmentEntity $resource): Response
    {
        $contractID = $resource->contractID;
        return $this->client->post("Contracts/$contractID/ServiceAdjustments", $resource->toArray());
    }

    /**
     * Finds the ContractServiceAdjustment based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Jonathan Halls <jonathan.halls@atws.ca>
     */
    public function findById(int $id): ContractServiceAdjustmentEntity
    {
        return ContractServiceAdjustmentEntity::fromResponse(
            $this->client->get("ContractServiceAdjustments/$id")
        );
    }

    /**
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("ContractServiceAdjustments/entityInformation/fields")
        );
    }

    /**
     * Returns information about what actions can be made against an entity.
     *
     * @see EntityInformationEntity
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityInformation(): EntityInformationEntity
    {
        return EntityInformationEntity::fromResponse(
            $this->client->get("ContractServiceAdjustments/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractServiceAdjustmentQueryBuilder The query builder class.
     *
     * @author Jonathan Halls <jonathan.halls@atws.ca>
     */
    public function query(): ContractServiceAdjustmentQueryBuilder
    {
        return new ContractServiceAdjustmentQueryBuilder($this->client);
    }

    /**
     * Updates the contract.
     *
     * @param  ContractServiceAdjustmentEntity  $resource  The contract entity to be updated.
     *
     * @author Jonathan Halls <jonathan.halls@atws.ca>
     */
    public function update(ContractServiceAdjustmentEntity $resource): Response
    {
        return $this->client->put("ContractServiceAdjustments", $resource->toArray());
    }
}
