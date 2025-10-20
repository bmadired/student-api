<?php
namespace App\Models;

use MongoDB\Client;

class MongoModel
{
    private $db;
    private $collection;

    public function __construct($collection)
    {
        $client = new Client(getenv('MONGO_URI'));
        $this->db = $client->selectDatabase(getenv('MONGO_DB'));
        $this->collection = $this->db->$collection;
    }

    public function getAll()
    {
        return $this->collection->find()->toArray();
    }

    public function insert($data)
    {
        return $this->collection->insertOne($data);
    }

    public function delete($id)
    {
        $objectId = new \MongoDB\BSON\ObjectId($id);
        return $this->collection->deleteOne(['_id' => $objectId]);
    }
}
