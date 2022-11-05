<?php

namespace Rolecode\PhpMinimax\Services;

use GuzzleHttp\Exception\ClientException;
use Rolecode\PhpMinimax\Models\Customer;
use Rolecode\PhpMinimax\Models\Item;
use Rolecode\PhpMinimax\Services\Requests\AllRequestService;
use Rolecode\PhpMinimax\Services\Requests\CreateRecordRequest;
use Rolecode\PhpMinimax\Services\Requests\DeleteRecordRequest;
use Rolecode\PhpMinimax\Services\Requests\RetrieveRequestService;
use Rolecode\PhpMinimax\Services\Requests\UpdateRecordRequest;

class ItemService extends CoreServiceFactory
{

    /**
     * Retrieve all records.
     *
     * @param array $parameters Parameters are passed to request.
     *
     * @throws ClientException if the request fails
     * @return Item[]
     */
    public function all( $parameters = [] )
    {
        $records = AllRequestService::all( $this->getClient(), "items", Item::class, $parameters );

        return $records;
    }

    /**
     * Retrieve record by id.
     *
     * @param int $id
     *
     * @throws ClientException if the request fails
     *
     * @return Item
     */
    public function retrieveById( $id )
    {
        $record = RetrieveRequestService::retrieveById( $this->getClient(), "items", Item::class, $id );

        return $record;
    }

    /**
     * Retrieve record by code.
     *
     * @param string $code
     *
     * @throws ClientException if the request fails
     *
     * @return Item
     */
    public function retrieveByCode( $code )
    {
        $record = RetrieveRequestService::retrieveByCode( $this->getClient(), "items", Item::class, $code );

        return $record;
    }

    /**
     * Create record.
     *
     * @param Item $object
     * @param array $options
     *
     * @throws ClientException if the request fails
     *
     * @return Item
     */
    public function create( $object, $options = [] )
    {
        // Check if item by column Code exists.
        $record = RetrieveExistingRecord::retrieve( $object->Code, $this->getClient(), "items", get_class($object) );


        // Check if item by column Name exists.
        if( empty($record) && isset($options["use_existing_record_by_name"]) ){
            $record = RetrieveExistingRecord::retrieve( $object->Name, $this->getClient(), "items", get_class($object), true );
        }


        // Create record if there is no existing record.
        if( empty($record) )
        {
            $record = CreateRecordRequest::create( $this->getClient(), "items", $object );
        }


        return $record;
    }


    /**
     * Update record.
     *
     * @param Item $object
     *
     * @throws ClientException if the request fails
     *
     * @return Item
     */
    public function update( $object )
    {
        $id = $object->ItemId;
        $record = UpdateRecordRequest::update( $this->getClient(), "items", $object, $id );

        return $record;
    }


    /**
     * Delete record.
     *
     * @param Item $object
     * @param array $options
     *
     * @throws ClientException if the request fails
     *
     * @return void
     */
    public function delete( $id, $options = [] )
    {
        // If item cannot be deleted, because its in use, show error.
        if( isset( $options["show_error_for_used_items"] ) ){
            if( $options["show_error_for_used_items"] ){
                DeleteRecordRequest::delete( $this->getClient(), "items", $id );
                return;
            }
        }

        // Dont show error.
        try {
            DeleteRecordRequest::delete( $this->getClient(), "items", $id );
        }
        catch( ClientException $e){
            // do nothing.
        }
    }
}
