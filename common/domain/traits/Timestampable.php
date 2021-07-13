<?php

namespace common\domain\traits;

trait Timestampable
{
    /**
     * @return void
     */
    public function setCreatedAt()
    {
        $this->createdAt = time();
    }

    /**
     * @return void
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = time();
    }
}