<?php

namespace Rolecode\PhpMinimax\Services;

use JsonMapper;

class JsonMapperService
{
    /**
     * Map json to object.
     *
     * @param string $json
     * @param string $className
     * @param bool $isJsonDecoded Is json already decoded to array?
     *
     * @return mixed
     */
    public static function mapSingle($json, $className, $isJsonDecoded = false)
    {
        $object = self::map($json, $className, $isJsonDecoded);

        return $object;
    }

    /**
     * Map json to objects
     *
     * @param string $json
     * @param string $className
     * @param bool $isJsonDecoded Is json already decoded to array?
     *
     * @return mixed
     */
    public static function mapArray($json, $className, $isJsonDecoded = false)
    {
        $objects = self::map($json, $className, $isJsonDecoded, true);

        return $objects;
    }

    /**
     * Map json to single or multiple objects.
     *
     * @param string $json
     * @param string $className
     * @param bool $isJsonDecoded Is json already decoded to array?
     * @param bool $isArray Is array of objects?
     *
     * @return mixed
     */
    private static function map($json, $className, $isJsonDecoded = false, $isArray = false)
    {
        $mapper = new JsonMapper();
        // Must be set to false or it won't allow null values and throw error.
        $mapper->bStrictNullTypes = false;

        // Decode json to array.
        if(!$isJsonDecoded)
            $json = json_decode($json);

        // Convert json array to objects.
        if($isArray){
            // Not working, why?
//            $result = $mapper->mapArray($json, array(), new $className());

            // Alternative solution.
            $result = [];
            foreach($json as $row){
                $result[] = $mapper->map($row, new $className());
            }
        }
        else
            $result = $mapper->map($json, new $className());


        return $result;
    }
}
