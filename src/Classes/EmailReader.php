<?php

namespace LzoMedia\Heineken\Classes;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;
use LzoMedia\Heineken\Objects\EmailObject;
use Microsoft\Graph\Exception\GraphException;
use Microsoft\Graph\Model\Message;


class EmailReader extends OutlookEmail
{

    protected $mailUrl = '/me/messages?$orderby=hasAttachments desc';


    /**
     * @throws GuzzleException
     * @throws GraphException
     */
    public function getEmails(): Collection
    {
        $graph = $this->getConnection();

        $mails = $graph->createRequest('GET', $this->mailUrl)
            ->setReturnType(Message::class)
            ->execute();

        $collection = collect([]);

        foreach ($mails as $mail){

            if($mail->getHasAttachments() !== false){
                $emailObject = new EmailObject();
                $emailObject->setId($mail->getId());
                $emailObject->setContent($mail->getBody());
                $emailObject->setDate($mail->getReceivedDateTime());
                $emailObject->setFrom($mail->getFrom());

                dd($emailObject->getAttachment());
                $collection->push($emailObject);
            }

        }
        return $collection;
    }
}
