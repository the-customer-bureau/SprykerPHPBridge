<?php

namespace Engineered\Auth\Enums;

enum TokenReturnAttribute: string
{

	case accessToken = 'accessToken';
	case refreshToken = 'published';
	case expiresIn = 'expiresIn';
	case tokenType = 'tokenType';

}
