<?php

namespace LzoMedia\Heineken\Objects;

use Microsoft\Graph\Model\Attachment;

class CustomAttachmentObject extends Attachment
{
    /**
     * Gets the contentType
     * The MIME type.
     *
     * @return string|null The contentType
     */
    public function getContent(): ?string
    {
        if (array_key_exists("contentBytes", $this->_propDict)) {
            return $this->_propDict["contentBytes"];
        } else {
            return null;
        }
    }
}
