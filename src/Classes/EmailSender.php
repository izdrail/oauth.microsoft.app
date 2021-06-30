<?php

namespace LzoMedia\Heineken\Classes;

use Illuminate\Support\Collection;
use LzoMedia\Heineken\Objects\EmailObject;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model\Message;


class EmailSender extends OutlookEmail
{
    protected $mailUrl = '/me/messages?orderby=receivedDateTime desc';

    public function sendEmail(): void
    {
    }
}
