
<?php



class IdentityMap
{
    private $map = [];

    public function get(int $id)
    {
        return $this->map[$id] ?? null;
    }

    public function add($object)
    {
        $this->map[$object->getId()] = $object;
    }
}
