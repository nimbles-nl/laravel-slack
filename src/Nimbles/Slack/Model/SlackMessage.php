<?php
/*
* (c) Nimbles b.v. <wessel@nimbles.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Nimbles\Slack\Model;

/**
 * Class SlackMessage
 */
class SlackMessage
{
    /** @var string */
    private $message;

    /** @var string */
    private $channel;

    /** @var string */
    private $username;

    /** @var string */
    private $iconUrl;

    /**
     * @param string $message
     * @param string $channel
     * @param string $username
     * @param string $iconUrl
     */
    public function __construct($message, $channel = 'general', $username = 'SlackBot', $iconUrl = null)
    {
        $this->message  = $message;
        $this->channel  = $channel;
        $this->username = $username;
        $this->iconUrl  = $iconUrl;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string|null
     */
    public function getIconUrl()
    {
        return $this->iconUrl;
    }
}
