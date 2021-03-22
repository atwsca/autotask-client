<?php

namespace Anteris\Autotask\API\ContractServiceBundleAdjustments;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask ContractServiceBundleAdjustments.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/ContractServiceBundleAdjustmentsEntity.htm Autotask documentation.
 */
class ContractServiceBundleAdjustmentService
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
     * Creates a new contractservicebundleadjustment.
     *
     * @param  ContractServiceBundleAdjustmentEntity  $resource  The contractservicebundleadjustment entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(ContractServiceBundleAdjustmentEntity $resource): Response
    {
        $contractID = $resource->contractID;
        return $this->client->post("Contracts/$contractID/ServiceBundleAdjustments", $resource->toArray());
    }

    /**
     * Finds the ContractServiceBundleAdjustment based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Jonathan Halls <jonathan.halls@atws.ca>
     */
    public function findById(int $id): ContractServiceBundleAdjustmentEntity
    {
        return ContractServiceBundleAdjustmentEntity::fromResponse(
            $this->client->get("ContractServiceBundleAdjustments/$id")
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
            $this->client->get("ContractServiceBundleAdjustments/entityInformation/fields")
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
            $this->client->get("ContractServiceBundleAdjustments/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see ContractServiceBundleAdjustmentQueryBuilder The query builder class.
     *
     * @author Jonathan Halls <jonathan.halls@atws.ca>
     */
    public function query(): ContractServiceBundleAdjustmentQueryBuilder
    {
        return new ContractServiceBundleAdjustmentQueryBuilder($this->client);
    }

    /**
     * Updates the contract.
     *
     * @param  ContractServiceBundleAdjustmentEntity  $resource  The contract entity to be updated.
     *
     * @author Jonathan Halls <jonathan.halls@atws.ca>
     */
    public function update(ContractServiceBundleAdjustmentEntity $resource): Response
    {
        return $this->client->put("ContractServiceBundleAdjustments", $resource->toArray());
    }
}
