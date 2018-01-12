<?php
/*
* (c) Nimbles b.v. <wessel@nimbles.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Nimbles\Slack\Client;

use GuzzleHttp\Psr7\Request;
use Http\Client\HttpClient;
use Nimbles\Services\Slack\Exception\SlackException;
use Nimbles\Services\Slack\Model\SlackMessage;
use Nimbles\Services\Slack\Slack;

/**
 * Class SlackClient
 */
class SlackClient implements Slack
{
    /** @var HttpClient */
    private $httpClient;

    /** @var string */
    private $token;

    /**
     * @param HttpClient $httpClient
     * @param string     $token
     */
    public function __construct(HttpClient $httpClient, $token)
    {
        $this->httpClient = $httpClient;
        $this->token      = $token;
    }

    /**
     * @param SlackMessage $slackMessage
     *
     * @return void
     *
     * @throws SlackException
     */
    public function sendMessage(SlackMessage $slackMessage)
    {
        try {
            $header = ['Content-Type' => 'application/json', 'Authorization' => 'Bearer '. $this->token];

            $requestData = [
                'channel'  => $slackMessage->getChannel(),
                'text'     => $slackMessage->getMessage(),
                'username' => $slackMessage->getUsername(),
                'icon_url' => $slackMessage->getIconUrl(),
                'as_user'  => false,
            ];

            $request = new Request('POST', 'https://slack.com/api/chat.postMessage', $header, json_encode($requestData));

            $this->httpClient->sendRequest($request);

        } catch (\Exception $exception) {
            throw new SlackException($exception->getMessage());
        }
    }
}
