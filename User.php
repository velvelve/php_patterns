<?php

declare(strict_types=1);

namespace Model\Repository;

use Model\Entity;

class User
{
    private array $identityMap = [];

    public function getById(int $id): ?Entity\User
    {
        // Check if the entity has already been loaded
        if (isset($this->identityMap[$id])) {
            return $this->identityMap[$id];
        }

        foreach ($this->getDataFromSource(['id' => $id]) as $user) {
            $entity = $this->createUser($user);

            // Add the entity to the identity map
            $this->identityMap[$id] = $entity;

            return $entity;
        }

        return null;
    }

    public function getByLogin(string $login): ?Entity\User
    {
        foreach ($this->getDataFromSource(['login' => $login]) as $user) {
            if ($user['login'] === $login) {
                $entity = $this->createUser($user);

                // Add the entity to the identity map
                $this->identityMap[$entity->getId()] = $entity;

                return $entity;
            }
        }

        return null;
    }

    private function createUser(array $user): Entity\User
    {
        $role = $user['role'];

        return new Entity\User(
            $user['id'],
            $user['name'],
            $user['login'],
            $user['password'],
            new Entity\Role($role['id'], $role['title'], $role['role'])
        );
    }

    private function getDataFromSource(array $search = [])
    {
        // ...

    }
}
