<?php

namespace AnyOption;

interface CommandInterface
{
    /**
     * Returned array is a tree. The leafs of this tree is a AnyOption\Parameter objects.
     * @return array
     */
    public function getParameters();
}