<?php

namespace Library\PhpSpreadsheet\Shared\Escher\DggContainer\BstoreContainer\BSE;

class Blip
{
    /**
     * The parent BSE.
     *
     * @var \Library\PhpSpreadsheet\Shared\Escher\DggContainer\BstoreContainer\BSE
     */
    private $parent;

    /**
     * Raw image data.
     *
     * @var string
     */
    private $data;

    /**
     * Get the raw image data.
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the raw image data.
     *
     * @param string $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * Set parent BSE.
     *
     * @param \Library\PhpSpreadsheet\Shared\Escher\DggContainer\BstoreContainer\BSE $parent
     */
    public function setParent($parent): void
    {
        $this->parent = $parent;
    }

    /**
     * Get parent BSE.
     *
     * @return \Library\PhpSpreadsheet\Shared\Escher\DggContainer\BstoreContainer\BSE $parent
     */
    public function getParent()
    {
        return $this->parent;
    }
}
