<?php
/*
* (c) Nimbles b.v. <wessel@nimbles.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Nimbles\Slack\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class Slack
 */
class Slack extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'slack';
    }
}
