<?php

namespace Engineered\Shared\Domain;

use Symfony\Component\HttpClient\NativeHttpClient;

class httpClient
{

	public function __construct(
	)
	{}


	public function get(): NativeHttpClient
	{

		return new NativeHttpClient(
			[
				'headers' => [
					'Accept' => '*'
				]
			]
		);
	}

}
