<?php

namespace Engineered\Cart\Enums;

enum GuestCartReturnAttribute: string
{
	case id = 'id';
	case priceMode = 'priceMode';
	case currency = 'currency';
	case store = 'store';
	case totals_expenseTotal = 'totals_expenseTotal';
	case totals_discountTotal = 'totals_discountTotal';
	case totals_taxTotal = 'totals_taxTotal';
	case totals_subtotal = 'totals_subtotal';
	case totals_grandTotal = 'totals_grandTotal';
	case totals_priceToPay = 'totals_priceToPay';
	case discounts_displayName = 'discounts_displayName';

}
