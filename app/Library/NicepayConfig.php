<?php
/*
 * ____________________________________________________________
 *
 * Copyright (C) 2016 NICE IT&T
 *
 *
 * This config file may used as it is, there is no warranty.
 *
 * @ description : PHP SSL Client module.
 * @ name        : NicepayLite.php
 * @ author      : NICEPAY I&T (tech@nicepay.co.kr)
 * @ date        :
 * @ modify      : 09.03.2016
 *
 * 09.03.2016 Update Log
 *
 * ____________________________________________________________
 */
// Please set the following
define("NICEPAY_IMID",              "IONPAYTEST");                                                 									// Merchant ID
define("NICEPAY_MERCHANT_KEY",      "33F49GnCMS1mFYlGXisbUDzVf2ATWCl9k3R++d5hDd3Frmuos/XLx8XhXpe+LDYAbpGKZYSwtlyyLOtS/8aD7A=="); 	// API Key Merchant Key

define("NICEPAY_CALLBACK_URL",      "https://www.nicepay.co.id/IONPAY_CLIENT/paymentResult.jsp"); // Merchant's result page URL

define("NICEPAY_DBPROCESS_URL",     "https://www.nicepay.co.id/IONPAY_CLIENT/paymentResult.jsp"); // Merchant's notification handler URL

/* TIMEOUT - Define as needed (in seconds) */
define( "NICEPAY_TIMEOUT_CONNECT", 15 );
define( "NICEPAY_TIMEOUT_READ", 25 );


// Please do not change
define("NICEPAY_PROGRAM",           "NicepayLite");
define("NICEPAY_VERSION",           "1.11");
define("NICEPAY_BUILDDATE",         "20160309");

// FOR PRODUCTION
define("NICEPAY_REQ_URL",        	"https://www.nicepay.co.id/nicepay/direct/v2/registration");            	// Registration URL
define("NICEPAY_CANCEL_URL",     	"https://www.nicepay.co.id/nicepay/direct/v2/cancel");       	            // Cancel API URL
define("NICEPAY_ORDER_STATUS_URL",  "https://www.nicepay.co.id/nicepay/direct/v2/inquiry");          	        // Check payment status URL
define("NICEPAY_ORDER_PAYMENT_URL",  "https://www.nicepay.co.id/nicepay/direct/v2/payment");          	        // Payment URL

// FOR DEVELOPMENT
// define("NICEPAYDEV_REQ_CC_URL",        "https://dev.nicepay.co.id/nicepay/api/orderRegist.do");            	// Registration URL
// define("NICEPAYDEV_CANCEL_URL",     	  "https://dev.nicepay.co.id/nicepay/api/onePassAllCancel.do");			// Cancel API URL
// define("NICEPAYDEV_ORDER_STATUS_URL",  "https://dev.nicepay.co.id/nicepay/api/onePassStatus.do");          	// Check payment status URL

define("NICEPAY_REQ_PAYOUT_URL",  	    "https://dev.nicepay.co.id/nicepay/api/direct/v2/requestPayout");       //API REQUEST PAYOUT
define("NICEPAY_APPROVE_PAYOUT_URL",  	"https://dev.nicepay.co.id/nicepay/api/direct/v2/approvePayout");       //API APPROVE PAYOUT
define("NICEPAY_REJECT_PAYOUT_URL",  	"https://dev.nicepay.co.id/nicepay/api/direct/v2/rejectPayout");        //API REJECT PAYOUT
define("NICEPAY_INQUIRY_PAYOUT_URL",  	"https://dev.nicepay.co.id/nicepay/api/direct/v2/inquiryPayout");       //API CHECK STATUS PAYOUT
define("NICEPAY_BALANCE_PAYOUT_URL",  	"https://dev.nicepay.co.id/nicepay/api/direct/v2/balanceInquiry");      //API CHECK BALANCE PAYOUT
define("NICEPAY_CANCEL_PAYOUT_URL",  	"https://dev.nicepay.co.id/nicepay/api/direct/v2/cancelPayout");        //API CANCEL PAYOUT
define("NICEPAY_SELLER_BALANCE_URL",  	"https://dev.nicepay.co.id/nicepay/direct/v2/sellerBalanceTransfer");   //API SELLER BALANCE PAYOUT
define("NICEPAY_MERCHANT_BALANCE_URL",  "https://dev.nicepay.co.id/nicepay/direct/v2/merchantBalanceTransfer"); //API SELLER BALANCE PAYOUT

define("NICEPAY_READ_TIMEOUT_ERR",  "10200");

/* LOG LEVEL */
define("NICEPAY_LOG_CRITICAL", 1);
define("NICEPAY_LOG_ERROR", 2);
define("NICEPAY_LOG_NOTICE", 3);
define("NICEPAY_LOG_INFO", 5);
define("NICEPAY_LOG_DEBUG", 7);
