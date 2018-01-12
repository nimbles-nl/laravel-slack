?php
/*
* (c) Nimbles b.v. <wessel@nimbles.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
namespace Tests\Nimbles\CMTelecom\Model;

use Nimbles\CMTelecom\Model\Issuer;
use PHPUnit\Framework\TestCase;

class SlackMessageTest extends TestCase
{
    public function testSlackMessage()
    {
        $slackMessage = new SlackMessage('You look awesome!', '#test', 'TestBot', 'https://www.awesomeimage.com/image.png');
        
        $this->assertSame('You look awesome!', $slackMessage->getMessage());
        $this->assertSame('#test', $slackMessage->getChannel());
        $this->assertSame('TestBot', $slackMessage->getUsername());
        $this->assertSame('https://www.awesomeimage.com/image.png', $slackMessage->getIconUrl());
    }
}
