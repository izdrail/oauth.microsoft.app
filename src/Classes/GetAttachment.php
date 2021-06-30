<?php

namespace LzoMedia\Heineken\Classes;

use GuzzleHttp\Exception\GuzzleException;
use LzoMedia\Heineken\Objects\CustomAttachmentObject;
use LzoMedia\Heineken\Objects\EmailObject;
use Microsoft\Graph\Exception\GraphException;


class GetAttachment extends OutlookEmail
{
    protected $attachmentUrl = '/me/messages/message_id/attachments';

    /**
     * Methods returns just the first attachement found
     * @throws GraphException
     * @throws GuzzleException
     */
    public function get(EmailObject $emailObject)
    {
        $graph = $this->getConnection();

        $this->attachmentUrl = str_replace(
            'message_id',
            $emailObject->getId(),
            $this->attachmentUrl
        );

        $result =  $graph->createRequest('GET', $this->attachmentUrl)
            ->setReturnType(CustomAttachmentObject::class)
            ->execute();

        if(is_array($result)){
            return $result[0];
        }
        return $result;

    }
}
