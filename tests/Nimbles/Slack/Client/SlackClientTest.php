<?php
/*
* (c) Nimbles b.v. <wessel@nimbles.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Tests\Nimbles\Slack\Client;

use Http\Client\HttpClient;
use Nimbles\Slack\Client\SlackClient;
use Nimbles\Slack\Model\SlackMessage;
use PHPUnit\Framework\TestCase;

/**
 * Class SlackClientTest
 */
class SlackClientTest extends TestCase
{
    /** @var SlackClient */
    private $slackClient;

    /** @var \PHPUnit_Framework_MockObject_MockObject|HttpClient */
    private $httpClient;

    /** @var \PHPUnit_Framework_MockObject_MockObject|SlackMessage */
    private $slackMessage;

    public function setUp()
    {
        $this->httpClient  = $this->createHttpClientMock();
        $this->slackClient = new SlackClient($this->httpClient, 'secret-token');
        $this->slackMessage = $this->createSlackMessageMock();
    }

    public function testSendMessage()
    {
        $this->slackMessage->expects($this->once())
            ->method('getChannel')
            ->willReturn('#test');

        $this->slackMessage->expects($this->once())
            ->method('getMessage')
            ->willReturn('Test message');

        $this->slackMessage->expects($this->once())
            ->method('getUsername')
            ->willReturn('testBot');

        $this->slackMessage->expects($this->once())
            ->method('getIconUrl')
            ->willReturn('https://www.image.com/image.png');
        $this->httpClient->expects($this->once())
            ->method('sendRequest');

        $this->slackClient->sendMessage($this->slackMessage);
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject|HttpClient
     */
    private function createHttpClientMock()
    {
        return $this->getMockBuilder(HttpClient::class)
            ->getMock();
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject|SlackMessage
     */
    private function createSlackMessageMock()
    {
        return $this->getMockBuilder(SlackMessage::class)
            ->disableOriginalConstructor()
            ->getMock();
    }
}
