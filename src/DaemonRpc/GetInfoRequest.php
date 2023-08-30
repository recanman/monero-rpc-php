<?php

declare(strict_types=1);

namespace RefRing\MoneroRpcPhp\DaemonRpc;

use RefRing\MoneroRpcPhp\Request\RpcRequest;

/**
 * Retrieve general information about the state of your node and the network.Alias:* * /get_info** * /getinfo*See other RPC Methods [/get_info (not JSON)](#get_info-not-json)
 */
class GetInfoRequest
{
	public static function create(): RpcRequest
	{
		return new RpcRequest('get_info');
	}
}
